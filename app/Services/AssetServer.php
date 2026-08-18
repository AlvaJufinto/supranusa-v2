<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class AssetServer
{
    public function upload(UploadedFile $file): array
    {
        $endpoint = config('services.asset_server.url') . '/post';

        $response = Http::timeout(30)
            ->attach(
                'file',
                fopen($file->getRealPath(), 'r'),
                $file->getClientOriginalName()
            )
            ->post($endpoint);

        if (!$response->successful()) {
            throw new RuntimeException('Asset server request failed.');
        }

        $data = $response->json();

        if (!($data['success'] ?? false)) {
            throw new RuntimeException('Asset server rejected the upload.');
        }

        return [
            'url' => $data['url'],
            'filename' => $data['filename'],
            'mime_type' => $data['mime_type'],
            'size' => $data['size'],
        ];
    }
}
