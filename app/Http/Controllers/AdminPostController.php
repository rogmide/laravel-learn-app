<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    //
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            // 'thumbnail' => 'required|image',
            'thumbnail' => 'required',

            // ignore at the end what that do is ignore 
            // the current post so can be change to a new slug
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],

            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);


        $post->update($attributes);
        // Post::created($attributes);

        return back()->with('success', 'Post Updated');
        // return view('posts.edit', ['post' => $post]);

    }
}
