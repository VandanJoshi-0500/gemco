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
use App\Models\Event;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function __construct()
    {
        $setting = Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    public function banners(Request $request)
    {
        $banners = Banner::orderBy('id', 'Desc')->where('active', 1)->get();
        $page = 'Banner';
        $icon = 'file.png';
        return view('admin.banners.banners', compact('icon', 'page', 'banners'));
    }
    public function addBanner()
    {
        $page  = 'Banner';
        $icon  = 'file.png';
        if (Auth::user()->role == 1) {
            return view('admin.banners.add_banner', compact('page', 'icon'));
        } else {
            return redirect()->route('admin');
        }
    }
    public function addBannerData(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'order_no'  => 'required',
            'heading'     => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        if ($request->status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }
        if ($request->image_type == '1') {
            if ($request->has('image') && $request->file('image') != null) {
                $image = $request->file('image');
                $destinationPath = 'public/banners/';
                $rand = rand(1, 100);
                $docImage = date('YmdHis') . $rand . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $docImage);
                $img = $docImage;
            } else {
                $img = $request->hidden_image;
            }
        } else {
            $img = $request->image_link;
        }
        $banner = new Banner();
        $banner->name                = $request->name;
        $banner->banner_link         = $request->banner_link;
        $banner->image_type          = $request->image_type;
        $banner->order_no            = $request->order_no;
        $banner->image               = $img;
        $banner->heading             = $request->heading;
        $banner->description         = $request->description;
        $banner->active              = 1;
        $banner->status              = $status;
        $banner->save();

        if ($banner) {
            return redirect()->route('admin.banners');
        } else {
            return redirect()->back();
        }
    }
    public function editBanner(Request $request, $id = NULL)
    {
        $page  = 'Banner';
        $icon  = 'file.png';
        $banner = Banner::where('id', $id)->first();
        if (Auth::user()->role == 1) {
            return view('admin.banners.edit_banner', compact('page', 'icon', 'banner'));
        } else {
            return redirect()->route('admin');
        }
    }
    public function editBannerData(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'heading'     => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        if ($request->status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }
        if ($request->image_type == '1') {
            if ($request->has('image') && $request->file('image') != null) {
                $image = $request->file('image');
                $destinationPath = 'public/banners/';
                $rand = rand(1, 100);
                $docImage = date('YmdHis') . $rand . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $docImage);
                $img = $docImage;
            } else {
                $img = $request->hidden_image;
            }
        } else {
            $img = $request->image_link;
        }
        $banner = Banner::where('id', $request->id)->first();
        $banner->name                = $request->name;
        $banner->banner_link         = $request->banner_link;
        $banner->image_type          = $request->image_type;
        $banner->order_no            = $request->order_no;
        $banner->image               = $img;
        $banner->heading             = $request->heading;
        $banner->description         = $request->description;
        $banner->active              = 1;
        $banner->status              = $status;
        $banner->save();

        if ($banner) {
            return redirect()->route('admin.banners');
        } else {
            return redirect()->back();
        }
    }



    // public function deleteBanner($id)
    // {
    //     $banner = Banner::where('id', $id)->first();
    //     $banner->active = 0;
    //     $banner->save();
    //     return 1;
    // }

    public function deleteBanner($id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            $banner->delete();
            return response()->json(['status' => true, 'message' => 'Banner deleted successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Banner not found'], 404);
        }
    }
}
