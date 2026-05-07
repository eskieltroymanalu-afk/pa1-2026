<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umkm;

class GeositeController extends Controller
{
    public function sibandang()
    {
        $umkm = Umkm::all();
        return view('geosite.sibandang', compact('umkm'));
    }

    // Tambahkan method untuk geosite lainnya jika diperlukan
    public function muara()
    {
        return view('geosite.muara');
    }

    public function sampuran()
    {
        return view('geosite.sampuran');
    }

    public function papande()
    {
        return view('geosite.papande');
    }
}
