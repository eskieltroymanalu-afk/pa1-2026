<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destinasi;

class DestinasiSeeder extends Seeder
{
    public function run()
    {
        Destinasi::insert([
            [
                'nama' => 'Balige',
                'slug' => 'balige',
                'gambar' => 'balige.jpg',
                'url_gambar' => 'uploads/balige.jpg',
                'deskripsi' => 'Pusat wisata Danau Toba dengan pantai indah dan fasilitas lengkap untuk aktivitas rekreasi air',
                'lokasi' => 'Balige, Danau Toba',
                'kategori' => 'Wisata Pantai',
                'tags' => json_encode(['Pantai', 'Olahraga Air', 'Restoran', 'Fotografi']),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Meat',
                'slug' => 'meat',
                'gambar' => 'meat.jpg',
                'url_gambar' => 'uploads/meat.jpg',
                'deskripsi' => 'Desa wisata tradisional di pinggir danau dengan kekayaan budaya Batak dan pemandangan alam yang menakjubkan',
                'lokasi' => 'Meat, Danau Toba',
                'kategori' => 'Wisata Budaya',
                'tags' => json_encode(['Desa Adat', 'Budaya Batak', 'Makam Raja Hunsa', 'Cagar Budaya']),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Liang Sipege',
                'slug' => 'liang-sipege',
                'gambar' => 'liang.jpg',
                'url_gambar' => 'uploads/liang-sipege.jpg',
                'deskripsi' => 'Goa eksotis dengan pemandangan alam indah, stalaktit dan stalakmit yang menakjubkan serta aktivitas petualangan yang menarik',
                'lokasi' => 'Liang Sipege, Danau Toba',
                'kategori' => 'Wisata Alam',
                'tags' => json_encode(['Goa Alami', 'Caving', 'Stalaktit', 'Stalakmit', 'Edukasi Geologi']),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Batu Bahisan',
                'slug' => 'batu-bahisan',
                'gambar' => 'batu.jpg',
                'url_gambar' => 'uploads/batu-bahisan.jpg',
                'deskripsi' => 'Wisata alam unik dengan formasi batuan yang menawan dan menjadi spot fotografi instagramable dengan pemandangan danau yang spektakuler',
                'lokasi' => 'Batu Bahisan, Danau Toba',
                'kategori' => 'Wisata Foto',
                'tags' => json_encode(['Formasi Batuan', 'Spot Fotografi', 'Sunset View', 'Instagramable']),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}