<?php
// app/Http/Controllers/Admin/GaleriController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Meat,Batu Bahisan,Liang Sipege,Balige',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'lokasi' => 'nullable|string',
            'tanggal_foto' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);

        // Upload gambar
        $gambar = $request->file('gambar');
        $folder = Galeri::getPathByKategori($request->kategori);
        $filename = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
        $path = $gambar->storeAs($folder, $filename, 'public');
        $gambarPath = str_replace('public/', 'storage/', $path);

        // Format tanggal_foto
        $tanggal_foto = null;
        if ($request->tanggal_foto) {
            $tanggal_foto = Carbon::parse($request->tanggal_foto)->format('Y-m-d');
        }

        // Simpan ke database
        Galeri::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'lokasi' => $request->lokasi,
            'tanggal_foto' => $tanggal_foto,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Meat,Batu Bahisan,Liang Sipege,Balige',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'lokasi' => 'nullable|string',
            'tanggal_foto' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);

        // Format tanggal_foto
        $tanggal_foto = null;
        if ($request->tanggal_foto) {
            $tanggal_foto = Carbon::parse($request->tanggal_foto)->format('Y-m-d');
        }

        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'tanggal_foto' => $tanggal_foto,
            'status' => $request->has('status') ? 1 : 0,
        ];

        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            $oldPath = str_replace('storage/', 'public/', $galeri->gambar);
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }

            // Upload gambar baru
            $gambar = $request->file('gambar');
            $folder = Galeri::getPathByKategori($request->kategori);
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs($folder, $filename, 'public');
            $data['gambar'] = str_replace('public/', 'storage/', $path);
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil diupdate');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        // Hapus file gambar
        $gambarPath = str_replace('storage/', 'public/', $galeri->gambar);
        if (Storage::exists($gambarPath)) {
            Storage::delete($gambarPath);
        }
        
        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil dihapus');
    }
}