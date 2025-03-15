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
use App\Models\ContactInquiry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class ContactInquiriesController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    public function contactInquiries(Request $request){
        $page = 'Contact Inquiries';
        $icon = 'user.png';
        $contact_inquiries = ContactInquiry::all();
        return view('admin.contact-inquiries.contact_inquiries',compact('icon','page','contact_inquiries'));
    }
    public function contactInquiriesView(Request $request, $id = NULL){
        $page = 'Contact Inquiries';
        $icon = 'user.png';
        $contact_inquiry_details = ContactInquiry::findOrFail($id);
        return view('admin.contact-inquiries.contact_inquiries_view',compact('icon','page','contact_inquiry_details'));
    }
}
