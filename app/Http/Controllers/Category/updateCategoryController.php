<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class updateCategoryController extends Controller
{
    public function __invoke(StoreCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index');



    }
}
