<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Storage;

class APICategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        $categories = Category::withCount('products')->get();
        return response()->json($categories);
    }

    public function view(Category $category){
        return response()->json($category);
    }

    public function store(Request $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        return response('Category Successfuly Created!',200);

    }

    public function update(Request $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        return response('Category Successfuly Edited!',200);

    }
    public function destroy(Category $category) 
    {
        $category->delete(); 
        return response('Category Successfuly Deleted',200);
    }

}
