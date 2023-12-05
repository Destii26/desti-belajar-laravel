<?php

use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\productController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('products.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pages/admin', [Pengaturancontroller::class, 'admin'])->name('pages.admin');
    Route::get('/pages/user', [Pengaturancontroller::class, 'user'])->name('pages.user');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');

    Route::get('/products/create', [ProductController::class, 'createForm'])->name('products.createForm');
    Route::post('/products/create', [ProductController::class, 'create'])->name('products.create');

    Route::get('/products/{product}/edit', [ProductController::class, 'editForm'])->name('products.edit');
    Route::put('/products/{product}/edit', [ProductController::class, 'update'])->name('products.update');

    Route::get('/products/chart', [ProductController::class, 'chart'])->name('products.chart');
});
require __DIR__ . '/auth.php';
