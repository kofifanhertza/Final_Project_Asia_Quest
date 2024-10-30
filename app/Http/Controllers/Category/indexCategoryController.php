<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class indexCategoryController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
}
