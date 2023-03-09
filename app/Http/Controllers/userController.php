<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    function register(Request $request) {
        
       $user = new User;
       $user->name = $request->input('name');
       $user->username= $request->input('username');
       $user->email= $request->input('email');
       $user->password= bcrypt($request->input('password'));
       $user->save();

       return $user;
        
    }
}
