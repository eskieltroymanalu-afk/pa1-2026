<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $destinasi = [
            (object)[
                'slug'=>'balige',
                'nama'=>'Balige',
                'gambar'=>'balige.jpg',
                'deskripsi'=>'Pusat wisata Danau Toba yang indah'
            ],
            (object)[
                'slug'=>'meat',
                'nama'=>'Meat',
                'gambar'=>'meat.jpg',
                'deskripsi'=>'Desa wisata tradisional di tepi danau'
            ],
            (object)[
                'slug'=>'liang-sipege',
                'nama'=>'Liang Sipege',
                'gambar'=>'liang.jpg',
                'deskripsi'=>'Goa alami yang eksotis'
            ],
            (object)[
                'slug'=>'batu-bahisan',
                'nama'=>'Batu Bahisan',
                'gambar'=>'batu.jpg',
                'deskripsi'=>'Wisata batu unik dan instagramable'
            ]
        ];

        return view('pages.home', compact('destinasi'));
    }

    public function detail($slug)
    {
        $data = (object)[
            'nama'=>ucwords(str_replace('-', ' ', $slug)),
            'gambar'=>'balige.jpg',
            'deskripsi'=>'Ini adalah detail destinasi wisata yang sangat menarik untuk dikunjungi.'
        ];

        return view('pages.detail', compact('data'));
    }
}