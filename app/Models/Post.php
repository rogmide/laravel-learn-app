<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

    public $title;
    public $excerpt;
    public $date;
    public $body;


    public function __construct($title, $excerpt, $date, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    public static function find($slug)
    {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {

            throw new ModelNotFoundException();
        }
        // var_dump($path);
        // caching stuff see the number 1200 represent the time that will be in cache
        return file_get_contents($path);
        // the next line is giving me a error
        // return cache()->remember("post.{slug}", 1200, fn () => file_get_contents($path));
    }

    public static function all()
    {

        $files = file::files(resource_path("posts"));

        return array_map(fn ($file) => $file->getContents(), $files);
    }
}
