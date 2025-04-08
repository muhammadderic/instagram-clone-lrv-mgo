<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

// Set homepage to show posts feed (requires authentication)
Route::get('/', [PostController::class, 'index'])
  ->middleware('auth')
  ->name('home');

Auth::routes();

// Post routes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Profile routes
Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
