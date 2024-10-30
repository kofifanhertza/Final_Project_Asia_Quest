<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;

class storeCategoryController extends Controller
{
    public function __invoke(StoreCategoryRequest $request)
    {
        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index');
    }
}
