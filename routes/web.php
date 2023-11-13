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

//route product
Route::get('/products', [productController::class, 'index']);
Route::get('/products/tambah', [productController::class, 'tambah']);
Route::post('/products/store',  [productController::class, 'store']);
Route::get('/products/edit/{id}', [productController::class, 'edit']);
Route::post('/products/update', [productController::class, 'update']);
Route::get('/products/hapus/{id}', [productController::class, 'hapus']);
