<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    public function index()
    {
        return view('destinasi.index');
    }

    public function show($id)
    {
        $destinasi = $this->findDestinasiById((int) $id);

        return view('destinasi.detail', compact('destinasi'));
    }

    // ===================== ALAM =====================
    public function alam()
    {
        $kategori = 'Alam';
        $deskripsi = 'Destinasi wisata alam yang menampilkan keindahan geologi, pegunungan, air terjun, dan keunikan alam Danau Toba.';
        $destinasi = $this->getAlamDestinasi();

        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }

    // ===================== BUATAN =====================
    public function buatan()
    {
        $kategori = 'Buatan';
        $deskripsi = 'Destinasi wisata buatan manusia di kawasan Danau Toba.';
        $destinasi = $this->getBuatanDestinasi();

        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }

    // ===================== BUDAYA =====================
    public function budaya()
    {
        $kategori = 'Budaya';
        $deskripsi = 'Wisata budaya Batak Toba.';
        $destinasi = $this->getBudayaDestinasi();

        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }

    private function findDestinasiById(int $id)
    {
        $allDestinasi = array_merge(
            $this->getAlamDestinasi(),
            $this->getBuatanDestinasi(),
            $this->getBudayaDestinasi()
        );

        $destinasi = collect($allDestinasi)->firstWhere('id', $id);

        if (! $destinasi) {
            abort(404);
        }

        $destinasi->galeri = [
            $destinasi->gambar,
            $destinasi->gambar,
            $destinasi->gambar,
        ];
        $destinasi->embed_maps = 'https://www.google.com/maps?q=' . urlencode($destinasi->lokasi) . '&output=embed';

        return $destinasi;
    }

    private function getAlamDestinasi(): array
    {
        return [
            (object)[
                'id' => 1,
                'nama' => 'Sibandang',
                'lokasi' => 'Pulau Sibandang, Danau Toba',
                'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit yang indah. Tempat eksplorasi dan edukasi geologi.',
                'gambar' => '/image/4.jpeg',
                'tags' => ['Goa Alami', 'Caving', 'Stalaktit', 'Geologi'],
                'maps' => 'https://maps.app.goo.gl/2TzrmRxH3eH3o2wb7'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Muara',
                'lokasi' => 'Pulau Sibandang, Danau Toba',
                'deskripsi' => 'Formasi batuan unik hasil erosi ribuan tahun. Spot sunrise dan sunset.',
                'gambar' => '/image/1.jpeg',
                'tags' => ['Formasi Batuan', 'Sunrise', 'Sunset', 'Fotografi'],
                'maps' => 'https://maps.app.goo.gl/gNVA2Do1HYFEM12u9'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Papande',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Air terjun cantik dengan suasana asri untuk keluarga.',
                'gambar' => '/image/2.jpeg',
                'tags' => ['Air Terjun', 'Refreshing', 'Keluarga', 'Alam'],
                'maps' => 'https://maps.app.goo.gl/DBtCfX47iXHNbHLT6'
            ],
            (object)[
                'id' => 4,
                'nama' => 'Sampuran',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Air terjun alami dengan air jernih dan suasana sejuk.',
                'gambar' => '/image/3.jpeg',
                'tags' => ['Air Terjun', 'Alam', 'Segar', 'Wisata'],
                'maps' => 'https://maps.app.goo.gl/XvdBsMA1Y1JwTXC56'
            ]
        ];
    }

    private function getBuatanDestinasi(): array
    {
        return [
            (object)[
                'id' => 5,
                'nama' => 'Patung Yesus Memberkati',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Patung Yesus 30 meter dengan view Danau Toba.',
                'gambar' => '/image/destinasi/patung-yesus.jpg',
                'tags' => ['Patung', 'Ikon', 'Wisata Rohani', 'Spot Foto'],
                'maps' => 'https://www.google.com/maps/search/?api=1&query=Patung+Yesus+Memberkati+Balige'
            ],
            (object)[
                'id' => 6,
                'nama' => 'Taman Lingga',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Taman kota dengan view Danau Toba.',
                'gambar' => '/image/destinasi/taman-lingga.jpg',
                'tags' => ['Taman', 'Keluarga', 'Santai', 'Foto'],
                'maps' => 'https://www.google.com/maps/search/?api=1&query=Taman+Lingga+Balige'
            ],
            (object)[
                'id' => 7,
                'nama' => 'Jembatan Toba',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Jembatan ikonik dengan panorama Danau Toba.',
                'gambar' => '/image/destinasi/jembatan-toba.jpg',
                'tags' => ['Jembatan', 'Ikon', 'Sunset', 'Foto'],
                'maps' => 'https://www.google.com/maps/search/?api=1&query=Jembatan+Toba+Balige'
            ]
        ];
    }

    private function getBudayaDestinasi(): array
    {
        return [
            (object)[
                'id' => 8,
                'nama' => 'Meat Village',
                'lokasi' => 'Pulau Sibandang, Danau Toba',
                'deskripsi' => 'Desa adat Batak dengan sejarah dan budaya.',
                'gambar' => '/image/meat/hero.jpg',
                'tags' => ['Desa Adat', 'Budaya', 'Ulos', 'Tari'],
                'maps' => 'https://www.google.com/maps/search/?api=1&query=Meat+Village+Sibandang'
            ],
            (object)[
                'id' => 9,
                'nama' => 'Museum Batak',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Museum sejarah Batak Toba.',
                'gambar' => '/image/destinasi/museum-batak.jpg',
                'tags' => ['Museum', 'Sejarah', 'Edukasi'],
                'maps' => 'https://www.google.com/maps/search/?api=1&query=Museum+Batak+Balige'
            ],
            (object)[
                'id' => 10,
                'nama' => 'Desa Ulos Hutaraja',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Pusat tenun ulos khas Batak.',
                'gambar' => '/image/destinasi/desa-ulos.jpg',
                'tags' => ['Ulos', 'Kerajinan', 'UMKM'],
                'maps' => 'https://www.google.com/maps/search/?api=1&query=Hutaraja+Balige'
            ]
        ];
    }
}
