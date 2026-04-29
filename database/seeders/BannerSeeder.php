<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'judul' => 'Selamat Datang di GeoToba',
                'deskripsi' => 'Jelajahi keindahan Danau Toba dan sekitarnya dengan teknologi geospasial terkini',
                'gambar' => 'banner/geotoba-welcome.jpg',
                'url_gambar' => '/storage/banner/geotoba-welcome.jpg',
                'link' => null,
                'urutan' => 0,
                'status' => true,
            ],
            [
                'judul' => 'Destinasi Wisata Alam',
                'deskripsi' => 'Nikmati pesona alam Danau Toba yang memukau dengan berbagai aktivitas wisata',
                'gambar' => 'banner/danau-toba.jpg',
                'url_gambar' => '/storage/banner/danau-toba.jpg',
                'link' => '/destinasi',
                'urutan' => 1,
                'status' => true,
            ],
            [
                'judul' => 'Galeri Foto Danau Toba',
                'deskripsi' => 'Koleksi foto terbaik dari berbagai sudut keindahan Danau Toba',
                'gambar' => 'banner/galeri-toba.jpg',
                'url_gambar' => '/storage/banner/galeri-toba.jpg',
                'link' => '/galeri',
                'urutan' => 2,
                'status' => true,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
