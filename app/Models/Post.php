<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;


    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
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
        return collect(File::files(resource_path("posts")))->map(function ($file) {

            $document = YamlFrontMatter::parseFile($file);

            return new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            );
        });
    }
}
