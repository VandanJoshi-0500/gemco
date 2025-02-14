<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


// Testing Route
Route::get('/testing',[PageController::class,'testing']);


// User Pages Routes
Route::get('/',[PageController::class,'index']);
Route::get('/home',[PageController::class,'index']);
Route::get('/about',[PageController::class,'about']);
Route::get('/collection',[PageController::class,'collection']);
Route::get('/jewellery',[PageController::class,'jewellery']);
Route::get('/catalog',[PageController::class,'catalog']);
Route::get('/contact',[PageController::class,'contact']);
Route::get('/error',[PageController::class,'error']);
Route::get('/cart',[PageController::class,'cart']);
Route::get('/detail',[PageController::class,'detail']);
Route::get('/userlogin',[LoginController::class,'index']);


// Admin Routes

// Route::get('/admin', [AdminController::class, 'adminlogin']);



Route::get('/admin/dashboard',[AdminController::class,'admindashboard']);

// customers section routes
Route::get('/admin/customer',[AdminController::class,'manage_customers']);
Route::get('/admin/customer-groups',[AdminController::class,'manage_customer_groups']);

// catalog section routes
Route::get('/admin/products',[AdminController::class,'products']);
Route::get('/admin/categories',[AdminController::class,'categories']);
Route::get('/admin/collections',[AdminController::class,'collections']);
Route::get('/admin/banners',[AdminController::class,'banners']);

// event route
Route::get('/admin/events',[AdminController::class,'events']);

// admin pages route
Route::get('/admin/pages',[AdminController::class,'pages']);

// subscribers route
Route::get('/admin/subscribers',[AdminController::class,'subscribers']);

// subscribers route
Route::get('/admin/wishlist',[AdminController::class,'wishlist']);

// contact-inquiries route
Route::get('/admin/contact-inquiries',[AdminController::class,'contact_inquiries']);

// catalog-requests route
Route::get('/admin/catalog-requests',[AdminController::class,'catalog_requests']);

// admin
Route::get('/admin', [AuthController::class, 'index'])->name('admin');
// Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('admin-login', [AuthController::class, 'adminLogin'])->name('admin_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');






// Admin Profile settings route
Route::get('/admin/settings',[AdminController::class,'adminsetting']);

// Admin Profile view route
Route::get('/admin/view-profile',[AdminController::class,'admin_view_profile']);



// Route::get('/clear-all-cache', function () {
//     Artisan::call('cache:clear');
//     Artisan::call('route:clear');
//     Artisan::call('config:clear');
//     Artisan::call('view:clear');
//     Artisan::call('optimize:clear');
//     return 'All caches cleared successfully!';
// });
