<?php

namespace App\Http\Controllers\Item;


use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Models\Category;

class createController extends Controller
{
    public function __invoke()
    {
        $categories = Category::listOfOptions();

        return view('items.create', compact('categories'));
    }
}
