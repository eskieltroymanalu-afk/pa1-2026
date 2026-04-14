@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Galeri</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $galeri->judul) }}" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-control" required>
                        <option value="Balige" {{ $galeri->kategori == 'Balige' ? 'selected' : '' }}>Balige</option>
                        <option value="Meat" {{ $galeri->kategori == 'Meat' ? 'selected' : '' }}>Meat</option>
                        <option value="Batu Bahisan" {{ $galeri->kategori == 'Batu Bahisan' ? 'selected' : '' }}>Batu Bahisan</option>
                        <option value="Liang Sipege" {{ $galeri->kategori == 'Liang Sipege' ? 'selected' : '' }}>Liang Sipege</option>
                    </select>
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar Saat Ini</label><br>
                    <img src="{{ asset($galeri->gambar) }}" width="100" class="mb-2">
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $galeri->lokasi) }}">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Foto</label>
                    <input type="date" name="tanggal_foto" class="form-control" value="{{ old('tanggal_foto', $galeri->tanggal_foto) }}">
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" name="status" value="1" {{ $galeri->status ? 'checked' : '' }}>
                        <label class="form-check-label">Aktifkan</label>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection