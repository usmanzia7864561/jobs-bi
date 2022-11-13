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

Route::resource('posts', PostController::class)->middleware('auth:sanctum')->only([
    'index', 'show', 'store', 'destroy'
]);

Route::middleware('auth:sanctum')->patch(
    '/posts/{post}/restore',
    [PostController::class, 'restore']
)->middleware('can:restore,post')->withTrashed();

Route::resource('comments', CommentController::class)->middleware('auth:sanctum')->only([
    'index', 'show', 'store', 'destroy'
]);

Route::middleware('auth:sanctum')->patch(
    '/comments/{comment}/restore',
    [CommentController::class, 'restore']
)->middleware('can:restore,comment')->withTrashed();

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

