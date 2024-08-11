<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/edit/{id}', [UserController::class, 'edit']);
    Route::delete('/user/delete', [UserController::class, 'delete']);
    Route::post('/user/logout', [UserController::class, 'logout']);

    // Post routes 
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/{id}/', [PostController::class, 'show']);
    Route::post('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);
});
