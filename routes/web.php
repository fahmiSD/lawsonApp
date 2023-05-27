<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterStatusController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderItemsController;

use App\Http\Controllers\SalesController;

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
})->name('home');

Route::resource('/master', MasterStatusController::class);
Route::resource('/merchant', MerchantController::class);
Route::resource('/city', CityController::class);
Route::resource('/user', UserController::class);
Route::resource('/product', ProductController::class);
Route::resource('/orderItems', OrderItemsController::class);

Route::get('/sales', [SalesController::class, 'index']);

Route::get('/sales/export', [SalesController::class, 'export']);
Route::get('/sales/exportPerBulan', [SalesController::class, 'exportPerBulan']);
Route::get('/sales/exportPerProduct', [SalesController::class, 'exportPerProduct']);
Route::get('/sales/exportPerCity', [SalesController::class, 'exportPerCity']);
Route::get('/sales/exportPerUser', [SalesController::class, 'exportPerUser']);

Route::get('/sales/kirimPerBulan', [SalesController::class, 'kirimPerBulan']);
