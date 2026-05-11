<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;

class DestinasiController extends Controller
{
    public function index()
    {
        $destinasi = Destinasi::where('status', true)->get();
        return view('destinasi.index', compact('destinasi'));
    }

    public function show(Destinasi $destinasi)
    {
        // Increment views
        $destinasi->increment('views');

        // Tambahkan galeri jika ada
        $destinasi->galeri = [
            $destinasi->gambar,
            $destinasi->url_gambar ?: $destinasi->gambar,
            $destinasi->gambar,
        ];

        // Embed maps
        $destinasi->embed_maps = $destinasi->maps ?
            'https://www.google.com/maps?q=' . urlencode($destinasi->lokasi) . '&output=embed' :
            null;

        return view('destinasi.detail', compact('destinasi'));
    }

    // ===================== ALAM =====================
    public function alam()
    {
        $kategori = 'Alam';
        $deskripsi = 'Destinasi wisata alam yang menampilkan keindahan geologi, pegunungan, air terjun, dan keunikan alam Danau Toba.';
        $destinasi = Destinasi::where('kategori', 'Alam')
            ->where('status', true)
            ->latest()
            ->paginate(12);

        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }

    // ===================== BUATAN =====================
    public function buatan()
    {
        $kategori = 'Buatan';
        $deskripsi = 'Destinasi wisata buatan manusia di kawasan Danau Toba.';
        $destinasi = Destinasi::where('kategori', 'Buatan')
            ->where('status', true)
            ->latest()
            ->paginate(12);

        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }

    // ===================== BUDAYA =====================
    public function budaya()
    {
        $kategori = 'Budaya';
        $deskripsi = 'Wisata budaya Batak Toba.';
        $destinasi = Destinasi::where('kategori', 'Budaya')
            ->where('status', true)
            ->latest()
            ->paginate(12);

        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }
}
