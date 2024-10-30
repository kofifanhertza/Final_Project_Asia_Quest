<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Models\Category;
use App\Models\Item;

class storeController extends Controller
{
    public function __invoke(StoreItemRequest $request, item $item)
    {
            $item->name = $request->input('name');
            $item->description = $request->input('description');
            $item->price = $request->input('price');
            $item->image_url = $request->input('image_url');
            $category = Category::find($request->input('category_id'));
            $item->stock_quantity = $request->input('stock_quantity');
            $category->items()->save($item);

        return redirect('/items');
    }

}
