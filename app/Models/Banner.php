<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'url_gambar',
        'link',
        'urutan',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'urutan' => 'integer',
    ];
}
