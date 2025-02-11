<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\admin\AdminController;

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
Route::get('/admin',[AdminController::class,'admin']);
Route::get('/admin/dashboard',[AdminController::class,'admindashboard']);


