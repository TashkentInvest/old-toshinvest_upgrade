<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'procurement_notice_id',
        'name_uz',
        'name_ru',
        'name_en',
        'file_path',
        'file_type',
        'file_size',
        'order',
    ];

    protected $casts = [
        'file_size' => 'integer',
        'order' => 'integer',
    ];

    /**
     * Relationship with procurement notice
     */
    public function procurementNotice()
    {
        return $this->belongsTo(ProcurementNotice::class);
    }

    /**
     * Get localized name
     */
    public function getName($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $field = "name_{$locale}";
        return $this->$field ?? $this->name_uz;
    }

    /**
     * Get full file URL
     */
    public function getFileUrlAttribute()
    {
        return asset($this->procurementNotice->folder . '/' . $this->file_path);
    }

    /**
     * Get file size in human readable format
     */
    public function getFileSizeHumanAttribute()
    {
        if (!$this->file_size) {
            return null;
        }

        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = $this->file_size;

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}
