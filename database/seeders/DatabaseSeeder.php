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

        \App\Models\Role::factory()->create([
            'title' => 'Админитсратор',
            'description' => 'Админитсратор системы'
        ]);
         \App\Models\User::factory()->create([
             'name' => 'Админитсратор',
             'email' => 'admin@itwk.ru',
             'password' => Hash::make('admin'),
             'role_id' => '1',
         ]);

        \App\Models\Blog\Tag::factory(10)->create();
        \App\Models\Blog\Category::factory(10)->create();
        \App\Models\Blog\Post::factory(100)->create();
        \App\Models\Blog\PostTag::factory(500)->create();

    }
}
