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
use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;
use Cache;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
class ProductController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    public function products(Request $request){
        $products = Product::orderBy('id','Desc')->where('active',1)->get();
        $categories = Category::where('status',1)->where('active',1)->get();
        $parent_categories = Category::where('parent','==',0)->where('status',1)->where('active',1)->orderBy('id','Desc')->get();
        $page = 'Products';
        $icon = 'product.png';
        return view('admin.products.products',compact('icon','page','products','categories','parent_categories'));
    }
    public function addProduct(){
        $categories = Category::all();
        $parent_categories = Category::where('parent','==',0)->get();
        $collections = Collection::where('status',1)->where('active',1)->get();
        $page  = 'Products';
        $icon  = 'products.png';
        if(Auth::user()->role == 1){
            return view('admin.products.add_product',compact('categories','parent_categories','collections','page','icon'));
        }else{
            return redirect()->route('admin');
        }
    }
    public function addProductData(Request $request){
        $request->validate([
            'name'      => 'required|unique:products,name',
            'sku'       => 'required|unique:products,sku',
            'price'     => 'required',
        ]);
        if($request->image_type == '1'){
            if($request->has('image') && $request->file('image') != null){
                $image = $request->file('image');
                $destinationPath = 'products/';
                $rand=rand(1,100);
                $docImage = date('YmdHis').$rand. "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $docImage);
                $img=$docImage;
            }else{
                $img='';
            }
        }else{
            $img = $request->image_link;
        }
        if($request->thumbnail_image_type == '1'){
            if($request->has('thumbnail_image') && $request->file('thumbnail_image') != null){
                $Timage = $request->file('thumbnail_image');
                $destinationPath = 'products/';
                $rand=rand(1,100);
                $docImage = date('YmdHis').$rand. "." . $Timage->getClientOriginalExtension();
                $Timage->move($destinationPath, $docImage);
                $Timg=$docImage;
            }else{
                $Timg='';
            }
        }else{
            $Timg = $request->thumbnail_image_link;
        }
        if($request->price_xml == "on"){
            $price_xml = 1;
        }else{
            $price_xml = 0;
        }
        $product =new Product();
        $product->name              = $request->name;
        $product->sku               = $request->sku;
        $product->category          = $request->categories;
        $product->collection        = $request->collection;
        $product->long_description  = $request->long_description;
        $product->long_description2 = $request->long_description2;
        $product->long_description3  = $request->long_description3;
        $product->short_description = $request->short_description;
        $product->price             = $request->price;
        $product->special_price     = $request->special_price;
        $product->tag_price         = $request->tag_price;
        $product->quantity_stock    = $request->quantity_stock;
        $product->quantity_memo     = $request->quantity_memo;
        $product->price_xml         = $price_xml;
        $product->image             = $img;
        $product->thumbnail_image             = $Timg;
        $product->image_type        = $request->image_type;
        $product->thumbnail_image_type        = $request->thumbnail_image_type;
        $product->status            = 1;
        $product->active            = 1;
        $product->save();
        if($product){
            return redirect()->route('admin.products');
        }else{
            return redirect()->back();
        }
    }
    public function editProduct(Request $request, $id = NULL){
        $categories = Category::all();
        $parent_categories = Category::where('parent','==',0)->get();
        $collections = Collection::where('status',1)->where('active',1)->get();
        $product = Product::where('id',$id)->first();
        $page  = 'Products';
        $icon  = 'products.png';
        if(Auth::user()->role == 1){
            return view('admin.products.edit_product',compact('categories','parent_categories','collections','product','page','icon'));
        }else{
            return redirect()->route('admin');
        }
    }
    public function updateProduct(Request $request){
        $request->validate([
            'name'      => 'required|unique:products,name,'. $request->id,
            'sku'       => 'required|unique:products,sku,'. $request->id,
            'price'     => 'required',
        ]);
        if($request->image_type == '1'){
            if($request->has('image') && $request->file('image') != null){
                $image = $request->file('image');
                $destinationPath = 'products/';
                $rand=rand(1,100);
                $docImage = date('YmdHis').$rand. "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $docImage);
                $img=$docImage;
            }else{
                $img=$request->uploaded_image;
            }
        }else{
            $img = $request->image_link;
        }
        if($request->thumbnail_image_type == '1'){
            if($request->has('thumbnail_image') && $request->file('thumbnail_image') != null){
                $Timage = $request->file('thumbnail_image');
                $destinationPath = 'products/';
                $rand=rand(1,100);
                $docImage = date('YmdHis').$rand. "." . $Timage->getClientOriginalExtension();
                $Timage->move($destinationPath, $docImage);
                $Timg=$docImage;
            }else{
                $Timg='';
            }
        }else{
            $Timg = $request->thumbnail_image_link;
        }
        if($request->status == "on"){
            $status = 1;
        }else{
            $status = 0;
        }
        if($request->price_xml == "on"){
            $price_xml = 1;
        }else{
            $price_xml = 0;
        }
        $product = Product::where('id',$request->id)->first();
        $product->name              = $request->name;
        $product->sku               = $request->sku;
        $product->category          = $request->categories;
        $product->collection        = $request->collection;
        $product->long_description  = $request->long_description;
        $product->long_description2 = $request->long_description2;
        $product->long_description3  = $request->long_description3;
        $product->short_description = $request->short_description;
        $product->price             = $request->price;
        $product->special_price     = $request->special_price;
        $product->tag_price         = $request->tag_price;
        $product->quantity_stock    = $request->quantity_stock;
        $product->quantity_memo     = $request->quantity_memo;
        $product->price_xml         = $price_xml;
        $product->image_type        = $request->image_type;
        $product->thumbnail_image_type        = $request->thumbnail_image_type;
        $product->thumbnail_image             = $Timg;
        $product->image             = $img;
        $product->status            = $status;
        $product->save();

        if($product){
            return redirect()->route('admin.products');
        }else{
            return redirect()->back();
        }
    }
    public function deleteProduct($id){
        $product = Product::where('id',$id)->first();
        $product->active = 0;
        $user1 = User::where('id',Auth::user()->id)->first();
        $log = new Log();
        $log->user_id   = Auth::user()->name;
        $log->module    = 'Products';
        $log->log       = 'Product ('.$product->name .') Deleted by '.$user1->name;
        $log->save();
        $product->save();
        return 1;
    }

    public function importExcel(Request $request){
        if($request->hasFile('import_file')){
            $import = Excel::import(new ProductsImport, $request->import_file->getRealPath(), null, \Maatwebsite\Excel\Excel::XLSX);
            if(isset($import)){
                return redirect()->route('admin.products')->with('success','Products Imported Successfully.');
            }
            return redirect()->back()->with('error','Something Went to Wrong.');
        }
    }
}
