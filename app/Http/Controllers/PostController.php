<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use GuzzleHttp\Psr7\Response;

class PostController extends Controller
{


    // COMMUN ACTIONS 
    // index, _show, create, store, edit, update, destroy

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

        return $posts->paginate(6);
    }

    public function create()
    {
        // Route Protection sample START
        // if (auth()->guest()) {
        //     abort(403);
        // }

        // if (auth()->user()->username !== 'rogerdelgado') {
        //     abort(403);
        // }
        // Route Protection sample END

        return view('posts.create');
    }
}
