<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use App\Models\User;

use Clockwork\Storage\Search;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index () 
    {
    //   $posts = post::latest();

        $title = '';
        if(request('category')) {
            $category = category::firstWhere('slug', request('category'));
            $title = 'in ' . $category->name;
        }

        if(request('user')) {
            $user = User::firstWhere('name', request('user'));
            $title = 'by ' . $user->name;
        }

     
        return view('posts', [
            "title" => "All Posts " . $title,
            // "posts" => post::latest()->filter()->get()
            "posts" => post::latest()->filter(request(['search', 'category']))->paginate(7)->withQueryString()
        ]);
    }

    public function show (post $post) {
        return view ('post', [
            "title" => "single post",
            "post" => $post
     
        ]);
    }
}
