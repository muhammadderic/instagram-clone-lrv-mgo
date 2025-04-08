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

  public function create()
  {
    return view('posts.create');
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'caption' => 'required',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = $request->file('image')->store('uploads', 'public');

    auth()->user()->posts()->create([
      'caption' => $data['caption'],
      'image_path' => $imagePath,
    ]);

    return redirect('/profile/' . auth()->user()->id);
  }

  public function show(Post $post)
  {
    return view('posts.show', compact('post'));
  }
}
