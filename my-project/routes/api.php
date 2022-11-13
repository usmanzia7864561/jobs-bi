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

Route::controller(PostController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/posts', 'list');
    Route::post('/posts', 'create');
    Route::get('/posts/{id}', 'show');
});

// Route::controller(CommentController::class)->middleware('auth:sanctum')->group(function () {
//     Route::get('/comments', 'list');
//     Route::post('/comments', 'create');
//     Route::get('/comments/{id}', 'show');
// });

Route::resource('comments', CommentController::class)->middleware('auth:sanctum')->only([
    'index', 'show', 'store'
]);

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

