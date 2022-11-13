<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;

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

Route::controller(PostController::class)->group(function () {
    Route::get('/posts/{id}', 'showPost');
    Route::get('/posts', 'listPosts');
    Route::post('/posts', 'create')->middleware('auth:sanctum');
});

Route::controller(CommentController::class)->group(function () {
    Route::get('/comments/', 'list');
    Route::get('/comments/{id}', 'show');
    Route::post('/comments', 'create')->middleware('auth:sanctum');
});

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

