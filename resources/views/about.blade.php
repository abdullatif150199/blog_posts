@extends('layouts.main')

    @section('container')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <img src="img/{{ $image }}" width="200px" class="img-thumbnail rounded-circle" >
        </div>
        <div class="col-md-4">
            <h3> nama : {{ $nama }} </h3>
            <h3>email : {{ $email }}</h3>  
            <p> <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex sit deleniti vitae? Maiores libero iste sequi maxime expedita similique laboriosam iure error rem voluptatum, consequuntur dolorem itaque amet deserunt neque.</p> <br> <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex sit deleniti vitae? Maiores libero iste sequi maxime expedita similique laboriosam iure error rem voluptatum, consequuntur dolorem itaque amet deserunt neque.</p> <br></p>
        </div>
    </div>
        
    @endsection
