
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
// use App\Http\Controllers\UserController;
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
Route::get('/cart',[PageController::class,'cart'])->name('cart');
Route::get('/detail',[PageController::class,'detail'])->name('detail');
Route::get('/userlogin',[LoginController::class,'index'])->name('user.login');
Route::get('/error',[PageController::class,'error'])->name('error');
// Route::get('/404', [FrontController::class, 'error_404'])->name('not_found');



// admin login-logout routes
Route::get('/admin', [AuthController::class, 'index'])->name('login');
// Route::get('/admin', [AuthController::class, 'adminLogin'])->name('admin');
Route::post('admin-login', [AuthController::class, 'adminLogin'])->name('admin_login');

Route::get('state-by-country/{id}',[UserController::class,'stateByCountry'])->name('stateByCountry');

// only view pages on admin login
Route::middleware(['auth'])->group(function () {
    // admin logout route
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //Dashboard
    Route::get('admin/dashboard',  [AdminController::class,'admindashboard'])->name('admin.dashboard');

    //Setting
    Route::get('admin/settings', [SettingController::class, 'settings'])->name('settings');
    Route::get('admin/general-settings', [SettingController::class, 'settings'])->name('general.setting');
    Route::post('admin/save-general-setting', [SettingController::class, 'save_general_setting'])->name('save_general_settings');
    Route::get('admin/company-settings', [SettingController::class, 'company_settings'])->name('company.setting');
    Route::post('admin/save-company-setting', [SettingController::class, 'save_company_setting'])->name('save_company_settings');
    Route::get('admin/email-settings', [SettingController::class, 'email_settings'])->name('email.setting');
    Route::post('admin/save-email-setting', [SettingController::class, 'save_email_setting'])->name('save_email_settings');

    //Logs
    Route::get('admin/logs', [AdminController::class, 'logs'])->name('admin.logs');

    // customer section routes
    //User
    Route::get('admin/customer', [UserController::class, 'users'])->name('admin.users');
    Route::get('admin/add-customer', [UserController::class, 'addUser'])->name('admin.add.user');
    Route::post('admin/add-customer-data', [UserController::class, 'addUserData'])->name('admin.add.user.data');
    Route::get('admin/edit-customer/{id}', [UserController::class, 'editUser'])->name('admin.edit.user');
    Route::post('admin/update-customer', [UserController::class, 'updateUser'])->name('admin.update.users');
    Route::get('delete/customer/{id}',[UserController::class,'deleteUser'])->name('delete.user');

    //User Group
    Route::get('admin/customer-groups', [UserGroupController::class, 'userGroups'])->name('admin.user.groups');
    Route::get('admin/add-customer-groups', [UserGroupController::class, 'addUserGroup'])->name('admin.add.group');
    Route::post('admin/add-customergroup-data', [UserGroupController::class, 'addUserGroupData'])->name('admin.add.usergroup.data');
    Route::get('delete/customer-group/{id}',[UserGroupController::class,'deleteGroup'])->name('delete.group');
    Route::get('admin/edit-customer-group/{id}', [UserGroupController::class, 'editGroup'])->name('admin.edit.group');
    Route::post('admin/update-customer-group', [UserGroupController::class, 'updateGroup'])->name('admin.update.user');


    // // catalog section routes
    //Categories
    Route::get('admin/categories', [CategoryController::class, 'categories'])->name('admin.categories');
    Route::post('admin/add_category_data', [CategoryController::class, 'addCategoryData'])->name('admin.add_category_data');
    Route::get('admin/edit-category/{id}',[CategoryController::class,'editCategory'])->name('admin.edit_category');
    Route::post('admin/update-category', [CategoryController::class, 'updateCategory'])->name('admin.edit.category');
    Route::get('delete/category/{id}',[CategoryController::class,'deleteCategory'])->name('delete.category');

    // Collection
    Route::get('admin/collections', [CollectionController::class, 'collections'])->name('admin.collections');
    Route::get('admin/add-collection', [CollectionController::class, 'addCollection'])->name('admin.add.collection');
    Route::post('admin/add-collection-data', [CollectionController::class, 'addCollectionData'])->name('admin.add.collection.data');
    Route::get('admin/edit-collection/{id}', [CollectionController::class, 'editCollection'])->name('admin.edit.collection');
    Route::post('admin/update-collection', [CollectionController::class, 'updateCollection'])->name('admin.update.collection');
    Route::get('delete/collection/{id}',[CollectionController::class,'deleteCollection'])->name('delete.collection');

    //Banner
    Route::get('admin/banners', [BannerController::class, 'banners'])->name('admin.banners');
    Route::get('admin/add-banner', [BannerController::class, 'addBanner'])->name('admin.add.banner');
    Route::post('admin/add-banner-data', [BannerController::class, 'addBannerData'])->name('admin.add.banner.data');
    Route::get('admin/edit-banner/{id}',[BannerController::class,'editBanner'])->name('admin.edit_banner');
    Route::get('delete/banner/{id}',[BannerController::class,'deleteBanner'])->name('delete.banner');
    Route::post('admin/update-banner', [BannerController::class, 'editBannerData'])->name('admin.update.banner');

    //Products
    Route::get('admin/products', [ProductController::class, 'products'])->name('admin.products');
    Route::get('admin/add-product', [ProductController::class, 'addProduct'])->name('admin.add_product');
    Route::post('admin/add-product-data', [ProductController::class, 'addProductData'])->name('admin.add.product.data');
    Route::get('admin/edit-product/{id}',[ProductController::class,'editProduct'])->name('admin.edit_product');
    Route::post('admin/update-product', [ProductController::class, 'updateProduct'])->name('admin.update.product');
    Route::get('delete/product/{id}',[ProductController::class,'deleteProduct'])->name('delete.product');
    Route::POST('bulk-product-import', [ProductController::class, 'importExcel'])->name('bulk-product-import');

    // Events
    Route::get('admin/events', [EventController::class, 'events'])->name('admin.events');
    Route::get('admin/add-event', [EventController::class, 'addEvent'])->name('admin.add_event');
    Route::post('admin/add-event-data', [EventController::class, 'addEventData'])->name('admin.add.event.data');
    Route::get('admin/edit-event/{id}',[EventController::class,'editEvent'])->name('admin.edit_event');
    Route::post('admin/update-event', [EventController::class, 'updateEvent'])->name('admin.update.event');
    Route::get('delete/event/{id}',[EventController::class,'deleteEvent'])->name('delete.event');

    //Pages
    Route::get('admin/pages', [PagesController::class, 'pages'])->name('admin.pages');
    Route::get('admin/add-page', [PagesController::class, 'addPage'])->name('admin.add.page');
    Route::post('admin/add-page-data', [PagesController::class, 'addPageData'])->name('admin.add.page.data');
    Route::get('admin/edit-page/{id}',[PagesController::class,'editPage'])->name('admin.edit_page');
    Route::get('delete/page/{id}',[PagesController::class,'deletePage'])->name('delete.page');
    Route::post('admin/update-page', [PagesController::class, 'editPageData'])->name('admin.update.page');

    //Subscribers
    Route::get('admin/subscribers', [SubscriberController::class, 'subscribers'])->name('admin.subscribers');
    Route::get('admin/add-subscriber', [SubscriberController::class, 'addSubscriber'])->name('admin.add.subscriber');
    Route::post('admin/add-subscriber-data', [SubscriberController::class, 'addSubscriberData'])->name('admin.add.subscriber.data');
    Route::get('admin/edit-subscriber/{id}',[SubscriberController::class,'editSubscriber'])->name('admin.edit_subscriber');
    Route::post('admin/update-subscriber', [SubscriberController::class, 'editSubscriberData'])->name('admin.update.subscriber');
    Route::get('delete/subscriber/{id}',[SubscriberController::class,'deleteSubscriber'])->name('delete.subscriber');

    //Subscribers
    Route::get('admin/wishlist', [WishlistsController::class, 'wishlists'])->name('admin.wishlists');
    Route::get('admin/view-wishlist/{id}', [WishlistsController::class, 'wishlistView'])->name('admin.view_wishlist');

    // wishlist route
    // Route::get('/admin/wishlist',[AdminController::class,'wishlist'])->name('admin.wishlists');

    // // contact-inquiries route
    // Route::get('/admin/contact-inquiries',[AdminController::class,'contact_inquiries'])->name('admin.contact.inquiries');

    // // catalog-requests route
    // Route::get('/admin/catalog-requests',[AdminController::class,'catalog_requests'])->name('admin.catalog.requests');

    //Contact Inquiries
    Route::get('admin/contact-inquiries', [ContactInquiriesController::class, 'contactInquiries'])->name('admin.contact.inquiries');
    Route::get('admin/view-contact-inquiry/{id}', [ContactInquiriesController::class, 'contactInquiriesView'])->name('admin.view.contact.inquiries');

    //Catalog Requests
    Route::get('admin/catalog-requests', [CatalogRequestsController::class, 'catalogRequests'])->name('admin.catalog.requests');
    Route::get('admin/catalog-request-detail/{id}', [CatalogRequestsController::class, 'catalogRequestsView'])->name('admin.view.catalog.requests');

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


Route::get('category/{slug}', [FrontController::class, 'show_page_category_collection_all'])->name('show_page_category_collection_all');
Route::get('/{slug}', [FrontController::class, 'show_page'])->name('show_page');
Route::get('category/{coll}/{id}', [FrontController::class, 'show_page_category_collection'])->name('show_page_category_collection');

Route::get('/clear-all-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return 'All caches cleared successfully!';
});
