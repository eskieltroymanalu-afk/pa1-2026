<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Umkm::create([
            'nama' => 'Tenun Ulos',
            'deskripsi' => 'Kain tenun khas Batak dengan motif tradisional.',
            'gambar' => 'uploads/del.jpeg',
            'lokasi' => 'Desa Meat',
            'kontak' => '[KONTAK_UMKM1]',
        ]);

        \App\Models\Umkm::create([
            'nama' => 'Anyaman Bambu',
            'deskripsi' => 'Kerajinan tangan dari bambu.',
            'gambar' => 'uploads/A1.jpeg',
            'lokasi' => 'Desa Meat',
            'kontak' => '[KONTAK_UMKM2]',
        ]);

        \App\Models\Umkm::create([
            'nama' => 'Madu Hutan',
            'deskripsi' => 'Madu alami premium dari hutan sekitar.',
            'gambar' => 'uploads/A2.JPG',
            'lokasi' => 'Kawasan Hutan',
            'kontak' => '[KONTAK_UMKM3]',
        ]);
    }
}
