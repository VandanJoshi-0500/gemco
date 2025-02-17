<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


// Testing Route
Route::get('/testing',[PageController::class,'testing'])->name('testing');


// User Pages Routes
Route::get('/',[PageController::class,'index']);
Route::get('/home',[PageController::class,'index'])->name('home');
Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/collection',[PageController::class,'collection'])->name('collection');
Route::get('/jewellery',[PageController::class,'jewellery'])->name('jewellery');
Route::get('/catalog',[PageController::class,'catalog'])->name('catalog');
Route::get('/contact',[PageController::class,'contact'])->name('contact');
Route::get('/error',[PageController::class,'error'])->name('error');
Route::get('/cart',[PageController::class,'cart'])->name('cart');
Route::get('/detail',[PageController::class,'detail'])->name('detail');
Route::get('/userlogin',[LoginController::class,'index'])->name('user.login');


// Admin Routes

// Route::get('/admin', [AdminController::class, 'adminlogin']);



Route::get('/admin/dashboard',[AdminController::class,'admindashboard'])->name('admin.dashboard');

// customers section routes
Route::get('/admin/customer',[AdminController::class,'manage_customers'])->name('admin.customers');
Route::get('/admin/customer-groups',[AdminController::class,'manage_customer_groups'])->name('admin.customers-group');

// catalog section routes
Route::get('/admin/products',[AdminController::class,'products'])->name('admin.products');
Route::get('/admin/categories',[AdminController::class,'categories'])->name('admin.categories');
Route::get('/admin/collections',[AdminController::class,'collections'])->name('admin.collections');
Route::get('/admin/banners',[AdminController::class,'banners'])->name('admin.banners');

// event route
Route::get('/admin/events',[AdminController::class,'events'])->name('admin.events');

// admin pages route
Route::get('/admin/pages',[AdminController::class,'pages'])->name('admin.pages');

// subscribers route
Route::get('/admin/subscribers',[AdminController::class,'subscribers'])->name('admin.subscribers');

// subscribers route
Route::get('/admin/wishlist',[AdminController::class,'wishlist'])->name('admin.wishlist');

// contact-inquiries route
Route::get('/admin/contact-inquiries',[AdminController::class,'contact_inquiries'])->name('admin.contact_inquiries');

// catalog-requests route
Route::get('/admin/catalog-requests',[AdminController::class,'catalog_requests'])->name('admin.catalog_requests');

// admin
Route::get('/admin', [AuthController::class, 'index'])->name('admin');
// Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('admin-login', [AuthController::class, 'adminLogin'])->name('admin_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



// ADMIN PROFILE SETTING ALL ROUTES

// (Admin Profile settings route)
Route::get('/admin/settings',[AdminController::class,'adminsetting'])->name('admin.settings');
// Admin Profile Setting -> general setting
Route::get('/admin/general-settings',[AdminController::class,'general_settings'])->name('admin.general_setting');
// Admin Profile Setting -> company information
Route::get('/admin/company-settings',[AdminController::class,'company_settings'])->name('admin.company_settings');
// Admin Profile Setting -> email setting
Route::get('/admin/email-settings',[AdminController::class,'email_settings'])->name('admin.email_setting');


// Admin Profile view route
Route::get('/admin/view-profile',[AdminController::class,'admin_view_profile'])->name('admin.view.profile');
// Admin Profile Edit Route
Route::get('/admin/edit-profile',[AdminController::class,'admin_edit_profile'])->name('admin.edit.profile');



// Route::get('/clear-all-cache', function () {
//     Artisan::call('cache:clear');
//     Artisan::call('route:clear');
//     Artisan::call('config:clear');
//     Artisan::call('view:clear');
//     Artisan::call('optimize:clear');
//     return 'All caches cleared successfully!';
// });
