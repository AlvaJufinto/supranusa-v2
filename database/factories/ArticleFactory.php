<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        $title = fake()->sentence(fake()->numberBetween(4, 8));
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . fake()->unique()->randomNumber(5),
            'thumbnail' => null,
            'excerpt' => fake()->paragraph(),
            'content' => '<p>' . fake()->paragraphs(3, true) . '</p>',
            'status' => 'published',
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'meta_title' => $title,
            'meta_description' => fake()->sentence(),
            'meta_keywords' => null,
            'og_image' => null,
        ];
    }
}
