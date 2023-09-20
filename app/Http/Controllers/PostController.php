<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {

        return view('posts', [
            // this is basaclly a query to DB Order By last, give me with the caregory and the authors
            'posts' => $this->getPost(),
            // 'posts' => Post::latest()->with('category', 'author')->get(),
            'categories' => Category::all()
        ]);
    }

    public function _show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }

    public function getPost()
    {
        $posts = Post::latest();

        if (request('search')) {
            # code...
            // Works like Standard Sql Syntaxs
            $posts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        return $posts->get();
    }
}
