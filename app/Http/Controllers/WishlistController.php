<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Log;
use App\Models\Page;
use Carbon\Carbon;
use App\Models\RoleUser;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\WishlistOrder;
use App\Models\WishlistOrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Cache;

class WishlistController extends Controller
{
    public function __construct()
    {
        $setting = Setting::first();
        if (Cache::has('Categories')) {
            $categories = Cache::get('Categories');
        } else {
            $categories = Category::where('status', 1)->where('active', 1)->orderBy('order_id', 'asc')->get();
            Cache::put('Categories', $categories, now()->addDays(2));
        }
        if (Cache::has('Collections')) {
            $collections = Cache::get('Collections');
        } else {
            $collections = Collection::where('status', 1)->where('active', 1)->orderBy('order_no', 'asc')->get();
            Cache::put('Collections', $collections, now()->addDays(2));
        }
        if (Cache::has('fine_jewelry')) {
            $fine_jewelry = Cache::get('fine_jewelry');
        } else {
            $fine_jewelry = Collection::where('parent', 3)->where('status', 1)->where('active', 1)->orderBy('order_no', 'asc')->get();
            Cache::put('fine_jewelry', $fine_jewelry, now()->addDays(2));
        }
        if (Cache::has('victorian_jewelry')) {
            $victorian_jewelry = Cache::get('victorian_jewelry');
        } else {
            $victorian_jewelry = Collection::where('parent', 4)->where('status', 1)->where('active', 1)->orderBy('order_no', 'asc')->get();
            Cache::put('victorian_jewelry', $victorian_jewelry, now()->addDays(2));
        }
        foreach ($categories as $key => $category) {
            $categoryData = Category::where('slug', $category->slug)->where('status', 1)->where('active', 1)->first();
            if (isset($categoryData)) {
                $products = Product::where('category', $categoryData->id)->where('status', 1)->where('active', 1)->whereNot('price', 0)->whereNot('image', '')->orderBy('id', 'desc')->get();

                if (!blank($products)) {
                    $collect = [];
                    foreach ($products as $pr) {
                        if (!in_array($pr->collection, $collect)) {
                            array_push($collect, $pr->collection);
                        }
                    }
                    $cols = [];
                    if (!empty($collect)) {
                        foreach ($collect as $key => $col) {
                            $coll = Collection::where('id', $col)->first();
                            if($coll){
                            $cols[$key]['image'] = $coll->image;
                            $cols[$key]['name'] = $coll->name;
                            $cols[$key]['image_type'] = $coll->image_type;
                            $cols[$key]['id'] = $coll->id;
                            $cols[$key]['slug'] = $coll->slug;
                            $cols[$key]['ring_image'] = $coll->ring_image;
                            $cols[$key]['necklace_image'] = $coll->necklace_image;
                            $cols[$key]['ear_jewelry_mage'] = $coll->ear_jewelry_mage;
                            $cols[$key]['bracelets_image'] = $coll->bracelets_image;
                            }
                        }
                    }
                } else {
                    $cols = [];
                }
                $category[$category->slug] = $cols;
            }
        }
        view()->share('setting', $setting);
        view()->share('categories', $categories);
        view()->share('fine_jewelry', $fine_jewelry);
        view()->share('victorian_jewelry', $victorian_jewelry);
    }
    public function Wishlist(Request $request){
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $page = 'my_wishlist';
            $wishlists = Wishlist::where('user_id',$user_id)->get();
            return view('frontend.account.wishlist',compact('wishlists','user_id','page'));
        }else{
            return redirect()->route('login');
        }
    }
    public function addToWishlist(Request $request, $id = NULL){
        if(Auth::user()){
            if(!blank($id)){
                $wishlist = new Wishlist();
                $wishlist->user_id      = Auth::user()->id;
                $wishlist->product_id   = $id;
                $wishlist->status       = 1;
                $wishlist->active       = 1;
                $wishlist->save();
            }
            return redirect()->back();
        }else{
            return redirect()->route('login');
        }
    }
    public function deleteWishlistItem(Request $request, $id = NULL){
        if(Auth::user()){
            if(!blank($id)){
                $wishlist = Wishlist::where('id',$id)->first();
                $wishlist->delete();
            }
            return response()->json('success');
        }else{
            return redirect()->route('login');
        }
    }
    public function submitWishlist(Request $request){
        if(Auth::user()){
            $name = $request->name;
            $order = new WishlistOrder();
            $order->name = $name;
            $order->user_id = Auth::user()->id;
            $order->status = 1;
            $order->save();
            if($order){
                $wishlist = Wishlist::where('user_id',Auth::user()->id)->get();
                if(!blank($wishlist)){
                    foreach($wishlist as $item){
                        $order_item = new WishlistOrderItem();
                        $order_item->wishlist_id = $order->id;
                        $order_item->product_id = $item->product_id;
                        $order_item->user_id = $item->user_id;
                        $order_item->status = 1;
                        $order_item->save();
                    }
                }
            }
            $wishlist_remove = Wishlist::where('user_id',Auth::user()->id)->delete();
            return response()->json('submitted');
        }else{
            return redirect()->route('login');
        }
    }
    public function MyWishlistHistory(Request $request){
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $page = 'wishlist_history';
            $wishlists = WishlistOrder::where('user_id',$user_id)->get();
            return view('frontend.account.wishlist_history',compact('wishlists','user_id','page'));
        }else{
            return redirect()->route('login');
        }
    }
    public function updateWishlist(Request $request){
        if(Auth::user()){
            $name = $request->name;
            $id = $request->id;
            $order = WishlistOrder::where('id',$id)->first();
            $order->name = $name;
            $order->save();
            return response()->json('Updated');
        }else{
            return redirect()->route('login');
        }
    }
    public function WishlistDetails(Request $request,$name = NULL){
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $page = 'wishlist_history';
            $wishlist = WishlistOrder::where('name',$name)->first();
            $wishlists = WishlistOrderItem::where('wishlist_id',$wishlist->id)->get();
            return view('frontend.account.wishlist_history_details',compact('wishlists','user_id','page'));
        }else{
            return redirect()->route('login');
        }
    }
}
