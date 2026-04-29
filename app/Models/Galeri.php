<?php
// app/Models/Galeri.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    
    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'url_gambar',
        'kategori',
        'lokasi',
        'tanggal_foto',
        'status',
        'views',
    ];

    protected $casts = [
        'status' => 'boolean',
        'tanggal_foto' => 'date',
        'views' => 'integer',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Helper untuk mendapatkan path folder berdasarkan kategori
    public static function getPathByKategori($kategori)
    {
        return match($kategori) {
            'Meat' => 'image/meat/galeri',
            'Batu Bahisan' => 'image/batu-bahisan/galeri',
            'Liang Sipege' => 'image/liang-sipege/galeri',
            default => 'image/galeri',
        };
    }
}