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
// Route::get('/posts', function () {
//     return response()->json([
//         [
//             'id' => 1,
//             'postName' => 'Mock Post 1',
//             'postContent' => 'This is the content of mock post 1',
//             'usersId' => 1
//         ],
//         [
//             'id' => 2,
//             'postName' => 'Mock Post 2',
//             'postContent' => 'This is the content of mock post 2',
//             'usersId' => 2
//         ],
//         [
//             'id' => 3,
//             'postName' => 'Mock Post 3',
//             'postContent' => 'This is the content of mock post 3',
//             'usersId' => 3
//         ],
//     ]);
// });
Route::get('/posts/{id}', [ForumPostController::class, 'show']);
Route::post('/posts', [ForumPostController::class, 'store']);
Route::put('/posts/{id}', [ForumPostController::class, 'update']);
Route::delete('/posts/{id}', [ForumPostController::class, 'destroy']);