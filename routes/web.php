<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\AdminPostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Services\Newsletter;
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
// [PostController::class, 'index'] Calling a method from a controller class
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/home', [PostController::class, 'index']);


Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

// Posting Routes
Route::get('/{post:slug}', [PostController::class, '_show']);


// ############ REGISTER START

// MIDDLEWARE VERSION NOT WORKING FOR SOME REASON
// Route::get('/reg/register', [RegisterController::class, 'create'])->middleware('guest');
// Route::post('/reg/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/reg/register', [RegisterController::class, 'create']);
Route::post('/reg/register', [RegisterController::class, 'store']);

// ############ REGISTER END

// MIDDLEWARE VERSION NOT WORKING FOR SOME REASON
// Route::post('/reg/logout', [SessionsController::class, 'destroy'])->middleware('guest');
Route::post('/reg/logout', [SessionsController::class, 'destroy']);
Route::get('/reg/login', [SessionsController::class, 'create']);
Route::post('/reg/login', [SessionsController::class, 'store']);

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['category', 'author']),
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
    // Naming the Routes
})->name('category');


// {author:username} username reflex the key that we are usgin the slug
Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        // there is another way to do it if we create a property in the 
        // class
        'posts' => $author->posts->load(['category', 'author']),
        'categories' => Category::all()
    ]);
});

// API CALL USING MailChimp 
Route::post('/newsletter/members', NewsLetterController::class);

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts/create', [PostController::class, 'store'])->middleware('admin');
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
