<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//public
Route::post('/register',[\App\Http\Controllers\customer\AuthController::class, 'register']);
Route::post('/login',[\App\Http\Controllers\customer\AuthController::class, 'login']);

//sanctum
Route::middleware('auth:sanctum')->group(function (){
   Route::get('/phones',[\App\Http\Controllers\customer\CartController::class,'index']);
   Route::post('/add/phones/{phone}',[\App\Http\Controllers\customer\CartController::class,'addToCart']);
   Route::post('/remove/phones/{phone}',[\App\Http\Controllers\customer\CartController::class,'removeFromCart']);
   Route::get('/phones/result',[\App\Http\Controllers\customer\CartController::class,'result']);
});
