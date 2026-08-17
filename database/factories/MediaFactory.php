<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    protected $model = Media::class;

    public function definition(): array
    {
        return [
            'filename' => fake()->word() . '.jpg',
            'path' => 'uploads/' . fake()->word() . '.jpg',
            'mime_type' => 'image/jpeg',
            'size' => fake()->numberBetween(1024, 10485760),
            'alt_text' => fake()->sentence(),
            'caption' => fake()->optional()->sentence(),
            'usage' => null,
            'usage_id' => null,
        ];
    }
}
