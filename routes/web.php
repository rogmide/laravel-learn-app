<?php

use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\alert;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/post/{post}', function ($slug) {;

    if (!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
        return redirect('/posts');
    }

    // caching stuff see the number 5 represent the time that will be in cache
    cache()->remember("post.{slug}", 5, fn () => file_get_contents($path));

    $post = file_get_contents($path);

    return view('post', ['post' => $post]);
    // constrains
})->where('post', '[A-z_\-]+');
