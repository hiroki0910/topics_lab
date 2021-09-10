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

Route::post('/login', [
    App\Http\Controllers\LoginController::class,
    'login'
]);

Route::post('/register', [
    App\Http\Controllers\UserController::class,
    'store'
]);

Route::post('/logout', [
    App\Http\Controllers\LoginController::class,
    'logout'
]);

Route::get('/topics', [
    App\Http\Controllers\TopicController::class,
    'index'
]);

Route::middleware('auth:sanctum')->get('/topic/{topic}', [
    App\Http\Controllers\TopicController::class,
    'show'
]);

Route::middleware('auth:sanctum')->post('/comment', [
    App\Http\Controllers\CommentController::class,
    'store'
]);

Route::middleware('auth:sanctum')->post('/topic', [
    App\Http\Controllers\TopicController::class,
    'store'
]);

Route::middleware('auth:sanctum')->get('/user/{user}', [
    App\Http\Controllers\UserController::class,
    'show'
]);
