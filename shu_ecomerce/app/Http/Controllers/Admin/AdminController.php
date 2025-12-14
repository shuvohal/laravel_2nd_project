<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
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
           return "Admin Dashboard";
       }
    }
}
