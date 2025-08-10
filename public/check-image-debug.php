<?php
/**
 * Image Debug Tool for cPanel Laravel Deployment
 * Place this file in public_html and run it to debug image issues
 */

$imageFileName = '1754751391.jpg'; // Change this to your actual image filename
$laravelAppFolder = 'newweb';      // Your Laravel app folder

echo "<!DOCTYPE html>
<html>
<head>
    <title>Laravel Image Debug Tool</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 1000px; margin: 20px auto; padding: 20px; }
        .success { color: green; background: #f0f8f0; padding: 10px; border: 1px solid #4CAF50; margin: 10px 0; }
        .error { color: red; background: #fff0f0; padding: 10px; border: 1px solid #f44336; margin: 10px 0; }
        .info { color: blue; background: #f0f0ff; padding: 10px; border: 1px solid #2196F3; margin: 10px 0; }
        .warning { color: orange; background: #fff8f0; padding: 10px; border: 1px solid #ff9800; margin: 10px 0; }
        pre { background: #f5f5f5; padding: 10px; font-size: 12px; }
        img { max-width: 300px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>🔍 Laravel Image Debug Tool</h1>
";

// Paths
$publicHtml = __DIR__;
$laravelPath = $publicHtml . '/' . $laravelAppFolder;
$storagePath = $laravelPath . '/storage/app/public';
$symlinkPath = $publicHtml . '/storage';
$imagePath = $symlinkPath . '/product/image/' . $imageFileName;
$actualImagePath = $storagePath . '/product/image/' . $imageFileName;

echo "<h2>🗂️ Path Analysis</h2>";
echo "<div class='info'>
<strong>Paths being checked:</strong><br>
• Laravel App: <code>{$laravelPath}</code><br>
• Storage Source: <code>{$storagePath}</code><br>
• Symlink Target: <code>{$symlinkPath}</code><br>
• Image URL Path: <code>{$imagePath}</code><br>
• Actual Image: <code>{$actualImagePath}</code>
</div>";

// Check 1: Laravel app exists
echo "<h2>1️⃣ Laravel App Check</h2>";
if (is_dir($laravelPath)) {
    echo "<div class='success'>✅ Laravel app found at: {$laravelPath}</div>";
} else {
    echo "<div class='error'>❌ Laravel app not found at: {$laravelPath}</div>";
}

// Check 2: Storage directory
echo "<h2>2️⃣ Storage Directory Check</h2>";
if (is_dir($storagePath)) {
    echo "<div class='success'>✅ Storage directory exists: {$storagePath}</div>";
    
    // Check product/image folder
    $productImagePath = $storagePath . '/product/image';
    if (is_dir($productImagePath)) {
        echo "<div class='success'>✅ Product image directory exists: {$productImagePath}</div>";
        
        // List images in directory
        $images = glob($productImagePath . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
        if (count($images) > 0) {
            echo "<div class='info'><strong>Images found:</strong><br>";
            foreach (array_slice($images, 0, 10) as $img) {
                $filename = basename($img);
                $size = filesize($img);
                $perms = substr(sprintf('%o', fileperms($img)), -4);
                echo "• {$filename} ({$size} bytes, permissions: {$perms})<br>";
            }
            if (count($images) > 10) {
                echo "... and " . (count($images) - 10) . " more images<br>";
            }
            echo "</div>";
        } else {
            echo "<div class='warning'>⚠️ No images found in directory</div>";
        }
    } else {
        echo "<div class='error'>❌ Product image directory not found: {$productImagePath}</div>";
    }
} else {
    echo "<div class='error'>❌ Storage directory not found: {$storagePath}</div>";
}

// Check 3: Symlink
echo "<h2>3️⃣ Symlink Check</h2>";
if (is_link($symlinkPath)) {
    $target = readlink($symlinkPath);
    if ($target === $storagePath) {
        echo "<div class='success'>✅ Symlink is correct: {$symlinkPath} → {$target}</div>";
    } else {
        echo "<div class='error'>❌ Symlink points to wrong location: {$symlinkPath} → {$target}<br>
        Expected: {$storagePath}</div>";
    }
} else if (file_exists($symlinkPath)) {
    echo "<div class='error'>❌ Path exists but is not a symlink: {$symlinkPath}</div>";
} else {
    echo "<div class='error'>❌ Symlink does not exist: {$symlinkPath}</div>";
}

// Check 4: Specific image file
echo "<h2>4️⃣ Image File Check</h2>";
if (file_exists($actualImagePath)) {
    $size = filesize($actualImagePath);
    $perms = substr(sprintf('%o', fileperms($actualImagePath)), -4);
    $mimeType = mime_content_type($actualImagePath);
    echo "<div class='success'>✅ Image file exists: {$actualImagePath}<br>
    Size: {$size} bytes<br>
    Permissions: {$perms}<br>
    MIME Type: {$mimeType}</div>";
    
    // Check if accessible via symlink
    if (file_exists($imagePath)) {
        echo "<div class='success'>✅ Image accessible via symlink: {$imagePath}</div>";
    } else {
        echo "<div class='error'>❌ Image NOT accessible via symlink: {$imagePath}</div>";
    }
} else {
    echo "<div class='error'>❌ Image file not found: {$actualImagePath}</div>";
}

// Check 5: HTTP Response
echo "<h2>5️⃣ HTTP Response Test</h2>";
$imageUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/storage/product/image/' . $imageFileName;
echo "<div class='info'>Testing URL: <a href='{$imageUrl}' target='_blank'>{$imageUrl}</a></div>";

$headers = @get_headers($imageUrl);
if ($headers) {
    $status = $headers[0];
    if (strpos($status, '200') !== false) {
        echo "<div class='success'>✅ HTTP Response: {$status}</div>";
        echo "<div class='success'>📷 Image Preview:<br><img src='{$imageUrl}' alt='Test Image'></div>";
    } else {
        echo "<div class='error'>❌ HTTP Response: {$status}</div>";
    }
    
    echo "<div class='info'><strong>Full Headers:</strong><pre>";
    foreach ($headers as $header) {
        echo htmlspecialchars($header) . "\n";
    }
    echo "</pre></div>";
} else {
    echo "<div class='error'>❌ Could not get HTTP headers for the image</div>";
}

// Check 6: .htaccess
echo "<h2>6️⃣ .htaccess Check</h2>";
$htaccessPath = $publicHtml . '/.htaccess';
if (file_exists($htaccessPath)) {
    echo "<div class='success'>✅ .htaccess file exists</div>";
    $htaccess = file_get_contents($htaccessPath);
    
    // Check for problematic rules
    if (strpos($htaccess, 'RewriteRule') !== false) {
        echo "<div class='info'><strong>.htaccess content (first 50 lines):</strong><pre>";
        $lines = explode("\n", $htaccess);
        foreach (array_slice($lines, 0, 50) as $line) {
            echo htmlspecialchars($line) . "\n";
        }
        echo "</pre></div>";
        
        // Check for common issues
        if (strpos($htaccess, 'RewriteRule.*storage') !== false) {
            echo "<div class='warning'>⚠️ Found storage-related RewriteRule - this might be blocking images</div>";
        }
    }
} else {
    echo "<div class='warning'>⚠️ .htaccess file not found</div>";
}

// Check 7: PHP ini settings
echo "<h2>7️⃣ PHP Configuration</h2>";
echo "<div class='info'>
<strong>PHP Settings:</strong><br>
• allow_url_fopen: " . (ini_get('allow_url_fopen') ? 'On' : 'Off') . "<br>
• file_uploads: " . (ini_get('file_uploads') ? 'On' : 'Off') . "<br>
• upload_max_filesize: " . ini_get('upload_max_filesize') . "<br>
• post_max_size: " . ini_get('post_max_size') . "
</div>";

echo "<h2>🔧 Possible Solutions</h2>";
echo "<div class='warning'>
<strong>If images still don't show, try these solutions:</strong><br><br>

<strong>1. Fix File Permissions (Most Common):</strong><br>
• Files: chmod 644 storage/product/image/*.jpg<br>
• Directories: chmod 755 storage/product/image/<br><br>

<strong>2. Clear Laravel Cache:</strong><br>
• php artisan cache:clear<br>
• php artisan config:clear<br>
• php artisan view:clear<br><br>

<strong>3. Check .htaccess:</strong><br>
• Ensure no RewriteRule blocks /storage/<br>
• Add: RewriteRule ^storage/.* - [L]<br><br>

<strong>4. Server-level Issues:</strong><br>
• Contact your hosting provider<br>
• Check if mod_rewrite is enabled<br>
• Verify symlinks are allowed
</div>";

echo "</body></html>";
?>