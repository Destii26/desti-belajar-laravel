<?php

use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\productController;
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

Route::get('/', [PengaturanController::class, 'index']);


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');

Route::get('/products/create', [ProductController::class, 'createForm'])->name('products.createForm');
Route::post('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::get('/products/{product}/edit', [ProductController::class, 'editForm'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
