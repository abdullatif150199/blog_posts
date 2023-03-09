<?php

use App\Http\Controllers\admindCategoryController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\postController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;



use Illuminate\Support\Facades\Route;
use App\Models\post;
use App\Models\category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [postController::class, 'index']);

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "nama" => "abdul latif",
        "email" => "ahmadgagah@gmail.com",
        "image" => "gambar1.jpg"
    ]);
});

Route::get('/home', function () {
    return view('home', [
        "title" => "home"
    ]);
});

Route::get('/posts', [postController::class, 'index']);
// halaman single post
Route::get('/post/{post:slug}', [postController::class, 'show']);
Route::get('/categories', function(){
    return view('categories', [
        'title' => 'categories',
        'categories' => category::all()
    ]);
});

Route::get('/categories/{category:slug}', function (category $category) {
    return view('posts', [
        'title' => "Post By Category : $category->name",
        'posts' => $category->post->load('user', 'category')
    ]);
});

Route::get('/authors/{user:name}', function (User $user) {
    return view('posts', [
        'title' => `Post By Author : $user->name`,
        'posts' => $user->post->load('user', 'category'),
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('dashboard/posts/checkSlug', [DashboardPostController::class, 'checkslug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', admindCategoryController::class)->middleware('admin');
Route::resource('/dashboard/users', AdminPostController::class)->middleware('admin');




