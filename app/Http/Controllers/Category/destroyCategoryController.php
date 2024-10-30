<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class destroyCategoryController extends Controller
{
    public function __invoke(category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
