<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostActivityController;
use App\Http\Controllers\CategoryController;

// Posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::put('/posts/{id}', [PostController::class,'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);

// Users
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// Categories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

// Tags
Route::get('/tags', [TagController::class, 'index']);
Route::get('/tags/{id}', [TagController::class, 'show']);
Route::post('/tags', [TagController::class,'store']);
Route::put('/tags/{id}', [TagController::class, 'update']);
Route::delete('/tags/{id}', [TagController::class, 'destroy']);

// Post Tags (Many-to-Many Relationship)
Route::post('/posts/{postId}/tags/{tagId}', [PostTagController::class, 'attach']);
Route::delete('/posts/{postId}/tags/{tagId}', [PostTagController::class, 'detach']);

// Post Activities
Route::get('/post-activities', [PostActivityController::class, 'index']);
Route::get('/post-activities/{id}', [PostActivityController::class, 'show']);
Route::post('/post-activities', [PostActivityController::class, 'store']);
Route::delete('/post-activities/{id}', [PostActivityController::class, 'destroy']);


Route::get('/', function () {
    return view('welcome');
});
