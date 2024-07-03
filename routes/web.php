<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumPostsController;
use App\Http\Controllers\ForumUsersController;

Route::get('/', function () {
    return view('app');
})->name('application');

Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!api).*$');

Route::get('/api/posts', [ForumPostsController::class, 'index'])->name('posts.readAllPosts');
Route::get('/api/post/{id}', [ForumPostsController::class, 'show'])->name('posts.readSinglePost');
Route::post('/api/posts', [ForumPostsController::class, 'store'])->name('posts.createPost');
Route::put('/api/posts/{id}', [ForumPostsController::class, 'update'])->name('posts.updatePost');
Route::delete('/api/posts/{id}', [ForumPostsController::class, 'destroy'])->name('posts.deletePost');

// Route::get('/api/users', [ForumUsersController::class, 'index'])->name('users.readAllUsers');
// Route::get('/api/users/{id}', [ForumUsersController::class, 'show'])->name('users.readSingleUser');
// Route::post('/api/users', [ForumUsersController::class, 'store'])->name('users.createUser');
// Route::put('/api/users/{id}', [ForumUsersController::class, 'update'])->name('users.updateUser');
// Route::delete('/api/users/{id}', [ForumUsersController::class, 'destroy'])->name('users.deleteUser');