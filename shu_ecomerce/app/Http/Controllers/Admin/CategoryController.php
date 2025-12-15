<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use  App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategoryform()
    {
        return view('backend.category.add');
    }

    public function showallCategory()
    {
         $categories = Category::get();
         return view('backend.category.manage',compact('categories'));
    }

    public function categoryStore(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'status' =>'required',
        ]);
         $category = new Category();
         $category->name = $request->name;
         $category->slug = str_replace(' ','-',strtolower($request->name));
         $category->status = $request->status;
         $category->save();
         return redirect()->back()->with('success','category has been created.');
    }

    public function categoryEdit($id)
    {
         $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
    }

    public function categoryUpdate(Request $request,$id)
    {
          $this->validate($request,[
            'name'=>'required',
            'status' =>'required',
        ]);

         $category = Category::find($id);
         $category->name = $request->name;
         $category->slug = str_replace(' ','-',strtolower($request->name));
         $category->status = $request->status;
         $category->save();
         return redirect()->back()->with('success','category has been updated.');
    }

    public function categoryInactive($id)
    {
      $category = Category::find($id);
      $category->status = 0;
      $category->save();
       return redirect()->back()->with('success','category has been Inactive.');
    }

    public function categoryActive($id)
    {
      $category = Category::find($id);
      $category->status = 1;
      $category->save();
      return redirect()->back()->with('success','category has been active.');
    }

    public function categoryDelete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success','category has been deleted.'); 
    }
}