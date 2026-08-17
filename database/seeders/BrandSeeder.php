<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['name' => 'BAC', 'slug' => 'bac'],
            ['name' => 'Hira', 'slug' => 'hira'],
            ['name' => 'Armacell', 'slug' => 'armacell'],
            ['name' => 'Siemens', 'slug' => 'siemens'],
            ['name' => 'Tiger', 'slug' => 'tiger'],
            ['name' => 'Vasen', 'slug' => 'vasen'],
            ['name' => 'Ducting', 'slug' => 'ducting'],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(
                ['slug' => $brand['slug']],
                ['name' => $brand['name'], 'order' => 0]
            );
        }
    }
}
