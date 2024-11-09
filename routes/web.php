<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Post;
use App\Models\User;

Route::get('/', function () {
    return view('home');
});

// return data
Route::get('/about', function () {
    return view('about', ['nama' => 'Michael']);
});

Route::get('/blog', function () {
    $title = 'Halaman Blog';

    if (request('search')) {
        $title = 'Search Results for: ' . request('search');
    } elseif (request('category')) {
        $title = 'Articles in Category';
    } elseif (request('author')) {
        $title = 'Articles by Author';
    }

    // $posts = Post::with(['author', 'category'])->latest()->get();
    
    return view('blog', ['title' => $title, 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(5)->withQueryString()]);
});

Route::get('/blog/{post:slug}' , function(Post $post){
    
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}' , function(User $user){
    // $posts = $user->post->load('category', 'author');
    
    return view('blog', ['title' =>count($user->post) . ' Articles by ' .  $user->name, 'posts' => $user->post]);
});

Route::get('/categories/{category:slug}' , function(Category $category){
    // $posts = $category->posts->load('category', 'author');

    return view('blog', ['title' =>' Article in Category: ' .  $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact');
});
