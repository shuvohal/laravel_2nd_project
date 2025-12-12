<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Inside app/Http/Controllers/ProductController.php
public function index() {
    $products = Product::all();
    return view('products.index', compact('products'));
}

public function create() {
    return view('products.create');
}

public function store(Request $request) {
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'image' => 'image|nullable',
    ]);
    
    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    
    if ($request->hasFile('image')) {
        $product->image = $request->image->store('products');
    }
    
    $product->save();

    return redirect()->route('products.index');
}

public function edit(Product $product) {
    return view('products.edit', compact('product'));
}

public function update(Request $request, Product $product) {
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
    ]);

    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;

    if ($request->hasFile('image')) {
        $product->image = $request->image->store('products');
    }

    $product->save();
    
    return redirect()->route('products.index');
}

public function destroy(Product $product) {
    $product->delete();
    return redirect()->route('products.index');
}

}
