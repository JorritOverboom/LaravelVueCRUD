<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumUserController;
use App\Http\Controllers\ForumPostController;

Route::get('/users', [ForumUserController::class, 'index']);
Route::get('users/{id}', [ForumUserController::class, 'show']);
Route::post('/users', [ForumUserController::class, 'store']);
Route::put('/users/{id}', [ForumUserController::class, 'update']);
Route::delete('/users/{id}', [ForumUserController::class, 'destroy']);

Route::get('/posts', [ForumPostController::class, 'index']);
Route::get('/posts/{id}', [ForumPostController::class, 'show']);
Route::post('/posts', [ForumPostController::class, 'store']);
Route::put('/posts/{id}', [ForumPostController::class, 'update']);
Route::delete('/posts/{id}', [ForumPostController::class, 'destroy']);