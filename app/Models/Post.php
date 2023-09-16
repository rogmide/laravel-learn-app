<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // This will avoid mass assigment by guarding the field ID
    // that way cant be modifice by the user

    // i dont have to use this i will not allow mass assigment
    // turn off mass asigment
    // protected $guarded = ['slug'];
    protected $guarded = [];

    // if we declare this property we are saying to the DB
    // every time that you bring a Post bring me with all
    // category and the authos included
    // protected $with = ['category', 'author'];

    // relationship !!! Interensting
    public function category()
    {
        // hasOne, HasMany, belongsTO, belongsToMany
        return $this->belongsTo(Category::class);
    }

    // The name of the method has to be equal to 
    // the field in the database
    // Elequent read user_id as the relationship
    // but we can specifie the forent key as 
    // sec argument to use differents names
    public function author()
    {
        // hasOne, HasMany, belongsTO, belongsToMany
        return $this->belongsTo(User::class, 'user_id');
    }
}
