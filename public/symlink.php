<?php
/**
 * cPanel Storage Symlink Creator for Laravel
 * 
 * This file creates the storage symlink for cPanel deployments
 * where the Laravel app is in a subfolder.
 * 
 * Place this file in your public_html folder and run it in browser.
 * 
 * Directory Structure:
 * public_html/
 * ├── symlink.php (this file)
 * ├── newweb/ (your Laravel app)
 * │   ├── app/
 * │   ├── storage/
 * │   ├── public/
 * │   └── ...
 * └── storage/ (symlink to newweb/storage/app/public)
 */

// Configuration - Adjust these paths according to your setup
$laravelAppFolder = 'newweb';  // Your Laravel app folder name
$publicHtmlPath = __DIR__;     // Current directory (public_html)
$laravelPath = $publicHtmlPath . '/' . $laravelAppFolder;

// Paths
$storagePath = $laravelPath . '/storage/app/public';
$publicPath = $publicHtmlPath . '/storage';

echo "<!DOCTYPE html>
<html>
<head>
    <title>Laravel Storage Symlink Creator</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        .success { color: green; background: #f0f8f0; padding: 15px; border: 1px solid #4CAF50; border-radius: 4px; }
        .error { color: red; background: #fff0f0; padding: 15px; border: 1px solid #f44336; border-radius: 4px; }
        .info { color: blue; background: #f0f0ff; padding: 15px; border: 1px solid #2196F3; border-radius: 4px; }
        .warning { color: orange; background: #fff8f0; padding: 15px; border: 1px solid #ff9800; border-radius: 4px; }
        pre { background: #f5f5f5; padding: 10px; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Laravel Storage Symlink Creator</h1>
    <p>This script creates a symlink from <code>public_html/storage</code> to <code>public_html/{$laravelAppFolder}/storage/app/public</code></p>
";

// Check if Laravel app exists
if (!is_dir($laravelPath)) {
    echo "<div class='error'>
        <h3>Error: Laravel app not found!</h3>
        <p>Could not find Laravel app at: <code>{$laravelPath}</code></p>
        <p>Please check if the folder name '{$laravelAppFolder}' is correct.</p>
    </div>";
    exit;
}

// Check if storage/app/public exists
if (!is_dir($storagePath)) {
    echo "<div class='error'>
        <h3>Error: Storage directory not found!</h3>
        <p>Could not find storage directory at: <code>{$storagePath}</code></p>
        <p>Make sure your Laravel app has the correct structure.</p>
    </div>";
    exit;
}

echo "<div class='info'>
    <h3>Configuration:</h3>
    <ul>
        <li><strong>Laravel App Path:</strong> <code>{$laravelPath}</code></li>
        <li><strong>Storage Source:</strong> <code>{$storagePath}</code></li>
        <li><strong>Symlink Target:</strong> <code>{$publicPath}</code></li>
    </ul>
</div>";

// Check if symlink already exists
if (file_exists($publicPath) || is_link($publicPath)) {
    if (is_link($publicPath)) {
        $currentTarget = readlink($publicPath);
        if ($currentTarget === $storagePath) {
            echo "<div class='success'>
                <h3>✅ Symlink Already Exists!</h3>
                <p>The storage symlink is already properly configured.</p>
                <p>Current symlink: <code>{$publicPath}</code> → <code>{$currentTarget}</code></p>
            </div>";
        } else {
            echo "<div class='warning'>
                <h3>⚠️ Symlink Exists but Points to Wrong Location</h3>
                <p>Current symlink: <code>{$publicPath}</code> → <code>{$currentTarget}</code></p>
                <p>Expected: <code>{$storagePath}</code></p>
                <p>Removing old symlink and creating new one...</p>
            </div>";
            
            unlink($publicPath);
            
            if (symlink($storagePath, $publicPath)) {
                echo "<div class='success'>
                    <h3>✅ Symlink Updated Successfully!</h3>
                    <p>Storage symlink has been updated to point to the correct location.</p>
                </div>";
            } else {
                echo "<div class='error'>
                    <h3>❌ Failed to Update Symlink</h3>
                    <p>Could not update the symlink. Please check file permissions.</p>
                </div>";
            }
        }
    } else {
        echo "<div class='error'>
            <h3>❌ File/Directory Exists</h3>
            <p>A file or directory already exists at: <code>{$publicPath}</code></p>
            <p>Please remove it manually and run this script again.</p>
        </div>";
    }
} else {
    // Create the symlink
    if (symlink($storagePath, $publicPath)) {
        echo "<div class='success'>
            <h3>✅ Symlink Created Successfully!</h3>
            <p>Storage symlink has been created successfully.</p>
            <p>Symlink: <code>{$publicPath}</code> → <code>{$storagePath}</code></p>
        </div>";
    } else {
        echo "<div class='error'>
            <h3>❌ Failed to Create Symlink</h3>
            <p>Could not create symlink. This could be due to:</p>
            <ul>
                <li>Insufficient file permissions</li>
                <li>Server configuration restrictions</li>
                <li>File system limitations</li>
            </ul>
            <p><strong>Alternative:</strong> Create the symlink manually via SSH:</p>
            <pre>ln -s {$storagePath} {$publicPath}</pre>
        </div>";
    }
}

// Verification
if (is_link($publicPath) && readlink($publicPath) === $storagePath) {
    echo "<div class='success'>
        <h3>✅ Verification Successful</h3>
        <p>The symlink is working correctly. Your Laravel app should now be able to serve files from storage.</p>
        <p><strong>Next steps:</strong></p>
        <ul>
            <li>Test file uploads in your Laravel app</li>
            <li>Delete this symlink.php file for security</li>
        </ul>
    </div>";
} else if (file_exists($publicPath)) {
    echo "<div class='warning'>
        <h3>⚠️ Symlink Status Unknown</h3>
        <p>Something exists at the target path, but verification failed.</p>
    </div>";
}

// Show current directory contents for debugging
echo "<div class='info'>
    <h3>Current Directory Contents (public_html):</h3>
    <ul>";

$files = scandir($publicHtmlPath);
foreach ($files as $file) {
    if ($file !== '.' && $file !== '..') {
        $fullPath = $publicHtmlPath . '/' . $file;
        $type = is_dir($fullPath) ? 'DIR' : 'FILE';
        $link = is_link($fullPath) ? ' (SYMLINK → ' . readlink($fullPath) . ')' : '';
        echo "<li><strong>{$type}:</strong> {$file}{$link}</li>";
    }
}

echo "    </ul>
</div>

<div class='warning'>
    <h3>🔒 Security Notice</h3>
    <p>Remember to <strong>delete this symlink.php file</strong> after creating the symlink for security reasons.</p>
</div>

</body>
</html>";
?>