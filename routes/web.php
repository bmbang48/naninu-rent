<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\OrderController;
use App\Models\Order;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [CarController::class, 'index']);

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout']);

//Cars Routes
Route::get('cars', [CarController::class, 'index']);
Route::get('cars-collection', [CarController::class, 'cars']);
Route::get('cars/create', [CarController::class, 'create']);
Route::post('cars', [CarController::class, 'store']);
Route::get('cars/{id}/edit', [CarController::class, 'edit']);
Route::patch('cars/{id}', [CarController::class, 'update']);
Route::delete('cars/{id}', [CarController::class, 'destroy']);
Route::get('manage_cars', [CarController::class, 'manage_cars']);
Route::get('cars/search', [CarController::class, 'search_cars']);
Route::get('cars-collection/search', [CarController::class, 'search_cars_collection']);
Route::get('cars/cetak_pdf', [CarController::class, 'cetak_pdf']);

//Order Routes
Route::get('order/{id}', [OrderController::class, 'create']);
Route::post('order/{id}', [OrderController::class, 'store']);
Route::get('confirm_order/{id}', [OrderController::class, 'confirm_order']);
Route::post('confirm_order/{id}', [OrderController::class, 'store_confirm_order']);
Route::get('status_order/{id}', [OrderController::class, 'status_order']);
Route::get('manage_orders', [OrderController::class, 'manage_orders']);
Route::get('order/{id}/edit', [OrderController::class, 'edit']);
Route::patch('order/{id}', [OrderController::class, 'update']);
Route::delete('order/{id}', [OrderController::class, 'destroy']);
Route::post('search-order', [OrderController::class, 'search_order']);
Route::get('orders/cetak_pdf', [OrderController::class, 'cetak_pdf']);
Route::get('status_order/cetak/{id}', [OrderController::class, 'cetak_bukti_bayar']);
// Route::post('order',)