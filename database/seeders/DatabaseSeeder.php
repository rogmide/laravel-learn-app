<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use \App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // clear the data in the db before seed it
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();


        /**
         * Category Seeding START
         */
        // Sample how to seed the DB
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        /**
         * Category Seeding END
         */
        /**
         * Category Seeding START
         */


        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In cursus turpis massa tincidunt dui ut ornare lectus. Consectetur a erat nam at. Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet. Diam sit amet nisl suscipit adipiscing bibendum est.'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In cursus turpis massa tincidunt dui ut ornare lectus. Consectetur a erat nam at. Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet. Diam sit amet nisl suscipit adipiscing bibendum est.'
        ]);


        /**
         * Category Seeding END
         */
    }
}
