
@extends('layouts.main')

    @section('container')
   @include('partials.sidebar')
    <button class="open-btn" onclick="openNav()"><i class="bi bi-chevron-right"></i></button>
    <h1 class="text-center">{{ $title }}</h1>

      <div class="row  justify-content-center">
        <div class="col-md-6">
          <form action="/posts" >
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
              <button class="btn btn-primary" type="submit" id="button-addon2" >Search</button>
            </div>
          </form>
        </div>
      </div>

    @if ($posts->count()) 
    <div class="card mb-3">
      @if($posts[0]->image)
      <div style="max-height: 400px; overflow: hidden;" >
          <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top mt-2" alt="{{ $posts[0]->category->name }}">
      </div>
      @else
          <img src="https://source.unsplash.com/1200x350?{{ $posts[0]->category->name }}" class="card-img-top mt-2" alt="{{ $posts[0]->category->name }}">
      @endif
      <div class="card-body text-center">
        <h3 class="card-title text-dark"><a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none">{{ $posts[0]->judul }}</h3>
        <p><small class="text-muted"> By <a href="/authors/{{ $posts[0]->user->name }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> In <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none"> {{ $posts[0]->category->name }}</a>  {{ $posts[0]->created_at->diffForHumans() }}</small></p>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/post/{{ $posts[0]->slug }}" class="btn btn-primary" > Read More..</a>
      </div>
    </div>

    <div class="container">
      <div class="row">
        @foreach($posts->skip(1) as $post)
        <div class="col-md-4 col-sm-6 mb-5">
          <div class="card">
            @if($post->image)
            <div style="max-height: 250px; overflow: hidden;" >
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-2" alt="{{ $post->category->name }}" >
            </div>
            @else
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top mt-2" alt="{{ $post->category->name }}">
            @endif
            <div class="card-body">
              <h5 class="card-title text-dark">{{ $post->judul }}</h5>
              <p>
                <small class="text-muted">  By <a href="/posts?user={{ $post->user->name }}" class="text-decoration-none">{{ $post->user->name }}</a> In <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }} </a>{{ $post->created_at->diffForHumans() }}</small>
              </p>
              <p class="card-text">{{ $post->excerpt }}</p>
              <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @else 
    <p class="text-center fs-4">No post founded....</p>
    @endif
    
    <div class="d-flex justify-content-center">

      {{ $posts->links() }}

    </div>
  
        
    @endsection
</body>
</html>