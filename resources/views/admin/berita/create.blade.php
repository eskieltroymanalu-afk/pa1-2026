@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Berita Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label>Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label>Kategori <span class="text-danger">*</span></label>
                <select name="kategori_id" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" value="Admin">
            </div>
            
            <div class="mb-3">
                <label>Tanggal Terbit <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_terbit" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>
            
            <div class="mb-3">
                <label>Konten <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control" rows="8" required></textarea>
            </div>
            
            <div class="mb-3">
                <label>Gambar <span class="text-danger">*</span></label>
                <input type="file" name="gambar" class="form-control" accept="image/*" required>
            </div>
            
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                    <label>Publish</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection