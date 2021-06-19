<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\admin\itemDetailsController;
use App\Http\Controllers\admin\galleryController;
use App\Http\Controllers\admin\transactionAdminController;
use App\Http\Controllers\detailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\transactionController;

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

Route::get('/', [homeController::class,'index']) ->name('home');
Route::get('/items/{category}',[detailController::class,'CategoryPage'])->name('category');
Route::get('/items/detail/{slug}',[detailController::class,'itemDetail'])->name('detail');
Route::get('/transaction/{id}',[transactionController::class,'index'])->name('transaction');
Route::post('/transaction/success',[transactionController::class,'store'])->name('transaction.store');
Route::resource('cart',CartController::class);
Route::resource('itemDetails', itemDetailsController::class);
Route::resource('gallery', galleryController::class);
Route::resource('transaction-admin', transactionAdminController::class);
Route::get('admin/transaction-admin/detail', [transactionAdminController::class,'transactionDetail'])->name('transactionDetail');
require __DIR__.'/auth.php';
