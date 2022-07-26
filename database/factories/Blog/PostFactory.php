<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(),
            'content' => fake()->text(),
            'image' => fake()->imageUrl,
            'category_id' => DB::table('categories')->pluck('id')->random(),
            'author_id' => DB::table('users')->pluck('id')->random(),
            'likes' => random_int(0,500),
            'is_published' => fake()->randomElement([0,1]),
            'created_at' => fake()->dateTimeBetween('-5 years', '-3 years'),
            'updated_at' => fake()->dateTimeBetween('-2 years', ),
        ];
    }

    public function unverified()
    {

        return $this->state(function (array $attributes) use ($date) {
            return [
            ];
        });
    }
}
