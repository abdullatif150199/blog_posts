@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Posts</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<a href="/dashboard/categories/create" class="text-decoration-none btn btn-primary mb-3">Create New Categories</a>
<div class="row">
    <div class="col-md-8">
        <table class="table table-striped table-sm col-lg-8">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)  
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><span data-feather="x-circle"></span></button>
                        </form>
                    </td>
                </tr> 
                @endforeach
            </tbody>
          </table>
        
    </div>
</div>

@endsection
