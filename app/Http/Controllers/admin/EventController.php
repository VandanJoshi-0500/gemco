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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class EventController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    public function events(Request $request){
        $events = Event::orderBy('id','Desc')->get();
        $page = 'Events';
        $icon = 'event.png';
        return view('admin.events.events',compact('icon','page','events'));
    }
    public function addEvent(){
        $page  = 'Events';
        $icon  = 'event.png';
        if(Auth::user()->role == 1){
            return view('admin.events.add_event',compact('page','icon'));
        }else{
            return redirect()->route('admin');
        }
    }
    public function addEventData(Request $request){
        $request->validate([
            'name'      => 'required|unique:events,name',
        ]);
        if($request->has('image') && $request->file('image') != null){
            $image = $request->file('image');
            $destinationPath = 'public/events/';
            $rand=rand(1,100);
            $docImage = date('YmdHis').$rand. "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $docImage);
            $img=$docImage;
        }else{
            $img='';
        }
        if($request->has('home_image') && $request->file('home_image') != null){
            $home_image = $request->file('home_image');
            $destinationPath1 = 'public/events/';
            $rand1=rand(1,100);
            $docImage1 = date('YmdHis').$rand1. "." . $home_image->getClientOriginalExtension();
            $home_image->move($destinationPath1, $docImage1);
            $img1=$docImage1;
        }else{
            $img1='';
        }
        $event =new Event();
        $event->name              = $request->name;
        $event->order_no          = $request->order_no;
        $event->dates             = $request->dates;
        $event->booth             = $request->booth;
        $event->link              = $request->link;
        $event->logo              = $img;
        $event->home_image        = $img1;
        $event->start_date        = $request->start_date;
        $event->end_date          = $request->end_date;
        $event->status            = 1;
        $event->save();

        if($event){
            return redirect()->route('admin.events');
        }else{
            return redirect()->back();
        }
    }
    public function editEvent(Request $request, $id = NULL){
        $page  = 'Events';
        $icon  = 'event.png';
        $event = Event::where('id',$id)->first();
        if(Auth::user()->role == 1){
            return view('admin.events.edit_event',compact('page','icon','event'));
        }else{
            return redirect()->route('admin');
        }
    }
    public function updateEvent(Request $request){
        $request->validate([
            'name'      => 'required|unique:events,name,'.$request->id,
        ]);
        if($request->has('image') && $request->file('image') != null){
            $image = $request->file('image');
            $destinationPath = 'public/events/';
            $rand=rand(1,100);
            $docImage = date('YmdHis').$rand. "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $docImage);
            $img=$docImage;
        }else{
            $img=$request->uploaded_image;
        }
        if($request->has('home_image') && $request->file('home_image') != null){
            $home_image = $request->file('home_image');
            $destinationPath1 = 'public/events/';
            $rand1=rand(1,100);
            $docImage1 = date('YmdHis').$rand1. "." . $home_image->getClientOriginalExtension();
            $home_image->move($destinationPath1, $docImage1);
            $img1=$docImage1;
        }else{
            $img1=$request->uploaded_event;
        }
        if($request->status == "on"){
            $status = 1;
        }else{
            $status = 0;
        }
        $event = Event::where('id',$request->id)->first();
        $event->name              = $request->name;
        $event->order_no          = $request->order_no;
        $event->dates             = $request->dates;
        $event->booth             = $request->booth;
        $event->link              = $request->link;
        $event->logo              = $img;
        $event->home_image        = $img1;
        $event->start_date        = $request->start_date;
        $event->end_date          = $request->end_date;
        $event->status            = $status;
        $event->save();

        if($event){
            return redirect()->route('admin.events');
        }else{
            return redirect()->back();
        }
    }
    public function deleteEvent($id){
        $event = Event::where('id',$id)->first();
        $event->delete();
        return 1;
    }
}
