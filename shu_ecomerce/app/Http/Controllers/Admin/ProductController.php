<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use  App\Models\Category;
use  App\Models\Brand;
use  App\Models\Product;
use  App\Models\ProductDetail;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('backend.product.add',compact('categories','brands'));
    }
    public function manageProduct()
    {
        return view('backend.product.manage');
    }

    public function storeProduct(ProductRequest $request)
    {

        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();
            $image = $request->image->move(public_path('product/'),$imageName);
        }
        $product =new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = str_replace(' ','-',strtolower($request->name));
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->qty = $request->qty;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->status = $request->status;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->image =  $imageName;
        $product->save();

        //Multiple product images
        if($product->save()){
           foreach($request->file('images') as $key => $productImage){

            
            $imagesName =$productImage->getClientOriginalName();
            $images = $productImage->move(public_path('product/'),$imagesName);
        

            $productImages = new ProductDetail();
            $productImages->product_id =$product->id;
            $productImages->images =$imagesName;
            $productImages->save();
           }
        }

       return redirect()->back()->with('success','product has been inserted');
    }
}
