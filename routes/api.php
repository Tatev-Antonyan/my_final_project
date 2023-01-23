<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\PostController;
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
//Route::post('register', [RegisterController::class, 'register']);
//Route::post('login', [LoginController::class, 'login']);
//Route::get('posts', [PostController::class, 'index'])->middleware('auth:api');
//Route::post('posts', [PostController::class, 'store'])->middleware('auth:api');
//Route::get('posts', [PostController::class, 'show']);
//Route::middleware('auth:api')->group( function () {
//    Route::get('own/posts', [PostController::class, 'ownPosts']);
//});
//Route::put('posts', [PostController::class, 'update'])->middleware('auth:api');
//Route::delete('posts', [PostController::class, 'delete'])->middleware('auth.api');
//Route::middleware('auth:api')->group( function () {
//    Route::post('logout', [LoginController::class, 'logout'])->name('logout.api');
//});

Route::prefix('auth')->group(function(){
    Route::post('register', [RegisterController::class, 'register'])->name('register.api');
    Route::post('login', [LoginController::class, 'login'])->name('login.api');
    Route::middleware('auth:api')->group( function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout.api');
    });
});

Route::get('posts', [PostController::class, 'index']);
Route::middleware('auth:api')->group( function () {
    Route::get('own/posts', [PostController::class, 'ownPosts']);
    Route::post('own/posts', [PostController::class, 'store']);
    Route::put('own/posts', [PostController::class, 'update']);
    Route::delete('own/posts', [PostController::class, 'delete']);
});
Route::apiResource('posts', PostController::class);
Route::get('own/search_data/{parameter}', [PostController::class, 'searchByName']);
