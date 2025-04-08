<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
  return view('home');
})
  ->middleware('auth')
  ->name('home');


Auth::routes();
