<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = fake()->words(fake()->numberBetween(2, 4), true);
        return [
            'brand_id' => Brand::factory(),
            'name' => ucwords($name),
            'slug' => Str::slug($name) . '-' . fake()->unique()->randomNumber(5),
            'short_description' => fake()->sentence(),
            'description' => '<p>' . fake()->paragraphs(2, true) . '</p>',
            'image' => null,
            'file' => null,
            'order' => fake()->numberBetween(1, 100),
            'status' => 'active',
        ];
    }
}
