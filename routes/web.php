<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('test.welcome');
});


// Route::get("categories/", [CategoryController::class, 'index'])->name('category.index');
// Route::get("categories/create", [CategoryController::class, 'create'])->name('category.create');
// Route::post("categories", [CategoryController::class, 'store'])->name('category.store');
// Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
// Route::put('categories/{category}', [CategoryController::class, 'edit'])->name('category.edit');
// Route::get("categories/{category}", [CategoryController::class, 'show'])->name('category.show');


Route::resource('categories', CategoryController::class);