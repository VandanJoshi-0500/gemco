<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Log;
use Carbon\Carbon;
use App\Models\RoleUser;
use App\Models\Setting;
use App\Models\UserGroup;
use App\Models\WishlistOrder;
use App\Models\WishlistOrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class WishlistsController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    public function wishlists(Request $request){
        $page = 'Wishlist';
        $icon = 'user.png';
        $wishlists = WishlistOrder::all();
        return view('admin.wishlists.wishlists',compact('icon','page','wishlists'));
    }
    public function wishlistView(Request $request, $id = NULL){
        $page = 'Wishlist';
        $icon = 'user.png';
        $wishlist_items = WishlistOrderItem::where('wishlist_id',$id)->get();
        return view('admin.wishlists.wishlist_view',compact('icon','page','wishlist_items'));
    }
}
