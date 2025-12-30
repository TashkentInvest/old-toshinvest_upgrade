<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Display current records first
$records = DB::table('procurement_notices')->get(['id', 'slug', 'folder', 'announcement_pdf']);
echo "Current procurement notices:\n";
foreach ($records as $record) {
    echo "ID: {$record->id}, Slug: {$record->slug}, Folder: {$record->folder}\n";
    echo "  PDF: {$record->announcement_pdf}\n";
}

// Update procurement notices ONLY if folder contains Hunan
DB::table('procurement_notices')
    ->where('folder', 'like', '%Hunan%')
    ->update([
        'folder' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/NewBRT',
        'announcement_pdf' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/NewBRT/Эълон_BRT (РУС).pdf',
    ]);

echo "Updated procurement_notices table\n";

// Update procurement documents file paths
DB::table('procurement_documents')
    ->where('file_path', 'like', '%HUNAN%')
    ->update([
        'file_path' => DB::raw("REPLACE(file_path, '_HUNAN', '_BRT')")
    ]);

DB::table('procurement_documents')
    ->where('file_path', 'like', '%Hunan%')
    ->update([
        'file_path' => DB::raw("REPLACE(file_path, 'Hunan', 'NewBRT')")
    ]);

echo "Updated procurement_documents table\n";

// Display current records
$records = DB::table('procurement_notices')->get(['id', 'slug', 'folder']);
echo "\nCurrent procurement notices:\n";
foreach ($records as $record) {
    echo "ID: {$record->id}, Slug: {$record->slug}, Folder: {$record->folder}\n";
}

echo "\nDone!\n";
