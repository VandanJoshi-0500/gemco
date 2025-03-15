<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Hash;
use Session;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Category;
use App\Models\Log;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cache;
class CategoryController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    public function categories(){
        $categories = Category::orderBy('id','Desc')->get();
        $parent_categories = Category::where('parent','==',0)->orderBy('id','Desc')->get();
        $page  = 'Categories';
        $icon  = 'category.png';
        if(Auth::user()->role == 1){
            return view('admin.category.categories',compact('categories','parent_categories','page','icon'));
        }else{
            return redirect()->route('admin');
        }
    }
    public function addCategoryData(Request $req){
        $req->validate([
            'name'                => 'required|unique:categories,name',
        ]);
        if($req->image_type == '1'){
            if($req->has('image') && $req->file('image') != null){
                $image = $req->file('image');
                $destinationPath = 'public/categories/';
                $rand=rand(1,100);
                $docImage = date('YmdHis').$rand. "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $docImage);
                $img=$docImage;
            }else{
                $img='';
            }
        }else{
            $img = $req->image_link;
        }
        if($req->has('menu_image') && $req->file('menu_image') != null){
            $menu_image = $req->file('menu_image');
            $destinationPath1 = 'public/categories/';
            $rand1=rand(1,100);
            $docImage1 = date('YmdHis').$rand1. "." . $menu_image->getClientOriginalExtension();
            $menu_image->move($destinationPath1, $docImage1);
            $img1=$docImage1;
        }else{
            $img1='';
        }
        if($req->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        $category = new Category();
        $category->name             = $req->name;
        $category->slug             = $req->slug;
        $category->parent           = $req->parent;
        $category->image_type       = $req->image_type;
        $category->image            = $img;
        $category->menu_image       = $img1;
        $category->order_id         = $req->order_no;
        $category->description      = $req->description;
        $category->meta_text        = $req->meta_text;
        $category->meta_description = $req->meta_description;
        $category->keyword          = $req->keyword;
        $category->created_by       = Auth::user()->id;
        $category->status           = $status;
        $category->save();

        $user1 = User::where('id',Auth::user()->id)->first();
        $log = new Log();
        $log->user_id   = Auth::user()->name;
        $log->module    = 'Category';
        $log->log       = 'Category ('.$category->name .') Created';
        $log->save();
        Cache::forget('Categories');
        Cache::forget('fine_jewelry');
        Cache::forget('victorian_jewelry');
        if(Auth::user()->role == 1){
            return redirect()->route('admin.categories');
        }else{
            return redirect()->route('admin');
        }
    }
    public function editCategory($id){
        $categories         = Category::orderBy('id','Desc')->get();
        $category           = Category::where('id',$id)->first();
        $page               = 'Categories';
        $icon               = 'category.png';
        if(Auth::user()->role == 1){
            return view('admin.category.edit_category',compact('categories','category','page','icon'));
        }else{
            return redirect()->route('admin');
        }
    }
    public function updateCategory(Request $req){
        $req->validate([
            'name'                => 'required|unique:categories,name,'.$req->category_id,
        ]);
        if($req->image_type == '1'){
            if($req->has('image') && $req->file('image') != null){
                $image = $req->file('image');
                $destinationPath = 'public/categories/';
                $rand=rand(1,100);
                $docImage = date('YmdHis').$rand. "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $docImage);
                $img=$docImage;
            }else{
                $img=$req->hidden_image;
            }
        }else{
            $img = $req->image_link;
        }
        if($req->has('menu_image') && $req->file('menu_image') != null){
            $menu_image = $req->file('menu_image');
            $destinationPath1 = 'public/categories/';
            $rand1=rand(1,100);
            $docImage1 = date('YmdHis').$rand1. "." . $menu_image->getClientOriginalExtension();
            $menu_image->move($destinationPath1, $docImage1);
            $img1=$docImage1;
        }else{
            $img1=$req->hidden_menu_image;
        }
        if($req->status == "on"){
            $status = 1;
        }else{
            $status = 0;
        }
        $category = Category::where('id',$req->category_id)->first();
        $category->name             = $req->name;
        $category->slug             = $req->slug;
        $category->parent           = $req->parent;
        $category->image_type       = $req->image_type;
        $category->image            = $img;
        $category->menu_image       = $img1;
        $category->order_id         = $req->order_no;
        $category->description      = $req->description;
        $category->meta_text        = $req->meta_text;
        $category->meta_description = $req->meta_description;
        $category->keyword          = $req->keyword;
        $category->status           = $status;
        $category->save();

        $user1 = User::where('id',Auth::user()->id)->first();
        $log = new Log();
        $log->user_id   = Auth::user()->name;
        $log->module    = 'Category';
        $log->log       = 'Category ('.$category->name .') Updated';
        $log->save();
        Cache::forget('Categories');
        Cache::forget('fine_jewelry');
        Cache::forget('victorian_jewelry');
        if(Auth::user()->role == 1){
            return redirect()->route('admin.categories');
        }else{
            return redirect()->route('admin');
        }


    }
    public function deleteCategory($id){
        $category = Category::where('id',$id)->first();
        $user1 = User::where('id',Auth::user()->id)->first();
        $log = new Log();
        $log->user_id   = Auth::user()->id;
        $log->module    = 'Category';
        $log->log       = ' Category ('.$category->name .') Deleted';
        $log->save();
        $category->delete();

        $cat = Category::where('parent',$id)->get();
        if(count($cat)>0){
            Category::where('parent',$id)->delete();
        }
        Cache::forget('Categories');
        Cache::forget('fine_jewelry');
        Cache::forget('victorian_jewelry');
        return 1;
    }
    public function getCategories(Request $req){
        $categories = Category::all();
        $parent_categories = Category::where('parent','==',0)->get();
        $html = '';
        if (count($parent_categories)>0){
            foreach ($parent_categories as $item){
                $childs = DB::table('categories')->where('parent',$item->id)->get();
                if (count($childs)>0){
                    $html .= '<optgroup label="'.$item->name.'">';
                        foreach ($childs as $child){
                            $html .= '<option value="'.$child->id.'">'.$child->name.'</option>';
                        }
                    $html .= '</optgroup>';
                }else{
                    $html .= '<option value="'.$item->id.'">'.$item->name.'</option>';
                }
            }
        }
        return $html;
    }
}
