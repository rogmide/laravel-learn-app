<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Post relationship
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // User relationship
    public function author()
    // we have to override the author with user_id
    // because laravel takes the method name and 
    // use that to find the table in db
    // in POST case we dont have to espicify because laravel
    // asumes that post table has a post_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
