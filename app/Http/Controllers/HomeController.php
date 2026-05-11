<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Banner;
use App\Models\Destinasi;

class HomeController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->take(6)->get();
        $berita = Berita::with('kategori')->latest()->take(3)->get();
        $banners = Banner::where('status', true)->orderBy('urutan')->get();
        $destinasi = Destinasi::where('status', 1)->get();

        return view('pages.home', compact('galeri', 'berita', 'destinasi', 'banners'));
    }

    public function umkm()
    {
        return view('pages.umkm');
    }

    public function budaya()
    {
        return view('pages.budaya');
    }
}