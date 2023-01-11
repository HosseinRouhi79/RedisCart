<?php

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
    return view('welcome');
});
//Route::get('/about',[\App\Http\Controllers\DemoController::class,'about']);
//Route::get('/contact',[\App\Http\Controllers\DemoController::class,'contact']);

//Route::controller(\App\Http\Controllers\DemoController::class)->group(function () {
//   Route::get('/about','about');
//   Route::get('/contact','contact');
//});
