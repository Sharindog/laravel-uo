<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence(rand(3, 8), false);
        $text  = fake()->realText(rand(1000, 4000));
        $isPublished = rand(1, 5) > 1;
        $createdAt = fake()->dateTimeBetween('-3 months','-2 months');

        return [
                'category_id' => rand(1, 11),
                'user_id' => (rand(1, 5) == 5) ? 1 : 2,
                'title' => $title,
                'slug' => str::slug($title),
                'excerpt' => fake()->text(rand(40, 100)),
                'content_raw' => $text,
                'content_html' => $text,
                'is_published' => $isPublished,
                'published_at' => $isPublished ? fake()->dateTimeBetween('-2 months','-1 days') : null,
                'created_at' => $createdAt,
              ];
    }
}
