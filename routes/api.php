<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;


//   /api/admin/
Route::prefix('admin')->group(function(){
Route::post('/register',[RegisterController::class,'register']);
Route::post('/login',[LoginController::class,'login']);
Route::post('/loginc',[LoginController::class,'loginc']);
});



Route::middleware(['auth:sanctum'])->group(function () {
    
    Route::get('/user',function (Request $request){
        return $request->user();
     
    });
    Route::post('logout', [LogoutController::class, 'logout']);
    Route::post('logout_cookie', [LogoutController::class, 'logout_cookie']);
});