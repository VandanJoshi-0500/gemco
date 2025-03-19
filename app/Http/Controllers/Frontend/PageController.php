<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('Frontend.page.index');
    }
    public function about()
    {
        return view('Frontend.page.about');
    }
    public function collection()
    {
        return view('Frontend.page.Collection');
    }
    public function cart()
    {
        return view('Frontend.page.cart');
    }
    public function catalog()
    {
        return view('Frontend.page.catalog');
    }
    public function contact()
    {
        return view('Frontend.page.contact');
    }
    public function error()
    {
        return view('errors.404');
    }
    public function jewellery()
    {
        return view('Frontend.page.jewellery');
    }
    public function productdetail()
    {
        return view('Frontend.page.productdetail');
    }
    public function testing()
    {
        return view('Frontend.page.testing');
    }
}
