<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.adminlogin.admin');
    }
    public function admindashboard()
    {
        return view('admin.layouts.app');
    }
    public function products()
    {
        return view('admin.products.products');
    }
    public function categories()
    {
        return view('admin.category.categories');
    }
    public function collections()
    {
        return view('admin.collections.collections');
    }
    public function banners()
    {
        return view('admin.banners.banners');
    }

    // admin customers section
    public function manage_customers()
    {
        return view('admin.users.users');
    }
    public function manage_customer_groups()
    {
        return view('admin.user_groups.groups');
    }

    // event
    public function events()
    {
        return view('admin.events.events');
    }

    // pages
    public function pages()
    {
        return view('admin.pages.pages');
    }

    // subscribers
    public function subscribers()
    {
        return view('admin.subscribers.subscribers');
    }

    // wishlist
    public function wishlist()
    {
        return view('admin.wishlists.wishlists');
    }

    // contact-inquiries
    public function contact_inquiries()
    {
        return view('admin.contact-inquiries.contact_inquiries');
    }

    // catalog-requests
    public function catalog_requests()
    {
        return view('admin.catalog-requests.index');
    }

    // admin profile settings
    public function adminsetting()
    {
        return view('admin.layouts.setting');
    }
    // sub routes under profile section

    //general setting
    public function general_settings()
    {
        return view('admin.settings.general_settings');
    }
    //company information
    public function company_settings()
    {
        return view('admin.settings.company_settings');
    }
    //email setting
    public function email_settings()
    {
        return view('admin.settings.email_settings');
    }


    // admin profile view
    public function admin_view_profile()
    {
        return view('admin.profile.view_profile');
    }
}
