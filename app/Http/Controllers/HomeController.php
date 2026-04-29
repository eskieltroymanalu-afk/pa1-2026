<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Banner;

class HomeController extends Controller
{
   public function index()
{
    $galeri = Galeri::latest()->take(6)->get();
$berita = Berita::with('kategori')->latest()->take(3)->get();
    $banners = Banner::where('status', true)->orderBy('urutan')->get();
    
    $destinasi = [
        (object)[
            'slug' => 'meat',
            'nama' => 'Meat',
            'gambar' => '/images/1.jpeg',
            'deskripsi' => 'Desa adat dengan makam Raja Hunsa dan budaya Batak'
        ],
        (object)[
            'slug' => 'batu-bahisan',
            'nama' => 'Batu Bahisan',
            'gambar' => '/images/2.jepg',
            'deskripsi' => 'Formasi batuan unik dengan spot foto Instagramable'
        ],
        (object)[
            'slug' => 'liang-sipege',
            'nama' => 'Liang Sipege',
            'gambar' => '/images/3.jpeg',
            'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit'
        ]
    ];
    
    return view('pages.home', compact('galeri', 'berita', 'destinasi', 'banners'));
    }
}