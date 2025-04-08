@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    @foreach($posts as $post)
    <div class="col-md-8 mb-4">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          @if($post->user)
          <img
            src="{{ $post->user->profile_image ? asset('storage/' . $post->user->profile_image) : 'https://via.placeholder.com/40' }}"
            class="rounded-circle me-3"
            style="width: 40px; height: 40px;">

          <a href="{{ route('profile.show', $post->user->id) }}" class="text-dark text-decoration-none">
            <strong>{{ $post->user->username }}</strong>
          </a>
          @else
          <img
            src="https://via.placeholder.com/40"
            class="rounded-circle me-3"
            style="width: 40px; height: 40px;">
          <span class="text-muted">Deleted User</span>
          @endif
        </div>

        <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top">

        <div class="card-body">
          <!-- create and remove likes -->

          <p>
            <strong>{{ $post->likes->count() }} likes</strong>
          </p>
          @if($post->user)
          <p>
            <strong>{{ $post->user->username }}</strong> {{ $post->caption }}
          </p>
          @else
          <p>{{ $post->caption }}</p>
          @endif
          <a href="{{ route('posts.show', $post->id) }}" class="text-muted">
            View all {{ $post->comments->count() }} comments
          </a>
          <p class="text-muted mt-1">{{ $post->created_at->diffForHumans() }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection