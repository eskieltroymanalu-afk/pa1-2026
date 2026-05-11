<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Destinasi;
use App\Models\Informasi;
use App\Models\Galeri;
use App\Models\Umkm;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q', '');
        $results = [];

        if (!empty($query)) {
            // Search in Berita
            $results['berita'] = Berita::where('status', true)
                ->where(function ($q) use ($query) {
                    $q->where('judul', 'like', '%' . $query . '%')
                      ->orWhere('konten', 'like', '%' . $query . '%');
                })
                ->get();

            // Search in Destinasi
            $results['destinasi'] = Destinasi::where('status', true)
                ->where(function ($q) use ($query) {
                    $q->where('nama', 'like', '%' . $query . '%')
                      ->orWhere('deskripsi', 'like', '%' . $query . '%');
                })
                ->get();

            // Search in Informasi
            $results['informasi'] = Informasi::where('status', true)
                ->where(function ($q) use ($query) {
                    $q->where('judul', 'like', '%' . $query . '%')
                      ->orWhere('konten', 'like', '%' . $query . '%');
                })
                ->get();

            // Search in Galeri
            $results['galeri'] = Galeri::where('status', true)
                ->where(function ($q) use ($query) {
                    $q->where('judul', 'like', '%' . $query . '%')
                      ->orWhere('deskripsi', 'like', '%' . $query . '%');
                })
                ->get();

            // Search in UMKM
            $results['umkm'] = Umkm::where(function ($q) use ($query) {
                    $q->where('nama', 'like', '%' . $query . '%')
                      ->orWhere('deskripsi', 'like', '%' . $query . '%');
                })
                ->get();
        }

        return view('pages.search', [
            'query' => $query,
            'results' => $results,
        ]);
    }
}
