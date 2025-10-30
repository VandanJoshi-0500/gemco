<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;


class PageController extends Controller
{
    // public function index()
    // {

    //     $products = Product::latest()->take(4)->get(); // fetch latest 4 products
    //     return view('frontend.page.index', compact('products'));
    // }
    public function about()
    {
        return view('frontend.page.about');
    }
    public function collections()
    {
        return view('frontend.page.collections');
    }
    public function cart()
    {
        return view('frontend.page.cart');
    }

    public function error()
    {
        return view('errors.404');
    }
    public function jewellery()
    {
        return view('frontend.page.jewellery');
    }
    public function productdetail()
    {
        return view('frontend.page.productdetail');
    }
    public function testing()
    {
        return view('frontend.page.testing');
    }
}
