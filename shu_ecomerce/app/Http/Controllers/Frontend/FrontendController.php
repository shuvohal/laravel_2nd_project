<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories =Category::orderBy('id','desc')->where('status',1)->get();
        $products = Product::with('category','brand')->where('status',1)->orderBy('created_at','desc')->get();
        return view('frontend.home.index',compact('categories','products'));
    }
}
