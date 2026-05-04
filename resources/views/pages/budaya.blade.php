@extends('layouts.app')

@section('title', 'Budaya - Geosite Danau Toba')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-5">Budaya Batak Toba</h1>
            <p class="lead">Pelajari tradisi, seni, dan warisan budaya masyarakat Danau Toba.</p>
        </div>

        <div class="row gy-4">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm h-100">
                    <h3 class="h5">Tari Tradisional</h3>
                    <p>Tari Tor-Tor dan pertunjukan adat yang masih dilestarikan hingga sekarang.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4 shadow-sm h-100">
                    <h3 class="h5">Rumah Adat</h3>
                    <p>Rumah adat Batak dengan arsitektur khas dan makna simbolis setiap detailnya.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection