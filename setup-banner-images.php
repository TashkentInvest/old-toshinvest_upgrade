#!/usr/bin/env php
<?php
/**
 * Banner Image Setup Script
 *
 * Downloads REAL images from toshkentinvest.uz and prepares banner directory
 * Run: php setup-banner-images.php
 */

$bannerDir = __DIR__ . '/storage/app/public/banners';
$publicAssets = __DIR__ . '/public/assets/users_img';

echo "\n🎨 Tashkent Invest - Banner Image Setup\n";
echo "=====================================\n\n";

// Create banners directory if not exists
if (!is_dir($bannerDir)) {
    mkdir($bannerDir, 0755, true);
    echo "✅ Created directory: $bannerDir\n";
} else {
    echo "📁 Banner directory exists: $bannerDir\n";
}

// Check if storage link exists
$storageLink = __DIR__ . '/public/storage';
if (!is_link($storageLink) && !is_dir($storageLink)) {
    echo "\n⚠️  Storage link not found!\n";
    echo "Run: php artisan storage:link\n\n";
} else {
    echo "✅ Storage link exists\n";
}

// Copy existing hero background
$heroSource = $publicAssets . '/bg.webp';
$heroDestination = $bannerDir . '/main-hero-bg.webp';

if (file_exists($heroSource)) {
    copy($heroSource, $heroDestination);
    echo "✅ Copied: main-hero-bg.webp\n";
} else {
    echo "⚠️  Hero background not found: $heroSource\n";
}

// Download images from CDN
$images = [
    'green-city.jpg' => 'https://static.tildacdn.one/tild3637-6137-4736-a139-393336343331/lison-zhao-Lvt7BnCpU.jpg',
    'urban-development.jpeg' => 'https://static.tildacdn.one/tild3163-6637-4965-b261-653835643334/pexels-photo-1431446.jpeg',
    'economic-growth.jpg' => 'https://static.tildacdn.one/tild3337-6335-4135-b032-646332396131/pexels-fotios-photos.jpg',
    'modern-management.jpeg' => 'https://static.tildacdn.one/tild3639-3233-4732-a166-373937363864/pexels-photo-416405.jpeg',
];

echo "\n📥 Downloading images from toshkentinvest.uz CDN...\n";

foreach ($images as $filename => $url) {
    $destination = $bannerDir . '/' . $filename;

    if (file_exists($destination)) {
        echo "⏭️  Skipped (exists): $filename\n";
        continue;
    }

    echo "⬇️  Downloading: $filename ... ";

    $ch = curl_init($url);
    $fp = fopen($destination, 'wb');

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $success = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);
    fclose($fp);

    if ($success && $httpCode == 200) {
        echo "✅\n";
    } else {
        echo "❌ (HTTP $httpCode)\n";
        if (file_exists($destination)) {
            unlink($destination);
        }
    }
}

echo "\n📊 Image Summary:\n";
$files = glob($bannerDir . '/*');
echo "   Total files: " . count($files) . "\n";

foreach ($files as $file) {
    $size = filesize($file);
    $sizeKB = round($size / 1024, 2);
    echo "   - " . basename($file) . " ($sizeKB KB)\n";
}

echo "\n✅ Setup complete!\n";
echo "Next step: php artisan db:seed --class=BannerSeeder\n\n";
