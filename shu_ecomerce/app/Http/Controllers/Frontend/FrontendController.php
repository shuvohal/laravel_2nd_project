<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        $categories =Category::orderBy('id','desc')->where('status',1)->get();
        $products = Product::with('category','brand')->where('status',1)->orderBy('created_at','desc')->get();
        return view('frontend.home.index',compact('categories','products'));
    }
     
    public function productDetails($id,$slug)
    {
      $categories =Category::orderBy('id','desc')->where('status',1)->get();
      $product =Product::with('productDetails')->find($id);
      return view('frontend.home.details',compact('categories','product'));
    }

    public function CategoryProducts($id,$slug)
    {
       $categories =Category::with('products')->orderBy('id','desc')->where('status',1)->get();
       $category = Category::with('products')->find($id);
      return view('frontend.home.category-products',compact('categories','category'));
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

  public function OrderPlace(Request $request)
  {
      $order =new Order();
      $order->name = $request->name;
      $order->ip_address = $request->ip();
      $order->invoice_id = Str::random();
      $order->billing_address = $request->address;
      $order->shipping_address = $request->address;
      $order->phone = $request->phone;
      $order->total_price = $request->total_price;
      $order->total_qty = $request->total_qty;
      $order->save();
      return redirect('/')->with('success','your order has been completed');
  }

  public function userloginRegister()
  {
    $categories =Category::orderBy('id','desc')->where('status',1)->get();
    return view('frontend.home.auth.login-register',compact('categories'));
  }

 public function userRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            // যদি DB তে phone NOT NULL থাকে তাহলে এই লাইন চালু করুন:
            // 'phone' => 'required|string|max:20',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),

            // যদি form এ phone থাকে:
            // 'phone' => $request->phone,

            // যদি address থাকে:
            // 'address' => $request->address,
        ]);

        // ✅ Auto login after registration
        Auth::login($user);

        return redirect('/')->with('success', 'Registration completed & logged in.');
    }

    // Login
    public function userlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login successful.');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    // Logout (optional but recommended)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out.');
    }
}
