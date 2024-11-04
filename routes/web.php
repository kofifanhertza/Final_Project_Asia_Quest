<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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



Route::patch('/products/{product}/addStock', [ProductController::class, 'addStock'])->name('products.addStock');
Route::patch('/products/{product}/removeStock', [ProductController::class, 'removeStock'])->name('products.removeStock');
Route::patch('/products/{product}/bulkUpdate', [ProductController::class, 'bulkUpdate'])->name('products.bulkUpdate');

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);



require __DIR__.'/auth.php';
