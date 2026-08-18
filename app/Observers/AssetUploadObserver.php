<?php

namespace App\Observers;

use App\Models\Media;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Article;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class AssetUploadObserver
{
    protected static array $fileFields = [
        Product::class => ['image', 'file'],
        Brand::class => ['image', 'brand_pdf'],
        Article::class => ['thumbnail'],
        Project::class => ['thumbnail'],
    ];

    protected static array $pendingUploads = [];

    public static function setPendingUploads(Model $model, array $uploads): void
    {
        $key = $model::class . ':' . $model->id;
        if ($model->id === null) {
            $key = $model::class . ':pending:' . spl_object_id($model);
        }
        self::$pendingUploads[$key] = $uploads;
    }

    protected static function getAndClearPendingUploads(Model $model): array
    {
        $keyById = $model::class . ':' . ($model->id ?? '');
        $keyByObj = $model::class . ':pending:' . spl_object_id($model);

        $pending = self::$pendingUploads[$keyById]
            ?? self::$pendingUploads[$keyByObj]
            ?? [];

        unset(self::$pendingUploads[$keyById], self::$pendingUploads[$keyByObj]);
        return $pending;
    }

    public function created(Model $model): void
    {
        $pendingUploads = self::getAndClearPendingUploads($model);
        if (empty($pendingUploads)) {
            return;
        }

        $usage = $this->getUsage($model);
        if (!$usage) return;

        foreach ($pendingUploads as $field => $upload) {
            Media::create([
                'usage' => $usage,
                'usage_id' => $model->id,
                'path' => $upload['url'],
                'filename' => $upload['filename'],
                'mime_type' => $upload['mime_type'],
                'size' => $upload['size'],
            ]);
        }
    }

    public function updated(Model $model): void
    {
        $fileFields = self::$fileFields[$model::class] ?? [];
        $original = $model->getOriginal();
        $pendingUploads = self::getAndClearPendingUploads($model);

        foreach ($fileFields as $field) {
            $oldValue = $original[$field] ?? null;
            $newValue = $model->{$field};

            if ($oldValue === $newValue) {
                continue;
            }

            Media::where('usage', $this->getUsage($model))
                ->where('usage_id', $model->id)
                ->where('path', $oldValue)
                ->delete();

            if (!empty($pendingUploads[$field])) {
                $upload = $pendingUploads[$field];
                Media::create([
                    'usage' => $this->getUsage($model),
                    'usage_id' => $model->id,
                    'path' => $upload['url'],
                    'filename' => $upload['filename'],
                    'mime_type' => $upload['mime_type'],
                    'size' => $upload['size'],
                ]);
            }
        }
    }

    public function deleted(Model $model): void
    {
        $usage = $this->getUsage($model);
        if (!$usage) return;

        Media::where('usage', $usage)
            ->where('usage_id', $model->id)
            ->delete();
    }

    protected function getUsage(Model $model): ?string
    {
        return match ($model::class) {
            Product::class => 'product',
            Brand::class => 'brand',
            Article::class => 'article',
            Project::class => 'project',
            default => null,
        };
    }
}
