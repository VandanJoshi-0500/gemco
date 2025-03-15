
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\admin\UserGroupController;
use App\Http\Controllers\admin\CollectionController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\PagesController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\WishlistsController;
use App\Http\Controllers\admin\ContactInquiriesController;
use App\Http\Controllers\admin\CatalogRequestsController;
use Illuminate\Support\Facades\Auth;

// Testing Route
// Route::get('/testing',[PageController::class,'testing'])->name('testing');

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


// admin login-logout routes
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/admin', [AuthController::class, 'adminLogin'])->name('admin');
Route::post('admin-login', [AuthController::class, 'adminLogin'])->name('admin_login');




// only view pages on admin login
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard',  [AdminController::class,'admindashboard'])->name('admin.dashboard');


    // admin logout route
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // customer section routes
    Route::get('/admin/add-customer',[AdminController::class, 'addCustomer'])->name('admin.add.user');
    Route::get('/admin/customer-groups',[AdminController::class,'manage_customer_groups'])->name('admin.user.groups');
    Route::get('/admin/add-customer-group',[AdminController::class, 'addCustomerGroups'])->name('admin.customers-group');
    Route::get('/admin/add-customer-groups', [AdminController::class, 'addCustomerGroups'])->name('admin.add_customer_groups');

    // catalog section routes
    Route::get('/admin/products',[AdminController::class,'products'])->name('admin.products');
    Route::get('/admin/add-product',[AdminController::class, 'addProduct'])->name('admin.add_product');
    Route::get('/admin/categories',[AdminController::class,'categories'])->name('admin.categories');
    Route::get('/admin/collections',[AdminController::class,'collections'])->name('admin.collections');
    Route::get('/admin/add-collection',[AdminController::class, 'addCollection'])->name('admin.add_collection');
    Route::get('/admin/banners',[AdminController::class,'banners'])->name('admin.banners');
    Route::get('/admin/add-banner',[AdminController::class, 'addBanner'])->name('admin.add_banner');

    // Events
    Route::get('admin/events', [EventController::class, 'events'])->name('admin.events');
    Route::get('admin/add-event', [EventController::class, 'addEvent'])->name('admin.add_event');
    Route::post('admin/add-event-data', [EventController::class, 'addEventData'])->name('admin.add.event.data');
    Route::get('admin/edit-event/{id}',[EventController::class,'editEvent'])->name('admin.edit_event');
    Route::post('admin/update-event', [EventController::class, 'updateEvent'])->name('admin.update.event');
    Route::get('delete/event/{id}',[EventController::class,'deleteEvent'])->name('delete.event');

    // admin pages route
    Route::get('/admin/pages', [PagesController::class, 'pages'])->name('admin.pages');
    Route::get('/admin/add-page', [PagesController::class, 'addPage'])->name('admin.add_page');
    Route::post('/admin/add-page-data', [PagesController::class, 'addPageData'])->name('admin.add.page.data');
    Route::get('/admin/edit-page/{id}',[PagesController::class,'editPage'])->name('admin.edit_page');
    Route::post('/admin/update-page', [PagesController::class, 'editPageData'])->name('admin.update.page');
    Route::get('/delete/page/{id}',[PagesController::class,'deletePage'])->name('delete.page');


    // subscribers route
    Route::get('/admin/subscribers',[AdminController::class,'subscribers'])->name('admin.subscribers');
    Route::get('/admin/add-subscriber',[AdminController::class, 'addSubscriber'])->name('admin.add_subscriber');

    // wishlist route
    Route::get('/admin/wishlist',[AdminController::class,'wishlist'])->name('admin.wishlists');

    // contact-inquiries route
    Route::get('/admin/contact-inquiries',[AdminController::class,'contact_inquiries'])->name('admin.contact.inquiries');

    // catalog-requests route
    Route::get('/admin/catalog-requests',[AdminController::class,'catalog_requests'])->name('admin.catalog.requests');

    // (Admin Profile route)
    Route::get('/admin/settings',[AdminController::class,'adminsetting'])->name('admin.settings');
    Route::get('/admin/general-settings',[AdminController::class,'general_settings'])->name('admin.general_setting');
    Route::get('/admin/company-settings',[AdminController::class,'company_settings'])->name('admin.company_settings');
    Route::get('/admin/email-settings',[AdminController::class,'email_settings'])->name('admin.email_setting');
    Route::get('/admin/view-profile',[AdminController::class,'admin_view_profile'])->name('admin.view.profile');
    Route::get('/admin/edit-profile',[AdminController::class,'admin_edit_profile'])->name('admin.edit.profile');

    // customers section routes
    Route::get('/admin/customer', [AdminController::class, 'manage_customers'])->name('admin.users');
    //routes for sidebar
    Route::get('/admin/customers', [AdminController::class, 'manage_customers'])->name('admin.customers');
});


Route::get('/clear-all-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return 'All caches cleared successfully!';
});
