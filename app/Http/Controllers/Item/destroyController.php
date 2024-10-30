<?php

namespace App\Http\Controllers\Item;
use App\Http\Controllers\Controller;
use App\Models\Item;

class destroyController extends Controller
{
    public function __invoke(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }
}
