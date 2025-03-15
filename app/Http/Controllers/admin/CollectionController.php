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
use App\Models\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Cache;
class CollectionController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    public function collections(Request $request){
        $page = 'Collection';
        $icon = 'collection.png';
        $collections = Collection::where('active',1)->get();
        return view('admin.collections.collections',compact('icon','page','collections'));
    }
    public function addCollection(Request $request){
        $page = 'Collection';
        $icon = 'collection.png';
        $collections = Collection::where('status',1)->where('parent',0)->where('active',1)->get();
        return view('admin.collections.add_collection',compact('page','icon','collections'));
    }
    public function editCollection(Request $request,$id = NULL){
        $page = 'Collection';
        $icon = 'collection.png';
        $collection = Collection::where('id',$id)->first();
        $collections = Collection::where('status',1)->where('parent',0)->where('active',1)->get();
        return view('admin.collections.edit_collection',compact('page','icon','collection','collections'));
    }
    public function addCollectionData(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        if($request->image_type == '1'){
            if($request->has('image') && $request->file('image') != null){
                $image = $request->file('image');
                // $destinationPath = public_path('collection/');
                $destinationPath = 'public/collection/';
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
        if($request->has('menu_image') && $request->file('menu_image') != null){
            $menu_image = $request->file('menu_image');
            // $destinationPath1 = public_path('categories/');
            $destinationPath1 = 'public/categories/';
            $rand1=rand(1,100);
            $docImage1 = date('YmdHis').$rand1. "." . $menu_image->getClientOriginalExtension();
            $menu_image->move($destinationPath1, $docImage1);
            $img1=$docImage1;
        }else{
            $img1='';
        }
        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        $collection = new Collection();
        $collection->name           = $request->name;
        $collection->slug           = $request->slug;
        // $collection->parent         = $request->parent;
        $collection->description    = $request->descripttion;
        $collection->order_no       = $request->order_no;
        $collection->image_type     = $request->image_type;
        $collection->image          = $img;
        $collection->menu_image     = $img1;
        $collection->status         = $status;
        $collection->meta_text          = $request->meta_text;
        $collection->meta_description   = $request->meta_description;
        $collection->keyword            = $request->keyword;
        if($request->has('ring_image') && $request->file('ring_image') != null){
            $ring_image = $request->file('ring_image');
            // $destinationPath2 = public_path('ring_image/');
            $destinationPath2 = 'public/ring_image/';
            $rand2=rand(1,100);
            $docImage2 = date('YmdHis').$rand2. "." . $ring_image->getClientOriginalExtension();
            $ring_image->move($destinationPath2, $docImage2);
            $collection->ring_image = $docImage2;
        }
        if($request->has('necklace_image') && $request->file('necklace_image') != null){
            $necklace_image = $request->file('necklace_image');
            // $destinationPath3 = public_path('necklace_image/');
            $destinationPath3 = 'public/necklace_image/';
            $rand3=rand(1,100);
            $docImage3 = date('YmdHis').$rand3. "." . $necklace_image->getClientOriginalExtension();
            $necklace_image->move($destinationPath3, $docImage3);
            $collection->necklace_image = $docImage3;
        }
        if($request->has('ear_jewelry_mage') && $request->file('ear_jewelry_mage') != null){
            $ear_jewelry_mage = $request->file('ear_jewelry_mage');
            // $destinationPath4 = public_path('ear_jewelry_mage/');
            $destinationPath4 = 'public/ear_jewelry_mage/';
            $rand4=rand(1,100);
            $docImage4 = date('YmdHis').$rand4. "." . $ear_jewelry_mage->getClientOriginalExtension();
            $ear_jewelry_mage->move($destinationPath4, $docImage4);
            $collection->ear_jewelry_mage = $docImage4;
        }
        if($request->has('bracelets_image') && $request->file('bracelets_image') != null){
            $bracelets_image = $request->file('bracelets_image');
            // $destinationPath5 = public_path('bracelets_image/');
            $destinationPath5 = 'public/bracelets_image/';
            $rand5=rand(1,100);
            $docImage5 = date('YmdHis').$rand5. "." . $bracelets_image->getClientOriginalExtension();
            $bracelets_image->move($destinationPath5, $docImage5);
            $collection->bracelets_image = $docImage5;
        }

        $collection->save();

        return redirect()->route('admin.collections');
    }
    public function updateCollection(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        if($request->image_type == '1'){
            if($request->has('image') && $request->file('image') != null){
                $image = $request->file('image');
                // $destinationPath = public_path('collection/');
                $destinationPath = 'public/collection/';
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
        if($request->has('menu_image') && $request->file('menu_image') != null){
            $menu_image = $request->file('menu_image');
            // $destinationPath1 = public_path('categories/');
            $destinationPath1 = 'public/categories/';
            $rand1=rand(1,100);
            $docImage1 = date('YmdHis').$rand1. "." . $menu_image->getClientOriginalExtension();
            $menu_image->move($destinationPath1, $docImage1);
            $img1=$docImage1;
        }else{
            $img1=$request->hidden_menu_image;
        }
        $id = $request->id;
        $collection = Collection::where('id',$id)->first();
        $collection->name               = $request->name;
        $collection->slug               = $request->slug;
        // $collection->parent             = $request->parent;
        $collection->description        = $request->descripttion;
        $collection->order_no           = $request->order_no;
        $collection->image_type         = $request->image_type;
        $collection->image              = $img;
        $collection->menu_image         = $img1;
        $collection->meta_text          = $request->meta_text;
        $collection->meta_description   = $request->meta_description;
        $collection->keyword            = $request->keyword;
        $collection->status             = $status;
        $collection->ring_image = $request->hidden_ring_image;
        $collection->necklace_image = $request->hidden_necklace_image;
        $collection->ear_jewelry_mage = $request->hidden_ear_jewelry_image;
        $collection->bracelets_image = $request->hidden_bracelets_image;
        if($request->has('ring_image') && $request->file('ring_image') != null){
            $ring_image = $request->file('ring_image');
            // $destinationPath2 = public_path('ring_image/');
            $destinationPath2 = 'public/ring_image/';
            $rand2=rand(1,100);
            $docImage2 = date('YmdHis').$rand2. "." . $ring_image->getClientOriginalExtension();
            $ring_image->move($destinationPath2, $docImage2);
            $collection->ring_image = $docImage2;
        }
        if($request->has('necklace_image') && $request->file('necklace_image') != null){
            $necklace_image = $request->file('necklace_image');
            // $destinationPath3 = public_path('necklace_image/');
            $destinationPath3 = 'public/necklace_image/';
            $rand3=rand(1,100);
            $docImage3 = date('YmdHis').$rand3. "." . $necklace_image->getClientOriginalExtension();
            $necklace_image->move($destinationPath3, $docImage3);
            $collection->necklace_image = $docImage3;
        }
        if($request->has('ear_jewelry_mage') && $request->file('ear_jewelry_mage') != null){
            $ear_jewelry_mage = $request->file('ear_jewelry_mage');
            // $destinationPath4 = public_path('ear_jewelry_mage/');
            $destinationPath4 = 'public/ear_jewelry_mage/';
            $rand4=rand(1,100);
            $docImage4 = date('YmdHis').$rand4. "." . $ear_jewelry_mage->getClientOriginalExtension();
            $ear_jewelry_mage->move($destinationPath4, $docImage4);
            $collection->ear_jewelry_mage = $docImage4;
        }
        if($request->has('bracelets_image') && $request->file('bracelets_image') != null){
            $bracelets_image = $request->file('bracelets_image');
            // $destinationPath5 = public_path('bracelets_image/');
            $destinationPath5 = 'public/bracelets_image/';
            $rand5=rand(1,100);
            $docImage5 = date('YmdHis').$rand5. "." . $bracelets_image->getClientOriginalExtension();
            $bracelets_image->move($destinationPath5, $docImage5);
            $collection->bracelets_image = $docImage5;
        }
        $collection->save();

        return redirect()->route('admin.collections');
    }
    public function deleteCollection($id){
        $collection = Collection::where('id',$id)->first();
        $collection->active = 0;
        $collection->save();
        return 1;
    }
}
