<?php

namespace App\Http\Controllers\Item;
use App\Http\Controllers\Controller;
use App\Models\Item;

class indexController extends Controller
{
    public function __invoke()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }
}
