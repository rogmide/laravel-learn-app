<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// the nagetator read the next line is where Json
// json
// return ['foo' => 'bar'];

// Route::get('/', function () {
//     return Post::find('my-last-post');
// });

// Homepage  
Route::get('/', function () {
    return view('posts', [
        // this is basaclly a query to DB Order By last, give me with the caregory and the authors
        'posts' => Post::latest()->with('category', 'author')->get()
    ]);
});

// Posting Routes
Route::get('/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['category', 'author'])
    ]);
});


// {author:username} username reflex the key that we are usgin the slug
Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        // there is another way to do it if we create a property in the 
        // class
        'posts' => $author->posts->load(['category', 'author'])
    ]);
});
