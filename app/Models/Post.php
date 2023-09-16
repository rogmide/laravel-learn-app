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

    // relationship !!! Interensting
    public function category()
    {
        // hasOne, HasMany, belongsTO, belongsToMany
        return $this->belongsTo(Category::class);
    }
}
