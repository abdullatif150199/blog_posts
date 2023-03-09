@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->judul }}</h1>
            <a href="/dashboard/users" class="btn btn-success"><span data-feather="arrow-left"></span> Back To All Posts</a>
            {{-- <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a> --}}
            <form action="/dashboard/users/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('are you sure?')"><span data-feather="x-circle"></span> Delete</button>
            </form>
            @if($post->image)
                <div style="max-height: 400px; overflow: hidden;"  >
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-2" alt="{{ $post->category->name }}">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-2" alt="{{ $post->category->name }}">
            @endif

            <article class="my-3 mt-3">{!! $post->body !!}</article>
        </div>
    </div>
</div>
     
@endsection