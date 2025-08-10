<?php
/**
 * Storage Redirect Handler (Alternative to Symlink)
 * 
 * If symlinks don't work, use this as /storage/index.php
 * and update your .htaccess to redirect storage requests here
 */

$laravelAppFolder = 'newweb';  // Your Laravel app folder
$path = $_SERVER['REQUEST_URI'];
$path = str_replace('/storage/', '', $path);

$publicHtml = dirname(__DIR__);
$storagePath = $publicHtml . '/' . $laravelAppFolder . '/storage/app/public/' . $path;

if (file_exists($storagePath) && is_file($storagePath)) {
    $mimeType = mime_content_type($storagePath);
    $fileSize = filesize($storagePath);
    
    // Set appropriate headers
    header('Content-Type: ' . $mimeType);
    header('Content-Length: ' . $fileSize);
    header('Cache-Control: public, max-age=31536000'); // 1 year cache
    
    // Output the file
    readfile($storagePath);
    exit;
} else {
    header('HTTP/1.0 404 Not Found');
    echo '404 - File not found';
    exit;
}
?>