<?php
/**
 * Fix Image Permissions Tool
 * 
 * This script fixes file permissions for uploaded images
 * Run this after uploading images through Laravel
 */

$laravelAppFolder = 'newweb';  // Your Laravel app folder
$publicHtml = __DIR__;
$storagePath = $publicHtml . '/' . $laravelAppFolder . '/storage/app/public';

echo "<!DOCTYPE html>
<html>
<head>
    <title>Fix Image Permissions</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 20px; }
        .success { color: green; background: #f0f8f0; padding: 10px; border: 1px solid #4CAF50; margin: 10px 0; }
        .error { color: red; background: #fff0f0; padding: 10px; border: 1px solid #f44336; margin: 10px 0; }
        .info { color: blue; background: #f0f0ff; padding: 10px; border: 1px solid #2196F3; margin: 10px 0; }
        .warning { color: orange; background: #fff8f0; padding: 10px; border: 1px solid #ff9800; margin: 10px 0; }
    </style>
</head>
<body>
    <h1>🔧 Fix Image Permissions</h1>
";

if (!is_dir($storagePath)) {
    echo "<div class='error'>❌ Storage path not found: {$storagePath}</div>";
    exit;
}

$fixed = 0;
$errors = 0;

// Function to recursively fix permissions
function fixPermissions($dir, &$fixed, &$errors) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $item) {
        if ($item->isDir()) {
            // Set directory permissions to 755
            if (chmod($item->getRealPath(), 0755)) {
                echo "📁 Fixed directory: " . $item->getRealPath() . " (755)<br>";
                $fixed++;
            } else {
                echo "<div class='error'>❌ Failed to fix directory: " . $item->getRealPath() . "</div>";
                $errors++;
            }
        } else {
            // Set file permissions to 644
            if (chmod($item->getRealPath(), 0644)) {
                echo "📄 Fixed file: " . $item->getRealPath() . " (644)<br>";
                $fixed++;
            } else {
                echo "<div class='error'>❌ Failed to fix file: " . $item->getRealPath() . "</div>";
                $errors++;
            }
        }
    }
}

echo "<div class='info'>Starting permission fix for: {$storagePath}</div>";

try {
    fixPermissions($storagePath, $fixed, $errors);
    
    if ($errors === 0) {
        echo "<div class='success'>✅ Successfully fixed permissions for {$fixed} items!</div>";
    } else {
        echo "<div class='warning'>⚠️ Fixed {$fixed} items, but {$errors} items had errors</div>";
    }
} catch (Exception $e) {
    echo "<div class='error'>❌ Error: " . $e->getMessage() . "</div>";
}

echo "<div class='warning'>
<h3>🔒 Security Notice</h3>
<p>Delete this file after use for security reasons.</p>
</div>";

echo "</body></html>";
?>