<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinasi = Destinasi::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.destinasi.index', compact('destinasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.destinasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'maps' => 'nullable|url',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'status' => 'boolean'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        // Handle tags
        if ($request->tags) {
            $data['tags'] = json_encode(array_map('trim', explode(',', $request->tags)));
        }

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/destinasi'), $imageName);
            $data['gambar'] = 'uploads/destinasi/' . $imageName;
        }

        Destinasi::create($data);

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $destinasi = Destinasi::findOrFail($id);
        return view('admin.destinasi.show', compact('destinasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $destinasi = Destinasi::findOrFail($id);
        return view('admin.destinasi.edit', compact('destinasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $destinasi = Destinasi::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'maps' => 'nullable|url',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'status' => 'boolean'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        // Handle tags
        if ($request->tags) {
            $data['tags'] = json_encode(array_map('trim', explode(',', $request->tags)));
        }

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($destinasi->gambar && file_exists(public_path($destinasi->gambar))) {
                unlink(public_path($destinasi->gambar));
            }

            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/destinasi'), $imageName);
            $data['gambar'] = 'uploads/destinasi/' . $imageName;
        }

        $destinasi->update($data);

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destinasi = Destinasi::findOrFail($id);

        // Delete image file
        if ($destinasi->gambar && file_exists(public_path($destinasi->gambar))) {
            unlink(public_path($destinasi->gambar));
        }

        $destinasi->delete();

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil dihapus');
    }
}
