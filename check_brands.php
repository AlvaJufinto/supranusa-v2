<?php
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== Query 1: AppServiceProvider exact ===\n";
$navBrands = \App\Models\Brand::with(['products' => fn($q) => $q->active()->ordered()->limit(10)])
    ->ordered()
    ->get()
    ->filter(fn($b) => $b->products->count() > 0);
echo "Result: {$navBrands->count()} brands\n";
foreach ($navBrands as $b) {
    echo "  {$b->name} ({$b->products->count()}) [IDs: " . $b->products->pluck('id')->implode(',') . "]\n";
}

echo "\n=== Query 2: active() scope applied differently ===\n";
$brands2 = \App\Models\Brand::with(['products' => fn($q) => $q->where('status', 'active')->ordered()->limit(10)])
    ->ordered()
    ->get()
    ->filter(fn($b) => $b->products->count() > 0);
echo "Result: {$brands2->count()} brands\n";
foreach ($brands2 as $b) {
    echo "  {$b->name} ({$b->products->count()})\n";
}

echo "\n=== Check status values ===\n";
$products = \App\Models\Product::all();
$statuses = $products->countBy('status');
foreach ($statuses as $status => $count) {
    echo "  status='{$status}': {$count} products\n";
}
