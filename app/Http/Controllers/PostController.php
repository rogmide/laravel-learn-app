<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;


class PostController extends Controller
{


    // COMMUN ACTIONS 
    // index, _show, create, store, edit, update, destroy

    public function index()
    {

        // WAYS FOR USERS RESTRICTION
        // dd(Gate::allows('admin'));

        // can and cannot method allways return a bool
        // request()->user()->can('admin');
        // request()->user()->cannot('admin');

        // This is the best way so far
        // $this->authorize('admin');

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

        return $posts->paginate(9);
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

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            // 'thumbnail' => 'required|image',
            'thumbnail' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();
        // $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');

        Post::create($attributes);
        // Post::created($attributes);

        return redirect('/');
    }
}
