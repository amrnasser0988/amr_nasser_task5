<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;


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

   // إدارة المنتجات (واجهات Blade)
   Route::get('/products', [AdminProductController::class, 'index']); // عرض المنتجات
   Route::get('/products/create', [AdminProductController::class, 'create']); // عرض نموذج إضافة منتج جديد
   Route::post('/products', [AdminProductController::class, 'store']); // حفظ منتج جديد
   Route::get('/products/{id}/edit', [AdminProductController::class, 'edit']); // عرض نموذج تعديل المنتج
   Route::put('/products/{id}', [AdminProductController::class, 'update']); // تحديث بيانات المنتج
   Route::delete('/products/{id}', [AdminProductController::class, 'destroy']); // حذف المنتج

     // إدارة التصنيفات (واجهات Blade)
     Route::get('/categories', [AdminCategoryController::class, 'index']); // عرض التصنيفات
     Route::get('/categories/create', [AdminCategoryController::class, 'create']); // عرض نموذج إضافة تصنيف جديد
     Route::post('/categories', [AdminCategoryController::class, 'store']); // حفظ تصنيف جديد
     Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit']); // عرض نموذج تعديل التصنيف
     Route::put('/categories/{id}', [AdminCategoryController::class, 'update']); // تحديث بيانات التصنيف
     Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy']); // حذف التصنيف


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
});