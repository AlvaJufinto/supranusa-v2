<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
	public function run(): void
	{
		$brands = [
			['name' => 'BAC', 'slug' => 'bac', 'image' => 'https://assets.snj.co.id/assets/img/5497508bc714db3ed24d8c3b8069e363.png', 'brand_pdf' => 'https://assets.snj.co.id/assets/pdf/548afcb2b0db09a467a3cd83b074b178.pdf'],
			['name' => 'Hira', 'slug' => 'hira', 'image' => 'https://assets.snj.co.id/assets/img/2addd6235a5a484db581f460a1b25820.jpg', 'brand_pdf' => 'https://assets.snj.co.id/assets/pdf/b5aed48679dd9b8c7ec14fd3660f9552.pdf'],
			['name' => 'Armacell', 'slug' => 'armacell', 'image' => 'https://assets.snj.co.id/assets/img/f9e12d8cb24bebe4fc04e21e8e378c65.png', 'brand_pdf' => 'https://assets.snj.co.id/assets/pdf/9fe8a3e5b5b65cccf44e64ed32fe04ec.pdf'],
			['name' => 'Siemens', 'slug' => 'siemens', 'image' => 'https://assets.snj.co.id/assets/img/cbdaf50f2df4790f89c25e7ffb61514d.png', 'brand_pdf' => 'https://assets.snj.co.id/assets/pdf/d43689151f23b679df929160fbefa901.pdf'],
			['name' => 'Tiger', 'slug' => 'tiger', 'image' => 'https://assets.snj.co.id/assets/img/d2b99ae81e7002ea6bcecf6d8f51c016.png', 'brand_pdf' => 'https://assets.snj.co.id/assets/pdf/9fddf1c38974510251641efd7984092e.pdf'],
			['name' => 'Vasen by Weixing', 'slug' => 'vasen', 'image' => 'https://assets.snj.co.id/assets/img/ad1c193dbfc9ffb51cac26578029af2a.png', 'brand_pdf' => 'https://assets.snj.co.id/assets/pdf/de08eb459396ee81032c01d880ebeef4.pdf'],
			['name' => 'Ducting', 'slug' => 'ducting', 'image' => 'https://assets.snj.co.id/assets/img/06330298c148d28bfbcb0afa9b3820ee.jpg', 'brand_pdf' => 'https://assets.snj.co.id/assets/pdf/7720314c4bd10d3242d67f8b6a79dbd7.pdf'],
		];

		foreach ($brands as $brand) {
			Brand::updateOrCreate(
				['slug' => $brand['slug']],
				['name' => $brand['name'], 'image' => $brand['image'], 'brand_pdf' => $brand['brand_pdf'], 'order' => 0]
			);
		}
	}
}
