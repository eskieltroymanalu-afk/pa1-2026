<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        $galeri = [
            [
                'judul' => 'Pemandangan Danau Toba',
                'slug' => 'pemandangan-danau-toba',
                'deskripsi' => 'Keindahan Danau Toba dari atas Bukit Holbung dengan pemandangan yang memukau',
                'gambar' => '/image/toba.jpg',
                'kategori' => 'Balige',
                'lokasi' => 'Balige, Toba Samosir',
                'status' => true,
                'views' => 0
            ],
            [
                'judul' => 'Rumah Adat Batak',
                'slug' => 'rumah-adat-batak',
                'deskripsi' => 'Arsitektur tradisional rumah adat Batak Toba yang masih terjaga',
                'gambar' => '/image/meat.jpg',
                'kategori' => 'Meat',
                'lokasi' => 'Desa Meat, Toba Samosir',
                'status' => true,
                'views' => 0
            ],
            [
                'judul' => 'Batu Bahisan',
                'slug' => 'batu-bahisan',
                'deskripsi' => 'Formasi batuan unik hasil proses geologi jutaan tahun',
                'gambar' => '/image/batu.jpg',
                'kategori' => 'Batu Bahisan',
                'lokasi' => 'Samosir',
                'status' => true,
                'views' => 0
            ],
            [
                'judul' => 'Liang Sipege',
                'slug' => 'liang-sipege',
                'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit yang indah',
                'gambar' => '/image/liang.jpg',
                'kategori' => 'Liang Sipege',
                'lokasi' => 'Samosir',
                'status' => true,
                'views' => 0
            ],
        ];

        foreach ($galeri as $item) {
            Galeri::create($item);
        }
    }
}