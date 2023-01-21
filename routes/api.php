<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\PostController;
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
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
Route::get('posts', [PostController::class, 'index']);
Route::post('posts', [PostController::class, 'store']);
Route::get('posts', [PostController::class, 'show']);
Route::put('posts', [PostController::class, 'update']);
Route::delete('posts', [PostController::class, 'delete']);

//Route::middleware('auth:api')->group( function () {
//    Route::resource('posts', PostController::class);
//});
//Route::middleware('auth:api')->group( function () {
//    Route::resource('products', ProductController::class);
//});
//Route::middleware('auth:api')->group(function (Request $request) {
//    Route::resource('posts', PostController::class);
//});
//\Illuminate\Support\Facades\Auth::routes();
//Route::apiResource('post',\App\Http\Controllers\PostController::class);