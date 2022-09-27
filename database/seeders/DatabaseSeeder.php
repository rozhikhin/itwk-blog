<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Blog\Tag::factory(30)->create();
        \App\Models\Blog\Category::factory(30)->create();
        \App\Models\Blog\Post::factory(100)->create();
        \App\Models\Blog\PostTag::factory(500)->create();

    }
}
