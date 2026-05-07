@extends('layouts.app')

@section('title', 'UMKM - Geosite Danau Toba')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-5">UMKM Lokal Danau Toba</h1>
            <p class="lead">Dukung produk unggulan lokal dan ekonomi kreatif masyarakat Danau Toba.</p>
        </div>

        <div class="row gy-4">
            <div class="col-md-4">
                <div class="card p-4 shadow-sm h-100">
                    <h3 class="h5">Tenun Ulos</h3>
                    <p>Produk kain tradisional Batak dengan motif khas dan proses tenun manual.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 shadow-sm h-100">
                    <h3 class="h5">Olahan Makanan Lokal</h3>
                    <p>Jajanan khas Danau Toba seperti omelette ikan, ikan asin, dan sambal natsum.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 shadow-sm h-100">
                    <h3 class="h5">Kerajinan Kayu</h3>
                    <p>Souvenir ukiran Batak, alat musik tradisional, dan dekorasi rumah.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection