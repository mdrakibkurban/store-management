<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReturnProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StocksController;
use App\Http\Controllers\Admin\UserController;
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
    return redirect('/login');
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/categories', CategoryController::class);
    Route::get('/get-categories', [CategoryController::class,'getcategories']);
    Route::resource('/brands', BrandController::class);
    Route::get('/get-brands', [BrandController::class,'getbrands']);
    Route::resource('/sizes', SizeController::class);
    Route::get('/get-sizes', [SizeController::class,'getsizes']);
    Route::resource('/products', ProductController::class);
    Route::get('/products/active/{id}', [ProductController::class,'active']);
    Route::get('/products/inactive/{id}', [ProductController::class,'inactive']);
    Route::get('/get-products', [ProductController::class,'getProducts']);
    

    Route::get('/stocks', [StocksController::class,'stocks'])->name('stocks');
    Route::post('/stocks', [StocksController::class,'store']);
    Route::get('/stocks/history', [StocksController::class,'history']);

    Route::get('/return-product', [ReturnProductController::class,'returnProduct']);
    Route::post('/return-products', [ReturnProductController::class,'store']);
    Route::get('/return-product-list', [ReturnProductController::class,'history']);
  
});


