<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Log;
class SettingController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }

    public function settings(){
        $settings   = Setting::first();
        $page       = 'Settings';
        $icon       = 'setting.png';
        return view('admin/settings/general_settings',compact('page','icon','settings'));
    }

    public function company_settings(){
        $settings   = Setting::first();
        $page       = 'Company Settings';
        $icon       = 'setting.png';
        return view('admin/settings/company_settings',compact('page','icon','settings'));
    }

    public function email_settings(){
        $settings=Setting::first();
        $page       = 'Email Settings';
        $icon       = 'setting.png';
        return view('admin/settings/email_settings',compact('settings','page','icon'));
    }

    public function save_general_setting(Request $req){
        $req->validate([
            'site_name'         => 'required',
            'site_url'          => 'required',
        ]);
        if($req->has('logo') && $req->file('logo') != null){
            $image = $req->file('logo');
            $destinationPath = public_path('settings/');
            $rand=rand(1,100);
            $docImage = date('YmdHis'). $rand."." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $docImage);
            $img=$docImage;
        }else{
            $img=$req->uploaded_logo;
        }
        if($req->has('favicon') && $req->file('favicon') != null){
            $image1 = $req->file('favicon');
            $destinationPath1 = public_path('settings/');
            if (!file_exists($destinationPath1)) {
                mkdir($destinationPath1, 0755, true);
            }
            $rand1 = rand(1,100);
            $docImage1 = date('YmdHis').$rand1.".".$image1->getClientOriginalExtension();
            $image1->move($destinationPath1, $docImage1);
            $img1 = $docImage1;
        } else {
            $img1 = $req->uploaded_favicon;
        }

        $setting = Setting::first();
        $setting->site_name             = $req->site_name;
        $setting->site_url              = $req->site_url;
        $setting->logo                  = $img;
        $setting->favicon               = $img1;
        $setting->date_format           = $req->date_format;
        $insert=$setting->save();

        $user = User::where('id',Auth::user()->id)->first();
        $log = new Log();
        $log->user_id   = Auth::user()->name;
        $log->module    = 'Settings';
        $log->log       = 'General Settings Updated';
        $log->save();

        return redirect()->route('admin.general_setting');
    }
    public function save_company_setting(Request $req){
        $req->validate([
            'company_name'      => 'required',
            // 'address'           => 'required',
            // 'city'              => 'required',
            // 'state'             => 'required',
            // 'postal_code'       => 'required',
            // 'phone'             => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $setting = Setting::first();
        $setting->company_name      = $req->company_name;
        $setting->address           = $req->address;
        $setting->city              = $req->city;
        $setting->state             = $req->state;
        $setting->postal_code       = $req->postal_code;
        $setting->phone             = $req->phone;
        $setting->gst_number        = $req->gst_number;
        $insert=$setting->save();

        $user = User::where('id',Auth::user()->id)->first();
        $log = new Log();
        $log->user_id   = Auth::user()->name;
        $log->module    = 'Settings';
        $log->log       = 'Company Settings Updated';
        $log->save();

        return redirect()->route('admin.company_settings');
    }
    public function save_email_setting(Request $req){
        $req->validate([
            'admin_email'      => 'required',
            'admin_password'   => 'required'
        ]);

        $setting = Setting::first();
        $setting->admin_email      = $req->admin_email;
        $setting->admin_password   = $req->admin_password;
        $insert=$setting->save();

        $path = base_path('.env');
        $key = 'MAIL_USERNAME';
        $key1 = 'MAIL_PASSWORD';
        $key2 = 'MAIL_FROM_ADDRESS';
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $key . '=' . env($key), $key . '=' . $req->admin_email, file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                $key1 . '=' . env($key1), $key1 . '=' . $req->admin_password, file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                $key2 . '=' . env($key2), $key2 . '=' . $req->admin_email, file_get_contents($path)
            ));
        }
        $user = User::where('id',Auth::user()->id)->first();
        $log = new Log();
        $log->user_id   = Auth::user()->name;
        $log->module    = 'Settings';
        $log->log       = 'Email Settings Updated';
        $log->save();
        return redirect()->route('admin.email_setting');
    }

    public function getUserById(Request $req){
        $user_id = $req->user_id;
        $user = User::where('id',$user_id)->first();
        return $user;
    }
}
