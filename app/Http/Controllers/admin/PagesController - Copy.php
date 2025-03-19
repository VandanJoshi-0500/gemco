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
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    public function pages(Request $request){
        $pages = Page::orderBy('id','Desc')->where('active',1)->get();
        $page = 'Pages';
        $icon = 'file.png';
        return view('admin.pages.pages',compact('icon','page','pages'));
    }
    public function addPage(){
        $page  = 'Pages';
        $icon  = 'file.png';
        if(Auth::user()->role == 1){
            return view('admin.pages.add_page',compact('page','icon'));
        }else{
            return redirect()->route('admin');
        }
    }
    public function addPageData(Request $request){
        $request->validate([
            'title'      => 'required|unique:pages,page_title',
            'slug'       => 'required|unique:pages,slug',
        ]);
        if($request->status == "on"){
            $status = 1;
        }else{
            $status = 0;
        }
        $page =new Page();
        $page->page_title          = $request->title;
        $page->slug                = $request->slug;
        $page->description         = $request->description;
        $page->meta_text           = $request->meta_text;
        $page->meta_description    = $request->meta_description;
        $page->keyword             = $request->keyword;
        $page->status              = $status;
        $page->save();

        if($page){
            return redirect()->route('admin.pages');
        }else{
            return redirect()->back();
        }
    }
    public function editPage(Request $request, $id = NULL){
        $page  = 'Pages';
        $icon  = 'file.png';
        $page_data = Page::where('id',$id)->first();
        if(Auth::user()->role == 1){
            return view('admin.pages.edit_page',compact('page','icon','page_data'));
        }else{
            return redirect()->route('admin');
        }
    }
    public function editPageData(Request $request){
        $request->validate([
            'title'      => 'required|unique:pages,page_title,'.$request->id,
            'slug'       => 'required|unique:pages,slug,'.$request->id,
        ]);
        if($request->status == "on"){
            $status = 1;
        }else{
            $status = 0;
        }
        $page = Page::where('id',$request->id)->first();
        $page->page_title          = $request->title;
        $page->slug                = $request->slug;
        $page->description         = $request->description;
        $page->meta_text           = $request->meta_text;
        $page->meta_description    = $request->meta_description;
        $page->keyword             = $request->keyword;
        $page->status              = $status;
        $page->save();

        if($page){
            return redirect()->route('admin.pages');
        }else{
            return redirect()->back();
        }
    }
    public function deletePage($id){
        $page = Page::where('id',$id)->first();
        $page->active = 0;
        $page->save();
        return 1;
    }
}
