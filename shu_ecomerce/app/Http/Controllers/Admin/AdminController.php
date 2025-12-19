<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminLoginForm()
    {
        return view('backend.admin.login');
    }

    public function adminLogin(Request $request)
    {
       $admin = Admin::where('email',$request->email)->first();
       if(!$admin){
        return redirect()->back()->with('error','Invalid user');
       }else{
           return redirect('/admin/dashboard');
       }
    }
    public function adminDasboard()
    {
        return view('backend.home.index');
    }

    public function Orders()
    {
        $orders = Order::orderBy('created_at','desc')->get();
        return view('backend.Order.Orders',compact('orders'));
    }
}
