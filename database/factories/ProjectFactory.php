<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        $title = fake()->sentence(fake()->numberBetween(4, 8));
        return [
            'brand_id' => Brand::factory(),
            'title' => $title,
            'slug' => Str::slug($title) . '-' . fake()->unique()->randomNumber(5),
            'brand' => fake()->company(),
            'year' => fake()->numberBetween(2015, 2025),
            'company' => fake()->company(),
            'description' => '<p>' . fake()->paragraphs(2, true) . '</p>',
            'thumbnail' => null,
            'tags' => fake()->words(fake()->numberBetween(2, 5)),
            'status' => 'published',
        ];
    }
}
