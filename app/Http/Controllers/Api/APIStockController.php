<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Store;
use App\Models\Product;

class APIStockController extends Controller
{
    public function index(Store $store)
{
    $stocks = Stock::where('store_id', $store->id)
        ->with(['product:id,name,price,category_id', 'product.category:id,name'])// Only load the `name` and `price` fields
        ->get();

    $response = $stocks->map(function ($stock) {
        return [
            'id' => $stock->id,
            'quantity' => $stock->quantity,
            'product_id' => $stock->product_id,
            'store_id' => $stock->store_id,
            'product_name' => $stock->product->name,
            'product_price' => $stock->product->price,
            'category_name'=> $stock->product->category->name,
            'created_at' => $stock->created_at,
            'updated_at' => $stock->updated_at,
        ];
    });

    return response()->json($response);
}

public function productsNotInStock(Store $store)
{
    $inStockProductIds = Stock::where('store_id', $store->id)->pluck('product_id');

    $productsNotInStock = Product::whereNotIn('id', $inStockProductIds)->get();

    return response()->json($productsNotInStock);
}


    public function store( Stock $stock ,Store $store, Product $product){
    
        $stock->store_id = $store->id;
        $stock->product_id = $product->id;
        $stock->quantity = 0 ;
        $stock->save();
        return response('Stock Successfuly Created!',200);
        
    }

public function view(Store $store,Stock $stock){
    return response()->json($stock);

}

    public function addQuantity(Store $store, Stock $stock){
        $stock->quantity = $stock->quantity + 1;
        $stock->save();
        return response()->json($stock);
    }

    public function substractQuantity(Store $store, Stock $stock){
        if ($stock->quantity > 0) {
            $stock->quantity = $stock->quantity - 1;
            $stock->save();
        }
        return response()->json($stock);
    }

    public function bulkAddQuantity(Store $store, Stock $stock, Request $request){
        $stock->quantity = $stock->quantity + $request->input('quantity');
        $stock->save();
        return response()->json($stock);
    }

    public function bulkSubstractQuantity(Store $store, Stock $stock, Request $request){
        $stock->quantity = $stock->quantity - $request->input('quantity');
        $stock->save();
        return response()->json($stock);
    }

    public function deleteStock(Store $store, Stock $stock){
    $stock->delete();
    return response('Stock Succesfuly Deleted',200);
    }


}
