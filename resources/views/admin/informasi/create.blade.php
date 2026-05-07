@extends('layouts.admin')

@section('title', 'Tambah Informasi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Informasi Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
            </div>
            <div class="mb-3">
                <label>Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Geologi" {{ old('kategori') == 'Geologi' ? 'selected' : '' }}>Geologi</option>
                    <option value="Budaya" {{ old('kategori') == 'Budaya' ? 'selected' : '' }}>Budaya</option>
                    <option value="Wisata" {{ old('kategori') == 'Wisata' ? 'selected' : '' }}>Wisata</option>
                    <option value="Transportasi" {{ old('kategori') == 'Transportasi' ? 'selected' : '' }}>Transportasi</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', 'Admin') }}">
            </div>
            <div class="mb-3">
                <label>Konten <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control" rows="6" required>{{ old('konten') }}</textarea>
            </div>
            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
                <div class="mt-3">
                    <img id="informasiPreview" src="#" alt="Preview Gambar Informasi" class="img-fluid rounded d-none" style="max-width: 100%; max-height: 300px;" />
                </div>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" {{ old('status', true) ? 'checked' : '' }}>
                    <label class="form-check-label">Aktifkan</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<script>
    document.getElementById('gambar').addEventListener('change', function (e) {
        const preview = document.getElementById('informasiPreview');
        const file = e.target.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
        } else {
            preview.classList.add('d-none');
        }
    });
</script>
@endsection