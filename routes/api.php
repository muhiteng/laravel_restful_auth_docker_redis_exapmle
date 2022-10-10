<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\ProfileController;
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
});