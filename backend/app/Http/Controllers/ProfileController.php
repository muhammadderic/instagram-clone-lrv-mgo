<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
  public function index(User $user)
  {
    return view('profiles.index', compact('user'));
  }
}
