<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\LoginController;
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
Route::post('login', [LoginController::class, 'login']);
Route::get('posts', [PostController::class, 'index'])->middleware('auth:api');
Route::post('posts', [PostController::class, 'store'])->middleware('auth:api');
Route::get('posts', [PostController::class, 'show']);
Route::middleware('auth:api')->group( function () {
    Route::get('own/posts', [PostController::class, 'ownPosts']);
});
Route::put('posts', [PostController::class, 'update'])->middleware('auth:api');
Route::delete('posts', [PostController::class, 'delete'])->middleware('auth.api');
Route::middleware('auth:api')->group( function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout.api');
});
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