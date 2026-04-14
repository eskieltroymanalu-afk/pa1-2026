<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\InformasiController;

// ==================== FRONTEND ROUTES ====================

// Home
Route::get('/', function () {
    $galeri = App\Models\Galeri::where('status', true)->latest()->take(6)->get();
    $berita = App\Models\Berita::with('kategori')->where('status', true)->latest()->take(3)->get();
    return view('pages.home', compact('galeri', 'berita'));
})->name('home');

// Informasi
Route::get('/informasi', function () {
    $informasi = App\Models\Informasi::where('status', true)->latest()->paginate(10);
    return view('pages.informasi', compact('informasi'));
})->name('informasi');

// Destinasi
Route::get('/destinasi', function () {
    return view('pages.destinasi');
})->name('destinasi');

// Galeri
Route::get('/galeri', function () {
    $galeri = App\Models\Galeri::where('status', true)->latest()->paginate(12);
    return view('pages.galeri', compact('galeri'));
})->name('galeri');

// Berita
Route::get('/berita', function () {
    $berita = App\Models\Berita::with('kategori')->where('status', true)->latest()->paginate(9);
    $kategori = App\Models\Kategori::all();
    return view('pages.berita', compact('berita', 'kategori'));
})->name('berita');

// Detail Berita
Route::get('/berita/{slug}', function ($slug) {
    $berita = App\Models\Berita::with('kategori')->where('slug', $slug)->firstOrFail();
    $berita->increment('views');
    return view('pages.berita-detail', compact('berita'));
})->name('berita.detail');

// Detail Galeri
Route::get('/galeri/{slug}', function ($slug) {
    $galeri = App\Models\Galeri::where('slug', $slug)->firstOrFail();
    $galeri->increment('views');
    return view('pages.galeri-detail', compact('galeri'));
})->name('galeri.detail');

// Kontak
Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

// ==================== AUTH ROUTES ====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==================== ADMIN ROUTES ====================
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        $totalGaleri = App\Models\Galeri::count();
        $totalBerita = App\Models\Berita::count();
        $totalInformasi = App\Models\Informasi::count();
        $totalViews = App\Models\Berita::sum('views') + App\Models\Galeri::sum('views') + App\Models\Informasi::sum('views');
        return view('admin.dashboard', compact('totalGaleri', 'totalBerita', 'totalInformasi', 'totalViews'));
    })->name('admin.dashboard');
    
    Route::resource('galeri', GaleriController::class)->names('admin.galeri');
    Route::resource('berita', BeritaController::class)->names('admin.berita');
    Route::resource('informasi', InformasiController::class)->names('admin.informasi');
    Route::post('galeri/toggle-status/{id}', [GaleriController::class, 'toggleStatus'])->name('admin.galeri.toggle-status');
});