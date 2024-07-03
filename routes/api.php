<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumPostsController;
use App\Http\Controllers\ForumUsersController;

Route::get('/posts', [ForumPostsController::class, 'index']);
Route::get('/posts/{id}', [ForumPostsController::class, 'show']);
Route::post('/posts', [ForumPostsController::class, 'store']);
Route::put('/posts/{id}', [ForumPostsController::class, 'update']);
Route::delete('/posts/{id}', [ForumPostsController::class, 'destroy']);

Route::get('/users', [ForumUsersController::class, 'index']);
Route::get('users/{id}', [ForumUsersController::class, 'show']);
Route::post('/users', [ForumUsersController::class, 'store']);
Route::put('/users/{id}', [ForumUsersController::class, 'update']);
Route::delete('/users/{id}', [ForumUsersController::class, 'destroy']);
