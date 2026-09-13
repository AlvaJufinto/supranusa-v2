<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class AssetServer
{
    public function upload(UploadedFile $file): array
    {
        $realPath = $file->getRealPath();

        if ($realPath === false || !is_readable($realPath)) {
            throw new RuntimeException(
                sprintf('File tidak dapat dibaca: %s (%s)', $file->getClientOriginalName(), $realPath)
            );
        }

        $endpoint = config('services.asset_server.url') . '/post';

        $response = Http::timeout(60)
            ->attach(
                'file',
                fopen($realPath, 'r'),
                $file->getClientOriginalName()
            )
            ->post($endpoint);

        if (!$response->successful()) {
            $context = [
                'endpoint' => $endpoint,
                'status' => $response->status(),
                'body' => $response->body(),
                'filename' => $file->getClientOriginalName(),
            ];
            throw new RuntimeException(
                sprintf('Asset server request failed (%d): %s', $response->status(), $response->body())
            );
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
