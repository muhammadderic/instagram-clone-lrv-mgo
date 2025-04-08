<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;

// Set homepage to show posts feed (requires authentication)
Route::get('/', [PostController::class, 'index'])
  ->middleware('auth')
  ->name('home');

Auth::routes();

// Post routes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
