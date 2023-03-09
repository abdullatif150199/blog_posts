@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-4 col-sm-6">
        <main class="form-signin w-100 m-auto">
          <h1 class="h3 mb-3 fw-normal text-center">Register Form</h1>
            <form action="/register" method="post">
              @csrf
              <div class="form-floating ">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"  placeholder="name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating mt-2">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" required value="{{ old('username') }}"> 
                <label for="floatingInput">Username</label>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>
              <div class="form-floating mt-2">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                <label for="floatingInput">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>
              <div class="form-floating mt-2">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
            <small class="d-block text-center mt-3">Already Registered? <a href="/login" class="text-decoration-none">Login</a></small>
          </main>
    </div>
 </div>
@endsection