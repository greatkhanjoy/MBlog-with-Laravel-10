<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   $images = [
                'assets/img/news/news-75.webp', 
                'assets/img/news/news-76.webp', 
                'assets/img/news/news-77.webp',
                'assets/img/news/news-78.webp',
                'assets/img/news/news-79.webp',
                'assets/img/news/news-80.webp',
                'assets/img/news/news-81.webp',
                'assets/img/news/news-82.webp',
                'assets/img/news/news-83.webp',
                'assets/img/news/news-84.webp',
                'assets/img/news/news-85.webp',
                'assets/img/news/news-86.webp',
                'assets/img/news/news-90.webp',
                ];
        $title = fake()->unique()->sentence();
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'slug'  => $slug,
            'thumbnail' => fake()->randomElement($images),
            'excerpt' => fake()->paragraph(3),
            'description' => fake()->paragraph(10),
            'user_id'   => User::inRandomOrder()->value('id'),
            'category_id'   => Category::inRandomOrder()->value('id'),
            'status'    => fake()->randomElement(['published', 'pending', 'rejected']),
            'is_featured'    => fake()->randomElement([true, false]),
            'is_trending'    => fake()->randomElement([true, false]),
            'views' => fake()->numberBetween(0, 1000),
        ];
    }
}
