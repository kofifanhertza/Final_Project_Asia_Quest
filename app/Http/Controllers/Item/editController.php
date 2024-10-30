<?php

namespace App\Http\Controllers\Item;
use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Models\Category;

class editController extends Controller
{
    public function __invoke(Item $item)
    {
        $categories = Category::listOfOptions();

        return view('items.edit', compact('item', 'categories'));
    }
}
