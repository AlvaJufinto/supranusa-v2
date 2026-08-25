<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
	public function run(): void
	{
		$media = [
			['filename' => '5497508bc714db3ed24d8c3b8069e363.png', 'path' => 'https://assets.snj.co.id/assets/img/5497508bc714db3ed24d8c3b8069e363.png', 'mime_type' => 'image/png', 'size' => 22256, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 1],
			['filename' => '2addd6235a5a484db581f460a1b25820.jpg', 'path' => 'https://assets.snj.co.id/assets/img/2addd6235a5a484db581f460a1b25820.jpg', 'mime_type' => 'image/jpeg', 'size' => 34250, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 2],
			['filename' => 'f9e12d8cb24bebe4fc04e21e8e378c65.png', 'path' => 'https://assets.snj.co.id/assets/img/f9e12d8cb24bebe4fc04e21e8e378c65.png', 'mime_type' => 'image/png', 'size' => 75131, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 3],
			['filename' => 'cbdaf50f2df4790f89c25e7ffb61514d.png', 'path' => 'https://assets.snj.co.id/assets/img/cbdaf50f2df4790f89c25e7ffb61514d.png', 'mime_type' => 'image/png', 'size' => 54573, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 4],
			['filename' => 'd2b99ae81e7002ea6bcecf6d8f51c016.png', 'path' => 'https://assets.snj.co.id/assets/img/d2b99ae81e7002ea6bcecf6d8f51c016.png', 'mime_type' => 'image/png', 'size' => 306789, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 5],
			['filename' => 'ad1c193dbfc9ffb51cac26578029af2a.png', 'path' => 'https://assets.snj.co.id/assets/img/ad1c193dbfc9ffb51cac26578029af2a.png', 'mime_type' => 'image/png', 'size' => 25728, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 6],
			['filename' => '06330298c148d28bfbcb0afa9b3820ee.jpg', 'path' => 'https://assets.snj.co.id/assets/img/06330298c148d28bfbcb0afa9b3820ee.jpg', 'mime_type' => 'image/jpeg', 'size' => 62779, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 7],
			['filename' => 'd43689151f23b679df929160fbefa901.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/d43689151f23b679df929160fbefa901.pdf', 'mime_type' => 'application/pdf', 'size' => 144088, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 4],
			['filename' => '548afcb2b0db09a467a3cd83b074b178.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/548afcb2b0db09a467a3cd83b074b178.pdf', 'mime_type' => 'application/pdf', 'size' => 156063, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 1],
			['filename' => '9fddf1c38974510251641efd7984092e.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/9fddf1c38974510251641efd7984092e.pdf', 'mime_type' => 'application/pdf', 'size' => 232662, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 5],
			['filename' => 'de08eb459396ee81032c01d880ebeef4.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/de08eb459396ee81032c01d880ebeef4.pdf', 'mime_type' => 'application/pdf', 'size' => 78524, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 6],
			['filename' => 'b5aed48679dd9b8c7ec14fd3660f9552.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/b5aed48679dd9b8c7ec14fd3660f9552.pdf', 'mime_type' => 'application/pdf', 'size' => 85581, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 2],
			['filename' => '9fe8a3e5b5b65cccf44e64ed32fe04ec.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/9fe8a3e5b5b65cccf44e64ed32fe04ec.pdf', 'mime_type' => 'application/pdf', 'size' => 290056, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 3],
			['filename' => '7720314c4bd10d3242d67f8b6a79dbd7.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/7720314c4bd10d3242d67f8b6a79dbd7.pdf', 'mime_type' => 'application/pdf', 'size' => 207745, 'alt_text' => null, 'caption' => null, 'usage' => 'brand', 'usage_id' => 7],
			['filename' => 'a992ac17b9af7d60a773d86f35ac7838.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/a992ac17b9af7d60a773d86f35ac7838.pdf', 'mime_type' => 'application/pdf', 'size' => 445520, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 12],
			['filename' => 'aaf900a9c3c2e9d556c712360598f867.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/aaf900a9c3c2e9d556c712360598f867.pdf', 'mime_type' => 'application/pdf', 'size' => 1200822, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 13],
			['filename' => '1059131f84a2dba8e0f9d6393b7afafe.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/1059131f84a2dba8e0f9d6393b7afafe.pdf', 'mime_type' => 'application/pdf', 'size' => 7301907, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 14],
			['filename' => 'bdbc60b1f7e5391be6965e7b3f1322ab.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/bdbc60b1f7e5391be6965e7b3f1322ab.pdf', 'mime_type' => 'application/pdf', 'size' => 3882725, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 15],
			['filename' => '0bcd9ced9ccb03574446cfb218a6610f.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/0bcd9ced9ccb03574446cfb218a6610f.pdf', 'mime_type' => 'application/pdf', 'size' => 2545314, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 16],
			['filename' => 'c7014772c1519a6fddca578691ffc6ce.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/c7014772c1519a6fddca578691ffc6ce.pdf', 'mime_type' => 'application/pdf', 'size' => 1670418, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 17],
			['filename' => 'ebbc83980f0c40ca485133b43d94a1c7.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/ebbc83980f0c40ca485133b43d94a1c7.pdf', 'mime_type' => 'application/pdf', 'size' => 2161523, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 1],
			['filename' => '7ef14e8f3851e2ea77170749aff0bd38.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/7ef14e8f3851e2ea77170749aff0bd38.pdf', 'mime_type' => 'application/pdf', 'size' => 541499, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 2],
			['filename' => 'f60afcc8ac8a18a68c3ddd526c32f344.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/f60afcc8ac8a18a68c3ddd526c32f344.pdf', 'mime_type' => 'application/pdf', 'size' => 9677768, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 3],
			['filename' => '8c783d3c69c61c42756170b681a05fc9.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/8c783d3c69c61c42756170b681a05fc9.pdf', 'mime_type' => 'application/pdf', 'size' => 5184537, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 4],
			['filename' => '27c14d55bb9a117cf9b25cd6fc2101c7.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/27c14d55bb9a117cf9b25cd6fc2101c7.pdf', 'mime_type' => 'application/pdf', 'size' => 12329761, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 5],
			['filename' => 'd54e09c1e82a509c72e6bb2a68c0df81.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/d54e09c1e82a509c72e6bb2a68c0df81.pdf', 'mime_type' => 'application/pdf', 'size' => 1744713, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 6],
			['filename' => 'b9c492063f6f54103c3371b3eab865ed.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/b9c492063f6f54103c3371b3eab865ed.pdf', 'mime_type' => 'application/pdf', 'size' => 1595969, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 7],
			['filename' => 'da8e2f1ce68ab1a6748672d9c33db2ec.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/da8e2f1ce68ab1a6748672d9c33db2ec.pdf', 'mime_type' => 'application/pdf', 'size' => 1704058, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 8],
			['filename' => '6948d1ccf4468add4210bcffd722adac.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/6948d1ccf4468add4210bcffd722adac.pdf', 'mime_type' => 'application/pdf', 'size' => 13957564, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 9],
			['filename' => 'cdcba8918a868e3cc8ec348be42391ef.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/cdcba8918a868e3cc8ec348be42391ef.pdf', 'mime_type' => 'application/pdf', 'size' => 1362138, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 10],
			['filename' => '71b532d48e1179306cfde27c63ffc9cc.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/71b532d48e1179306cfde27c63ffc9cc.pdf', 'mime_type' => 'application/pdf', 'size' => 5262717, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 11],
			['filename' => '3ad77071bc1155560e0ed054e48d4abf.pdf', 'path' => 'https://assets.snj.co.id/assets/pdf/3ad77071bc1155560e0ed054e48d4abf.pdf', 'mime_type' => 'application/pdf', 'size' => 6885888, 'alt_text' => null, 'caption' => null, 'usage' => 'product', 'usage_id' => 18],
		];

		foreach ($media as $row) {
			Media::updateOrCreate(
				['filename' => $row['filename']],
				$row
			);
		}
	}
}
