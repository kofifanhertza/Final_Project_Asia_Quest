<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class APIProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json($products);
    }
    public function view(Product $product){
        return response()->json($product);
    }

    public function store(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price'); 
        $product->img_url = $request->input('img_url');
        $category = Category::find($request->input('category_id'));
        $category->products()->save($product);

        return response('Product Successfuly Created!',200);

    }

    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name'); 
        $product->description = $request->input('description'); 
        $product->price = $request->input('price');
        $product->img_url = $request->input('img_url');
        $category = Category::find($request->input('category_id')); 
        $category->products()->save($product);

        return response('Product Successfuly Edited!',200);
    }

    public function destroy(Product $product){
        $product->delete();
        return response('Product Successfuly Deleted',200);
    }




}
