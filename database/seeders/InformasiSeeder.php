<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InformasiSeeder extends Seeder
{
    public function run()
    {
        $informasi = [
            [
                'judul' => 'Sejarah Danau Toba',
                'slug' => 'sejarah-danau-toba',
                'konten' => '<p>Danau Toba terbentuk dari letusan supervolcano sekitar 74.000 tahun yang lalu. Letusan ini merupakan salah satu letusan terbesar dalam sejarah bumi.</p><p>Danau Toba memiliki panjang sekitar 100 km dan lebar 30 km, menjadikannya danau vulkanik terbesar di dunia.</p>',
                'gambar' => '/image/toba.jpg',
                'kategori' => 'Geologi',
                'penulis' => 'Admin GeoToba',
                'status' => true,
                'views' => 0
            ],
            [
                'judul' => 'Budaya Batak Toba',
                'slug' => 'budaya-batak-toba',
                'konten' => '<p>Masyarakat Batak Toba memiliki kekayaan budaya yang luar biasa. Mulai dari tarian tortor, musik gondang, hingga upacara adat yang masih dilestarikan.</p><p>Rumah adat Batak dengan arsitektur khasnya juga menjadi daya tarik tersendiri bagi wisatawan.</p>',
                'gambar' => '/image/meat.jpg',
                'kategori' => 'Budaya',
                'penulis' => 'Admin GeoToba',
                'status' => true,
                'views' => 0
            ],
            [
                'judul' => 'Transportasi Menuju Danau Toba',
                'slug' => 'transportasi-danau-toba',
                'konten' => '<p>Danau Toba dapat diakses melalui Bandara Internasional Silangit atau perjalanan darat dari Medan sekitar 4-5 jam.</p><p>Tersedia berbagai pilihan transportasi seperti bus, travel, rental mobil, dan kapal feri untuk menuju pulau Samosir.</p>',
                'gambar' => null,
                'kategori' => 'Transportasi',
                'penulis' => 'Admin GeoToba',
                'status' => true,
                'views' => 0
            ],
        ];

        foreach ($informasi as $item) {
            Informasi::create($item);
        }
    }
}