<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use App\Models\Category;

use Illuminate\Http\Request;
class updateController extends Controller
{
    public function __invoke(Item $item, StoreItemRequest $request)
    {
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->price = $request->input('price');
        $item->image_url = $request->input('image_url');
        $item->stock_quantity  = $request->input('stock_quantity');
        $category = Category::find($request->input('category_id'));
        $category->items()->save($item);


        return redirect()->route('items.index');

    }

}
