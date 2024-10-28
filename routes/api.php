<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// راوتات تسجيل الدخول والخروج
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// عرض المنتجات
Route::get('/products', [ProductController::class, 'index']); // عرض جميع المنتجات بصيغة JSON
Route::get('/products/category/{categoryId}', [ProductController::class, 'getByCategory']); // عرض المنتجات حسب التصنيف بصيغة JSON

Route::middleware('auth:sanctum')->post('/orders', [OrderController::class, 'placeOrder']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// API
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('api.admin.dashboard');
    Route::get('admin/products', [DashboardController::class, 'products'])->name('api.admin.products');
    Route::get('admin/orders', [DashboardController::class, 'orders'])->name('api.admin.orders');
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {

    Route::get('/admin/products', [AdminProductController::class, 'index']);
    Route::post('/admin/products', [AdminProductController::class, 'store']);
    Route::put('/admin/products/{id}', [AdminProductController::class, 'update']);
    Route::delete('/admin/products/{id}', [AdminProductController::class, 'destroy']);
    
});


Route::middleware('auth:sanctum')->post('/orders', [OrderController::class, 'store']);


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});
