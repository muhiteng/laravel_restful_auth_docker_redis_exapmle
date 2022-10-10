<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\ProfileController;
use App\Http\Controllers\Linkcontroller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;

//   /api/admin/
Route::prefix('admin')->group(function(){
Route::post('/register',[RegisterController::class,'register']);
Route::post('/login',[LoginController::class,'login']);
Route::post('/loginc',[LoginController::class,'loginc']);
});



Route::middleware(['auth:sanctum'])->group(function () {
    
    // Route::get('/user',function (Request $request){
    //     return $request->user();
     
    // });
    Route::get('/user', [ProfileController::class, 'user']);
        Route::put('users/info', [ProfileController::class, 'updateInfo']);
        Route::put('users/password', [ProfileController::class, 'updatePassword']);
    Route::post('logout', [LogoutController::class, 'logout']);
    Route::post('logout_cookie', [LogoutController::class, 'logout_cookie']);

    Route::get('users', [UsersController::class, 'get_users']);
    Route::get('admins', [UsersController::class, 'get_admins']);
    //(get products) get localhost:8000/api/products
    //(create product )post localhost:8000/api/products
    //(get product by id) get localhost:8000/api/products/2
    //(update product ) put localhost:8000/api/products/2
    //(delete product ) delete localhost:8000/api/products/2

    Route::apiResource('products', ProductController::class);
    Route::get('users/{id}/links', [Linkcontroller::class, 'index']);
    Route::get('orders', [OrderController::class, 'index']);
});


Route::get('product/frontend', [ProductController::class, 'frontend']);
Route::get('product/backend_without_cache', [ProductController::class, 'backend_without_cache']);
Route::get('product/backend', [ProductController::class, 'backend']);