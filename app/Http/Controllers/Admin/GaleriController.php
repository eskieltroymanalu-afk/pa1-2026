<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required',
            'lokasi' => 'nullable',
            'tanggal_foto' => 'nullable|date'
        ]);
        
        // Upload gambar
        $gambar = $request->file('gambar');
        $namaGambar = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('uploads/galeri'), $namaGambar);
        
        Galeri::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,
            'gambar' => 'uploads/galeri/' . $namaGambar,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'tanggal_foto' => $request->tanggal_foto,
            'status' => $request->status ? true : false
        ]);
        
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan');
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
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required',
            'lokasi' => 'nullable',
            'tanggal_foto' => 'nullable|date'
        ]);
        
        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'tanggal_foto' => $request->tanggal_foto,
            'status' => $request->status ? true : false
        ];
        
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if (file_exists(public_path($galeri->gambar))) {
                unlink(public_path($galeri->gambar));
            }
            
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/galeri'), $namaGambar);
            $data['gambar'] = 'uploads/galeri/' . $namaGambar;
        }
        
        $galeri->update($data);
        
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diupdate');
    }
    
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        // Hapus gambar
        if (file_exists(public_path($galeri->gambar))) {
            unlink(public_path($galeri->gambar));
        }
        
        $galeri->delete();
        
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus');
    }
    
    public function toggleStatus($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->status = !$galeri->status;
        $galeri->save();
        
        return response()->json(['success' => true]);
    }
}