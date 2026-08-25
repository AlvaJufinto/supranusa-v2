<?php

namespace App\Console\Commands;

use App\Models\Brand;
use App\Models\Product;
use App\Observers\AssetUploadObserver;
use App\Services\AssetServer;
use Illuminate\Console\Command;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class LegacyMigrateAssets extends Command
{
    protected $signature = 'legacy:migrate-assets
                            {--execute : Actually perform migration (omit for dry-run)}
                            {--brand= : Filter by brand slug (e.g. siemens)}
                            {--type= : Filter by type: images, pdfs, all (default: all)}';

    protected $description = 'Migrate assets from web_old to external file storage';

    private array $results = ['uploaded' => 0, 'skipped' => 0, 'failed' => 0];

    private function legacyPath(string $relative): string
    {
        return realpath(base_path('../web_old/' . $relative)) ?: base_path('../web_old/' . $relative);
    }

    public function handle(AssetServer $assetServer): int
    {
        $execute = $this->option('execute');
        $brandFilter = $this->option('brand');
        $typeFilter = $this->option('type') ?? 'all';

        if (!$execute) {
            $this->info('DRY RUN — no changes will be made');
            $this->info('Use --execute to actually migrate');
            $this->info('');
        }

        $this->migrateBrandLogos($assetServer, $brandFilter, $execute);
        $this->migrateCategoryImages($assetServer, $brandFilter, $execute);
        $this->migrateBrandPdfs($assetServer, $brandFilter, $execute);

        if ($typeFilter !== 'images') {
            $this->migrateProductPdfs($assetServer, $brandFilter, $execute);
        }

        $this->info('');
        $this->info("Done — uploaded: {$this->results['uploaded']}, skipped: {$this->results['skipped']}, failed: {$this->results['failed']}");

        return $this->results['failed'] > 0 ? 1 : 0;
    }

    private function migrateBrandLogos(AssetServer $assetServer, ?string $brandFilter, bool $execute): void
    {
        $this->info('--- Brand Logos ---');

        $map = [
            'bac'      => 'assets/logo/brands/bac.png',
            'hira'     => 'assets/logo/brands/hira.jpg',
            'armacell' => 'assets/logo/brands/armacell.png',
            'siemens'  => 'assets/logo/brands/siemens.png',
            'tiger'    => 'assets/logo/brands/tiger.png',
            'vasen'    => 'assets/logo/brands/vasen.png',
        ];

        foreach ($map as $slug => $path) {
            if ($brandFilter && $brandFilter !== $slug) {
                continue;
            }

            $brand = Brand::where('slug', $slug)->first();
            if (!$brand) {
                $this->line("  [SKIP] {$slug}: brand not found");
                $this->results['skipped']++;
                continue;
            }

            if ($brand->image) {
                $this->line("  [SKIP] {$slug}: brands.image already set");
                $this->results['skipped']++;
                continue;
            }

            $fullPath = $this->legacyPath($path);
            if (!file_exists($fullPath)) {
                $this->line("  [MISSING FILE] {$fullPath}");
                $this->results['failed']++;
                continue;
            }

            $this->line("  [BRAND IMAGE] {$slug}: {$path} → brands.image");

            if ($execute) {
                $result = $this->upload($assetServer, $fullPath);
                if ($result) {
                    AssetUploadObserver::setPendingUploads($brand, ['image' => $result]);
                    $brand->image = $result['url'];
                    $brand->save();
                    $this->results['uploaded']++;
                } else {
                    $this->results['failed']++;
                }
            } else {
                $this->results['skipped']++;
            }
        }
    }

    private function migrateCategoryImages(AssetServer $assetServer, ?string $brandFilter, bool $execute): void
    {
        $this->info('--- Category Images ---');

        $map = [
            'bac'      => 'resources/assets/uploads/category/WhatsApp-Image-2025-04-30-at-10.47.09.jpeg',
            'armacell' => 'resources/assets/uploads/category/Insulation.jpg',
            'siemens'  => 'resources/assets/uploads/category/Electrical.jpg',
            'tiger'    => 'resources/assets/uploads/category/Products-5.jpg',
            'hira'     => 'resources/assets/uploads/category/WhatsApp-Image-2025-04-30-at-10.47.10.jpeg',
            'ducting'  => 'resources/assets/uploads/category/Image-1204.jpg',
        ];

        foreach ($map as $slug => $path) {
            if ($brandFilter && $brandFilter !== $slug) {
                continue;
            }

            $brand = Brand::where('slug', $slug)->first();
            if (!$brand) {
                $this->line("  [SKIP] {$slug}: brand not found");
                $this->results['skipped']++;
                continue;
            }

            if ($brand->image) {
                $this->line("  [SKIP] {$slug}: brands.image already set");
                $this->results['skipped']++;
                continue;
            }

            $fullPath = $this->legacyPath($path);
            if (!file_exists($fullPath)) {
                $this->line("  [MISSING FILE] {$fullPath}");
                $this->results['failed']++;
                continue;
            }

            $this->line("  [CATEGORY IMAGE] {$slug}: " . basename($path) . " → brands.image");

            if ($execute) {
                $result = $this->upload($assetServer, $fullPath);
                if ($result) {
                    AssetUploadObserver::setPendingUploads($brand, ['image' => $result]);
                    $brand->image = $result['url'];
                    $brand->save();
                    $this->results['uploaded']++;
                } else {
                    $this->results['failed']++;
                }
            } else {
                $this->results['skipped']++;
            }
        }
    }

    private function migrateBrandPdfs(AssetServer $assetServer, ?string $brandFilter, bool $execute): void
    {
        $this->info('--- Brand PDFs ---');

        $map = [
            'siemens'  => 'projects/docs/siemens.pdf',
            'bac'      => 'projects/docs/bac.pdf',
            'tiger'    => 'projects/docs/tiger.pdf',
            'vasen'    => 'projects/docs/ppr.pdf',
            'hira'     => 'projects/docs/hira.pdf',
            'armacell' => 'projects/docs/armaflex.pdf',
            'ducting'  => 'projects/docs/ducting.pdf',
        ];

        foreach ($map as $slug => $path) {
            if ($brandFilter && $brandFilter !== $slug) {
                continue;
            }

            $brand = Brand::where('slug', $slug)->first();
            if (!$brand) {
                $this->line("  [SKIP] {$slug}: brand not found");
                $this->results['skipped']++;
                continue;
            }

            if ($brand->brand_pdf) {
                $this->line("  [SKIP] {$slug}: brands.brand_pdf already set");
                $this->results['skipped']++;
                continue;
            }

            $fullPath = $this->legacyPath($path);
            if (!file_exists($fullPath)) {
                $this->line("  [MISSING FILE] {$fullPath}");
                $this->results['failed']++;
                continue;
            }

            $this->line("  [BRAND PDF] {$slug}: " . basename($path) . " → brands.brand_pdf");

            if ($execute) {
                $result = $this->upload($assetServer, $fullPath);
                if ($result) {
                    AssetUploadObserver::setPendingUploads($brand, ['brand_pdf' => $result]);
                    $brand->brand_pdf = $result['url'];
                    $brand->save();
                    $this->results['uploaded']++;
                } else {
                    $this->results['failed']++;
                }
            } else {
                $this->results['skipped']++;
            }
        }
    }

    private function migrateProductPdfs(AssetServer $assetServer, ?string $brandFilter, bool $execute): void
    {
        $this->info('--- Product PDFs ---');

        // Only products that exist in the database and have PDFs in catalogue.js
        $map = [
            // Armacell products (brand_id=3)
            'Armaflex NBR Insulation'        => 'resources/assets/uploads/brand_catalog/Armaflex-Class-1.pdf',
            'ArmaChek Silver'               => 'resources/assets/uploads/brand_catalog/Armachek-Silver.pdf',
            'Armaflex Accessories'          => 'resources/assets/uploads/brand_catalog/Accessories.pdf',
            // Hira products (brand_id=2)
            'Aeroduct Flexible Duct Connector' => 'resources/assets/uploads/brand_catalog/catalog-aeroduct-flexibleductconnector-uae-22sep22.pdf',
            'Aerofoam Insulation'            => 'resources/assets/uploads/brand_catalog/Aerofoam.pdf',
            'Aluminium Tapes'               => 'resources/assets/uploads/brand_catalog/Aluminium-Tapes.pdf',
            // Siemens products (brand_id=4)
            'Volume Damper'                 => 'resources/assets/uploads/brand_catalog/siemens/damper.pdf',
            'Intelligent Valve'             => 'resources/assets/uploads/brand_catalog/siemens/intelligent-valve.pdf',
            'Motorized Valve'              => 'resources/assets/uploads/brand_catalog/siemens/motorized-valves.pdf',
            'PICV Valve'                   => 'resources/assets/uploads/brand_catalog/siemens/PICV.pdf',
            'Room Sensor'                  => 'resources/assets/uploads/brand_catalog/siemens/room-sensors.pdf',
            'Flow Meter'                   => 'resources/assets/uploads/brand_catalog/siemens/sitrans-mf.pdf',
            'Butterfly Valve'              => 'resources/assets/uploads/brand_catalog/siemens/butterfly.pdf',
            'Room Thermostat'              => 'resources/assets/uploads/brand_catalog/siemens/thermostats.pdf',
            // BAC products (brand_id=1)
            'Series 3000 Cooling Tower'    => 'resources/assets/uploads/brand_catalog/MAR117-1-Catalogue-Series-3000-Cooling-Towers-A4-med.pdf',
            'PT2 Cooling Tower'            => 'resources/assets/uploads/brand_catalog/pt2brochure_20170216.pdf',
            // Tiger product (brand_id=5)
            'Tiger Cast Iron Pipe'         => 'resources/assets/uploads/brand_catalog/Tiger-Brochure-catalog-ok.pdf',
            // Vasen product (brand_id=6)
            'Weixing PPR Pipe'             => 'resources/assets/uploads/brand_catalog/Brochure---Weixing-PPR-2016.pdf',
        ];

        foreach ($map as $productName => $path) {
            $product = Product::where('name', $productName)->first();
            if (!$product) {
                $this->line("  [NOT FOUND] Product: {$productName}");
                $this->results['skipped']++;
                continue;
            }

            if ($brandFilter) {
                $brand = Brand::where('slug', $brandFilter)->first();
                if (!$brand || $product->brand_id !== $brand->id) {
                    continue;
                }
            }

            if ($product->file) {
                $this->line("  [SKIP] {$productName}: products.file already set");
                $this->results['skipped']++;
                continue;
            }

            $fullPath = $this->legacyPath($path);
            if (!file_exists($fullPath)) {
                $this->line("  [MISSING FILE] {$fullPath}");
                $this->results['failed']++;
                continue;
            }

            $this->line("  [PRODUCT PDF] {$productName}: " . basename($path) . " → products.file");

            if ($execute) {
                $result = $this->upload($assetServer, $fullPath);
                if ($result) {
                    AssetUploadObserver::setPendingUploads($product, ['file' => $result]);
                    $product->file = $result['url'];
                    $product->save();
                    $this->results['uploaded']++;
                } else {
                    $this->results['failed']++;
                }
            } else {
                $this->results['skipped']++;
            }
        }
    }

    private function upload(AssetServer $assetServer, string $path): ?array
    {
        try {
            $uploadedFile = new UploadedFile($path, basename($path));
            return $assetServer->upload($uploadedFile);
        } catch (\Throwable $e) {
            Log::error('Legacy asset upload failed: ' . $e->getMessage(), ['path' => $path]);
            $this->error("  Upload failed: " . $e->getMessage());
            return null;
        }
    }
}
