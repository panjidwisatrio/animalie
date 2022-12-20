<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
            'title' => fake()->sentence(mt_rand(3, 5)),
            'slug' => fake()->slug(),
            'content' => fake()->paragraph(mt_rand(5, 10)),
            'views' => fake()->numberBetween(1, 100),
            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 3),
        ];
    }
}
