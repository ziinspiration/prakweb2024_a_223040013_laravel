<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Ilham Ramadhana Hartono', 'title' => 'About']);
});

Route::get('/posts', function () {
    // Dengan Eager Loading
    // $posts = Post::with(['author', 'category'])->latest()->get();
    // return view('posts', ['title' => 'Blog', 'posts' => $posts]);

    $posts = Post::latest()->get();
    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/authors/{user:username}', function (User $user) {
    // Dengan Lazy Eager Loading
    // $posts = $user->posts->load('category', 'author');
    // return view('posts', ['title' => count($posts) . ' Articles by ' . $user->name, 'posts' => $posts]);

    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
    // Dengan Lazy Eager Loading
    // $posts = $category->posts->load('category', 'author');
    // return view('posts', ['title' => 'Articles in Category : ' . $category->name, 'posts' => $posts]);

    return view('posts', ['title' => 'Articles in Category : ' . $category->name, 'posts' => $category->posts]);
});
