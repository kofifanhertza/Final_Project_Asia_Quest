<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::all();

        return view("products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories=Category::listofOptions();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Stock $stock)
    {

        $stock->store_id = $request->store_id;
        $stock->product_id = $request->product_id;
        $stock->quantity = 0;
        $stock->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        return view('products.show', compact('product'));
    }


    public function addQuantity(Stock $stock)
    {
        $stock->quantity = $stock->quantity + 1;
        $stock->save();
        return redirect()->route('products.index');
    }

    public function substractQuantity(Stock $stock)
    {
        if ($stock->quantity > 0) {
            $stock->quantity = $stock->quantity - 1;
            $stock->save();
        }
        return redirect()->route('products.index');
    }


    public function bulkAddQuantity(Stock $stock, Request $request)
    {
        $stock->quantity=$stock->quantity + $request->input('stock');
        $stock->save();
        return redirect()->route('products.index');
    }

    public function bulkSubstactQuantity(Stock $stock, Request $request)
    {
        $stock->quantity=$stock->quantity - $request->input('stock');
        $stock->save();
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

   
}
