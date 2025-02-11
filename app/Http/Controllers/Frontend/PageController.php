<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('Frontend.index');
    }
    public function about()
    {
        return view('Frontend.about');
    }
    public function collection()
    {
        return view('Frontend.Collection');
    }
    public function cart()
    {
        return view('Frontend.cart');
    }
    public function catalog()
    {
        return view('Frontend.catalog');
    }
    public function contact()
    {
        return view('Frontend.contact');
    }
    public function error()
    {
        return view('errors.404');
    }
    public function jewellery()
    {
        return view('Frontend.jewellery');
    }
    public function productdetail()
    {
        return view('Frontend.productdetail');
    }
    public function testing()
    {
        return view('Frontend.testing');
    }
}
