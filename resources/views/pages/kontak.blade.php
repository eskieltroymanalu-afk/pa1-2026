@extends('layouts.app')

@section('title', 'Kontak - Geosite Danau Toba')

@section('content')

<style>
    .kontak-hero {
        height: 40vh;
        background: linear-gradient(135deg, rgba(0,0,0,0.7), rgba(0,0,0,0.5)),
                    url('/image/toba.jpg') center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    
    .contact-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .contact-card:hover {
        transform: translateY(-5px);
    }
    
    .contact-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #00d2ff, #3a7bd5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
    }
    
    .contact-icon i {
        font-size: 30px;
        color: white;
    }
    
    .form-control, .form-select {
        border-radius: 10px;
        padding: 12px 15px;
        border: 1px solid #dee2e6;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #00d2ff;
        box-shadow: 0 0 0 0.2rem rgba(0,210,255,0.25);
    }
    
    .map-card {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .social-media a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        background: #f8f9fa;
        border-radius: 50%;
        margin: 0 5px;
        color: #333;
        transition: all 0.3s ease;
    }
    
    .social-media a:hover {
        background: linear-gradient(135deg, #00d2ff, #3a7bd5);
        color: white;
        transform: translateY(-3px);
    }
</style>

<!-- Hero Section -->
<section class="kontak-hero">
    <div class="container">
        <h1 class="display-3 fw-bold" data-aos="fade-up">Kontak Kami</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Hubungi kami untuk informasi lebih lanjut</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        
        <!-- Contact Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4>Alamat</h4>
                    <p class="text-muted">
                        Jl. Danau Toba No. 123<br>
                        Balige, Kabupaten Toba Samosir<br>
                        Sumatera Utara, Indonesia
                    </p>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h4>Telepon</h4>
                    <p class="text-muted">
                        +62 812 3456 7890<br>
                        +62 813 9876 5432<br>
                        (0622) 12345
                    </p>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4>Email</h4>
                    <p class="text-muted">
                        info@geotoba.com<br>
                        support@geotoba.com<br>
                        reservation@geotoba.com
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <h3 class="mb-4">Kirim Pesan</h3>
                        
                        <form action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama Anda" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Masukkan email Anda" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">No. Telepon</label>
                                <input type="tel" class="form-control" placeholder="Masukkan nomor telepon">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Subjek</label>
                                <select class="form-select">
                                    <option>Pilih subjek</option>
                                    <option>Informasi Wisata</option>
                                    <option>Reservasi Tiket</option>
                                    <option>Kerjasama</option>
                                    <option>Saran & Masukan</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Pesan</label>
                                <textarea class="form-control" rows="5" placeholder="Tulis pesan Anda..."></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill">
                                Kirim Pesan <i class="fas fa-paper-plane ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Map & Info -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="card shadow border-0 rounded-4 mb-4">
                    <div class="map-card">
                        <iframe 
                            src="https://maps.google.com/maps?q=Balige+Danau+Toba&t=&z=12&ie=UTF8&iwloc=&output=embed"
                            width="100%" 
                            height="300" 
                            style="border:0;"
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
                
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <h4 class="mb-3">Jam Operasional</h4>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Senin - Jumat</span>
                            <span class="text-primary">08:00 - 17:00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Sabtu</span>
                            <span class="text-primary">09:00 - 15:00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span>Minggu & Hari Libur</span>
                            <span class="text-primary">Tutup</span>
                        </div>
                        
                        <h4 class="mb-3">Ikuti Kami</h4>
                        <div class="social-media">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection