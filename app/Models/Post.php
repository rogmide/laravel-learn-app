<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
    public static function find($slug)
    {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }
        // caching stuff see the number 1200 represent the time that will be in cache
        return cache()->remember("post.{slug}", 1200, fn () => file_get_contents($path));
    }
}
