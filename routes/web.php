<?php

use App\Http\Controllers\Category\createCategoryController;
use App\Http\Controllers\Category\destroyCategoryController;
use App\Http\Controllers\Category\editCategoryController;
use App\Http\Controllers\Category\indexCategoryController;
use App\Http\Controllers\Category\showCategoryController;
use App\Http\Controllers\Category\storeCategoryController;
use App\Http\Controllers\Category\updateCategoryController;
use App\Http\Controllers\Item\createController;
use App\Http\Controllers\Item\destroyController;
use App\Http\Controllers\Item\editController;
use App\Http\Controllers\Item\indexController;
use App\Http\Controllers\Item\showController;
use App\Http\Controllers\Item\storeController;
use App\Http\Controllers\Item\updateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Item
Route::post('/items/store', storeController::class)->name('items.store');
Route::put('/items/{item}', updateController::class)->name('items.update');

Route::get('/items/create', createController::class)->name('items.create');
Route::get('/items', indexController::class)->name('items.index');
Route::get('/items/{item}', showController::class)->name('items.show');
Route::get('/items/{item}/edit', editController::class)->name('items.edit');

Route::delete('/items/{item}/destroy', destroyController::class)->name('items.destroy');


// Category
Route::post('/categories/store', storeCategoryController::class)->name('categories.store');
Route::put('/categories/{category}', updateCategoryController::class)->name('categories.update');

Route::get('/categories/create', createCategoryController::class)->name('categories.create');
Route::get('/categories', indexCategoryController::class)->name('categories.index');
Route::get('/categories/{category}', showCategoryController::class)->name('categories.show');
Route::get('/categories/{category}/edit', editCategoryController::class)->name('categories.edit');

Route::delete('/categories/{category}/destroy', destroyCategoryController::class)->name('categories.destroy');

require __DIR__.'/auth.php';
