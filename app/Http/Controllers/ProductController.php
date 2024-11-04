<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view("products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories=Category::listofOptions();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = 0;
        $category = Category::find($request->input('category_id'));
        $category->products()->save($product);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::listOfOptions();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name'); 
        $product->description = $request->input('description'); 
        $product->price = $request->input('price');
        $category = Category::find($request->input('category_id')); $category->products()->save($product);

        return redirect()->route('products.index');
    }


    public function addStock(Product $product)
    {
        $product->stock = $product->stock + 1;
        $product->save();

        return redirect()->route('products.index');
    }

    public function removeStock(Product $product)
    {
        if ($product->stock > 0) {
            $product->stock = $product->stock - 1;
            $product->save();
        }
        return redirect()->route('products.index');
    }


    public function bulkUpdate( Product $product, Request $request)
    {
        $product->stock=$product->stock + $request->input('stock');
        $product->save();
        return redirect()->route('products.index');
    }

    /**›
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

   
}
