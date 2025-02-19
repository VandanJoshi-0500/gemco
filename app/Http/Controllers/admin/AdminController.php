<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function admin()
    // {
    //     return view('admin.adminlogin.admin');
    // }
    public function admindashboard()
    {
        return view('admin.layouts.app');
    }

    //view products page
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
    // admin profile edit
    public function admin_edit_profile()
    {
        return view('admin.profile.edit_profile');
    }


    // all adding routes
    //admin new customer add
    public function addCustomer()
    {
        return view('admin.users.add_user');
    }

    //admin new customer groups add
    public function addCustomerGroups()
    {
        return view('admin.user_groups.add_group');
    }

    // admin product add
    public function addProduct()
    {
        return view('admin.products.add_product');
    }
    // admin collection add
    public function addCollection()
    {
        return view('admin.collections.add_collection');
    }
    // admin banner add
    public function addBanner()
    {
        return view('admin.banners.add_banner');
    }
    // admin event add
    public function addEvent()
    {
        return view('admin.events.add_event');
    }
    // admin page add
    public function addPage()
    {
        return view('admin.pages.add_page');
    }
    // admin subscribers add
    public function addSubscriber()
    {
        return view('admin.subscribers.add_subscriber');
    }
}
