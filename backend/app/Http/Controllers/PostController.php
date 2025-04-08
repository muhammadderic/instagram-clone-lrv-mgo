<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $posts = Post::with('user')->latest()->get();
    return view('posts.index', compact('posts'));
  }
}
