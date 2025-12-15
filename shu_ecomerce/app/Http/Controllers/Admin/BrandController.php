<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use  App\Models\Brand;
use  App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function showBrandform()
    {
        $categories = Category::orderBy('id','desc')->where('status',1)->get();
        return view('backend.brand.add',compact('categories'));
    }

    public function showallBrand()
    {
         $brands = Brand::get();
         return view('backend.brand.manage',compact('brands'));
    }

    public function brandStore(Request $request)
    {
        $this->validate($request,[
            'category_id' =>'required|integer',
            'name'=>'required',
            'status' =>'required',
        ]);
         $brand = new Brand();
         $brand->category_id = $request->category_id;
         $brand->name = $request->name;
         $brand->slug = str_replace(' ','-',strtolower($request->name));
         $brand->status = $request->status;
         $brand->save();
         return redirect()->back()->with('success','brand has been created.');
    }

    public function brandEdit($id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.edit',compact('brand'));
    }

    public function brandUpdate(Request $request,$id)
    {
          $this->validate($request,[
            'category_id' =>'required|integer',
            'name'=>'required',
            'status' =>'required',
        ]);

         $brand = Brand::find($id);
          $brand->category_id = $request->category_id;
         $brand->name = $request->name;
         $brand->slug = str_replace(' ','-',strtolower($request->name));
         $brand->status = $request->status;
         $brand->save();
         return redirect()->back()->with('success','brand has been updated.');
    }

    public function brandInactive($id)
    {
      $brand = Brand::find($id);
      $brand->status = 0;
      $brand->save();
      return redirect()->back()->with('success','brand has been Inactive.');
    }

    public function brandActive($id)
    {
      $brand = Brand::find($id);
      $brand->status = 1;
      $brand->save();
      return redirect()->back()->with('success','brand has been active.');
    }

    public function brandDelete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->back()->with('success','brand has been deleted.'); 
    }
}
