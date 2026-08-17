<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=supranusa_new_web', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

echo "Brand count: ";
$result = $pdo->query("SELECT COUNT(*) FROM brands");
echo $result->fetchColumn() . "\n";

echo "Product count: ";
$result = $pdo->query("SELECT COUNT(*) FROM products");
echo $result->fetchColumn() . "\n";

echo "\nRaw brands (limit 5):\n";
$result = $pdo->query("SELECT * FROM brands LIMIT 5");
foreach ($result as $row) {
    echo json_encode($row) . "\n";
}
