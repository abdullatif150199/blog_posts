
@extends('layouts.main')

    @section('container')
    <h1 class="mb-3">{{ $post->judul }}</h1>

    <p>
        <small class="text-muted">  By <a href="/posts?user={{ $post->user->name }}" class="text-decoration-none">{{ $post->user->name }}</a> In <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }} </a>{{ $post->created_at->diffForHumans() }}</small>
      </p>
    @if($post->image)
        <div style="max-height: 400px; overflow: hidden;">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-2" alt="{{ $post->category->name }}" >
        </div>
    @else
        <img src="https://source.unsplash.com/1200x350?{{ $post->category->name }}" class="card-img-top mt-2" alt="{{ $post->category->name }}">
    @endif
    <article class="my-3 mt-3">{!! $post->body !!}</article>
    <br>
    <br>
    <br>
    <a href="/posts">Back To Posts</a>
    @endsection
</body>
</html>