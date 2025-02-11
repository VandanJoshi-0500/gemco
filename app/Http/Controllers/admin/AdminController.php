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
}
