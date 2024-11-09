<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use Storage;

class APIStoreController extends Controller
{
    public function index(){
        $stores = Store::all();
        return response()->json($stores);
    }

    public function view(Store $store){

        return response()->json($store);
    }

    public function store(Request $request, Store $store)
    {
        $store->name = $request->input('name');
        $store->description = $request->input('description');
        $store->address = $request->input('address');
        $store->phone_number = $request->input('phone_number'); 
        $store->img_url = $request->input('img_url');
        $store->save();

        return response('Store Successfuly Created!',200);

    }

    public function update(Request $request, Store $store)
    {
        $store->name = $request->input('name');
        $store->description = $request->input('description');
        $store->address = $request->input('address');
        $store->phone_number = $request->input('phone_number'); 
        $store->img_url = $request->input('img_url');
        $store->save();
        return response('Store Successfuly Edited!',200);
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return response('Store Sucessfuly Deleted',200);
    }

}
