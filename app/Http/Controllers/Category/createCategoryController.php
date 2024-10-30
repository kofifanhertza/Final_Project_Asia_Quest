<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;

class createCategoryController extends Controller
{
    public function __invoke()
    {
        return view('category.create');
    }
}
