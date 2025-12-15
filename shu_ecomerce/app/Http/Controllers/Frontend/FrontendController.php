<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories =Category::orderBy('id','desc')->where('status',1)->get();
        return view('frontend.home.index',compact('categories'));
    }
}
