<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories =Category::orderBy('id','desc')->where('status',1)->get();
        $products = Product::with('category','brand')->where('status',1)->orderBy('created_at','desc')->get();
        return view('frontend.home.index',compact('categories','products'));
    }
    public function addTocart(Request $request)
    {
       $addtocart = new Cart();
       $addtocart ->ip_address = $request ->ip();
       $addtocart ->product_id = $request ->product_id;
       $addtocart ->qty=1;
       $addtocart ->price = $request ->product_price;
       $addtocart ->total_price =1*$request ->product_price;
       $addtocart ->save();
       app('flasher')->addSuccess('Product has been added to cart successfully');
       return redirect()->back();
    }

  public function Checkout()
  {
    $categories =Category::orderBy('id','desc')->where('status',1)->get();
    $carts =Cart::with('product')->where('ip_address',request()->ip())->get();
    return view('frontend.home.checkout',compact('categories','carts'));
  } 

  public function updateCartProduct(Request $request,$id)
  {
      $updatecartproduct = Cart::find($id);
      $updatecartproduct->qty = $request->qty;
      $updatecartproduct->save();
     return redirect()->back()->with('success','product has been update');
      
  }
  public function deleteCartProduct($id)
  {
    $deletecartproduct = Cart::find($id);
    $deletecartproduct->delete();
    return redirect()->back()->with('error','product has been deleted');
  }

}
