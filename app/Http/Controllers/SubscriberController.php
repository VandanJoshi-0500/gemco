<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Log;
use Carbon\Carbon;
use App\Models\RoleUser;
use App\Models\Setting;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class SubscriberController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    public function subscribers(Request $request){
        $subscribers = Subscriber::orderBy('id','Desc')->where('active',1)->get();
        $page = 'Subscribers';
        $icon = 'file.png';
        return view('admin.subscribers.subscribers',compact('icon','page','subscribers'));
    }
    public function addSubscriber(){
        $page  = 'Subscribers';
        $icon  = 'file.png';
        if(Auth::user()->role == 1){
            return view('admin.subscribers.add_subscriber',compact('page','icon'));
        }else{
            return redirect()->route('admin');
        }
    }
    public function addSubscriberData(Request $request){
        $request->validate([
            'email'      => 'required|unique:subscribers,email',
        ]);
        if($request->status == "on"){
            $status = 1;
        }else{
            $status = 0;
        }
        $subscriber =new Subscriber();
        $subscriber->email               = $request->email;
        $subscriber->active              = 1;
        $subscriber->status              = $status;
        $subscriber->save();

        if($subscriber){
            return redirect()->route('admin.subscribers');
        }else{
            return redirect()->back();
        }
    }
    public function editSubscriber(Request $request, $id = NULL){
        $page  = 'Subscriber';
        $icon  = 'file.png';
        $subscriber = Subscriber::where('id',$id)->first();
        if(Auth::user()->role == 1){
            return view('admin.subscribers.edit_subscriber',compact('page','icon','subscriber'));
        }else{
            return redirect()->route('admin');
        }
    }
    public function editSubscriberData(Request $request){
        $request->validate([
            'email'      => 'required|email|unique:subscribers,email,'.$request->id
        ]);
        if($request->status == "on"){
            $status = 1;
        }else{
            $status = 0;
        }
        $subscriber = Subscriber::where('id',$request->id)->first();
        $subscriber->email                = $request->email;
        $subscriber->status              = $status;
        $subscriber->save();

        if($subscriber){
            return redirect()->route('admin.subscribers');
        }else{
            return redirect()->back();
        }
    }
    public function deleteSubscriber($id){
        $subscriber = Subscriber::where('id',$id)->first();
        $subscriber->active = 0;
        $subscriber->save();
        return 1;
    }
}
