@extends('layouts.app')

@section('title', 'Destinasi - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== LOGO SECTION STYLE ==================== */
    .logo-container {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 20px;
        background: rgba(255, 255, 255, 0.98);
        padding: 8px 24px;
        border-radius: 60px;
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        border: 1px solid rgba(255, 255, 255, 0.8);
    }
    
    .logo-container:hover {
        background: white;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }
    
    .flag-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .flag-img {
        width: 100px;
        height: auto;
        border-radius: 6px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        transition: transform 0.2s ease;
        border: 1px solid rgba(255,255,255,0.3);
    }
    
    .flag-img:hover {
        transform: scale(1.05);
    }
    
    .logo-divider {
        width: 2px;
        height: 35px;
        background: #e0e0e0;
        border-radius: 2px;
    }
    
    .del-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .del-logo-wrapper:hover {
        transform: scale(1.02);
    }
    
    .del-img {
        width: 50px;
        height: auto;
        border-radius: 8px;
        transition: transform 0.2s ease;
    }
    
    .del-img:hover {
        transform: scale(1.05);
    }
    
    .geotoba-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .geotoba-icon {
        font-size: 32px;
        color: #2c5f8a;
        transition: transform 0.2s ease;
    }
    
    .geotoba-text {
        font-size: 1.5rem;
        font-weight: 800;
        letter-spacing: 1px;
        background: linear-gradient(135deg, #1a3c5e, #2c5f8a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-family: 'Inter', 'Poppins', sans-serif;
        line-height: 1.2;
    }
    
    .geotoba-sub {
        font-size: 0.7rem;
        font-weight: 500;
        color: #5a6e7c;
        letter-spacing: 0.5px;
    }
    
    @media (max-width: 768px) {
        .logo-container {
            top: 12px;
            left: 12px;
            padding: 6px 18px;
            gap: 14px;
        }
        .flag-img {
            width: 60px;
        }
        .del-img {
            width: 35px;
        }
        .geotoba-text {
            font-size: 1.2rem;
        }
        .geotoba-icon {
            font-size: 26px;
        }
        .geotoba-sub {
            font-size: 0.6rem;
        }
        .logo-divider {
            height: 28px;
        }
    }
    
    @media (max-width: 576px) {
        .logo-container {
            padding: 5px 14px;
            gap: 10px;
        }
        .flag-img {
            width: 45px;
        }
        .del-img {
            width: 28px;
        }
        .geotoba-text {
            font-size: 0.9rem;
        }
        .geotoba-icon {
            font-size: 20px;
        }
        .geotoba-sub {
            font-size: 0.5rem;
        }
        .logo-divider {
            height: 24px;
        }
    }

    .destinasi-hero {
        height: 50vh;
        background: linear-gradient(135deg, rgba(0,0,0,0.7), rgba(0,0,0,0.5)),
                    url('/image/toba.jpg') center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    
    .destinasi-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        margin-bottom: 2rem;
    }
    
    .destinasi-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }
    
    .destinasi-img {
        height: 300px;
        width: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .destinasi-card:hover .destinasi-img {
        transform: scale(1.05);
    }
    
    .price-tag {
        background: linear-gradient(135deg, #00d2ff, #3a7bd5);
        color: white;
        padding: 5px 15px;
        border-radius: 50px;
        display: inline-block;
        font-weight: 600;
    }
    
    .feature-list {
        list-style: none;
        padding: 0;
    }
    
    .feature-list li {
        margin-bottom: 10px;
    }
    
    .feature-list li i {
        color: #00d2ff;
        margin-right: 10px;
    }
    
    .btn-detail {
        background: linear-gradient(135deg, #00d2ff, #3a7bd5);
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    
    .btn-detail:hover {
        transform: translateX(5px);
        color: white;
    }
    
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 3rem;
        position: relative;
        display: inline-block;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #3498db, #e74c3c);
    }
    
    @media (max-width: 768px) {
        .destinasi-img {
            height: 200px;
        }
    }
</style>

<!-- ================================================================ -->
<!-- LOGO SECTION: URUTAN BENDERA | D EL | GEOTOBA -->
<!-- ================================================================ -->
<div class="logo-container">
    
    <!-- LOGO 1: BENDERA INDONESIA (PALING KIRI) -->
    <!-- >>>>>> TEMPEL LINK GAMBAR BENDERA INDONESIA ANDA DI src="..." <<<<<< -->
    <div class="flag-logo-wrapper">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcJM1fB_sgbJg0xiD6nwq51_9OXEB3d2HpGA&s" 
             alt="Bendera Indonesia" 
             class="flag-img"
             title="Indonesia">
    </div>
    
    <div class="logo-divider"></div>
    
    <!-- LOGO 2: D EL (TENGAH) -->
    <!-- >>>>>> TEMPEL LINK GAMBAR D EL ANDA DI src="..." <<<<<< -->
    <div class="del-logo-wrapper">
        <img src="data:image/png;base64,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" 
             alt="D el" 
             class="del-img"
             title="D el">
    </div>
    
    <div class="logo-divider"></div>
    
    <!-- LOGO 3: GEOTOBA (PALING KANAN) -->
    <div class="geotoba-wrapper">
      
        <div style="display: flex; flex-direction: column; line-height: 1.2;">
            <span class="geotoba-text">GEOTOBA</span>
            <span class="geotoba-sub">Geopark Danau Toba</span>
        </div>
    </div>
    
</div>

<!-- Hero Section -->
<section class="destinasi-hero">
    <div class="container">
        <h1 class="display-3 fw-bold" data-aos="fade-up">Destinasi Wisata</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">4 Geosite yang wajib Anda kunjungi di Danau Toba</p>
    </div>
</section>

<!-- Destinasi List -->
<section class="py-5">
    <div class="container">
        
        <!-- Balige -->
        <div class="destinasi-card" data-aos="fade-up">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="/image/balige.jpg" class="destinasi-img" alt="Balige">
                </div>
                <div class="col-md-6">
                    <div class="p-4 p-lg-5">
                        <div class="price-tag mb-3">⭐ 4.8/5 - Terpopuler</div>
                        <h2 class="mb-3">BALIGE</h2>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt text-danger"></i> Kabupaten Toba Samosir, Sumatera Utara
                        </p>
                        <p>Balige adalah pusat pemerintahan Kabupaten Toba Samosir yang menawarkan berbagai destinasi wisata menarik. Dari museum, kuliner khas, hingga pemandangan Danau Toba yang memukau.</p>
                        
                        <ul class="feature-list mt-3">
                            <li><i class="fas fa-check-circle"></i> Museum Batak TB Silalahi</li>
                            <li><i class="fas fa-check-circle"></i> Pantai Bulung Cina</li>
                            <li><i class="fas fa-check-circle"></i> Pusat Oleh-oleh Khas Toba</li>
                            <li><i class="fas fa-check-circle"></i> Kuliner Arsik & Naniarsik</li>
                        </ul>
                        
                        <div class="mt-4">
                            <span class="badge bg-primary me-2">Budaya</span>
                            <span class="badge bg-success me-2">Kuliner</span>
                            <span class="badge bg-info">Sejarah</span>
                        </div>
                        
                        <a href="#" class="btn btn-detail mt-4">
                            Lihat Detail <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Meat -->
        <div class="destinasi-card" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-0 flex-row-reverse">
                <div class="col-md-6">
                    <img src="/image/meat.jpg" class="destinasi-img" alt="Meat">
                </div>
                <div class="col-md-6">
                    <div class="p-4 p-lg-5">
                        <div class="price-tag mb-3">⭐ 4.7/5 - Best Cultural</div>
                        <h2 class="mb-3">MEAT</h2>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt text-danger"></i> Kabupaten Toba Samosir, Sumatera Utara
                        </p>
                        <p>Desa Meat adalah desa wisata yang mempertahankan keaslian budaya Batak Toba. Di sini Anda bisa melihat langsung rumah adat dan belajar tentang kearifan lokal masyarakat Batak.</p>
                        
                        <ul class="feature-list mt-3">
                            <li><i class="fas fa-check-circle"></i> Rumah Adat Batak Tradisional</li>
                            <li><i class="fas fa-check-circle"></i> Tarian Tortor & Gondang</li>
                            <li><i class="fas fa-check-circle"></i> Workshop Tenun Ulos</li>
                            <li><i class="fas fa-check-circle"></i> Panorama Danau Toba</li>
                        </ul>
                        
                        <div class="mt-4">
                            <span class="badge bg-primary me-2">Tradisional</span>
                            <span class="badge bg-success me-2">Kultural</span>
                            <span class="badge bg-info">Panorama</span>
                        </div>
                        
                        <a href="#" class="btn btn-detail mt-4">
                            Lihat Detail <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Batu Bahisan -->
        <div class="destinasi-card" data-aos="fade-up" data-aos-delay="200">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="/image/batu.jpg" class="destinasi-img" alt="Batu Bahisan">
                </div>
                <div class="col-md-6">
                    <div class="p-4 p-lg-5">
                        <div class="price-tag mb-3">⭐ 4.9/5 - Best Photo Spot</div>
                        <h2 class="mb-3">BATU BAHISAN</h2>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt text-danger"></i> Kabupaten Samosir, Sumatera Utara
                        </p>
                        <p>Formasi batuan unik yang terbentuk dari proses geologi jutaan tahun lalu. Tempat ini menjadi favorit para fotografer untuk mengabadikan keindahan alam Danau Toba.</p>
                        
                        <ul class="feature-list mt-3">
                            <li><i class="fas fa-check-circle"></i> Formasi Batuan Unik</li>
                            <li><i class="fas fa-check-circle"></i> Spot Foto Instagramable</li>
                            <li><i class="fas fa-check-circle"></i> Sunrise & Sunset View</li>
                            <li><i class="fas fa-check-circle"></i> Trekking Ringan</li>
                        </ul>
                        
                        <div class="mt-4">
                            <span class="badge bg-primary me-2">Geologi</span>
                            <span class="badge bg-success me-2">Fotografi</span>
                            <span class="badge bg-info">Unik</span>
                        </div>
                        
                        <a href="#" class="btn btn-detail mt-4">
                            Lihat Detail <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Liang Sipege -->
        <div class="destinasi-card" data-aos="fade-up" data-aos-delay="300">
            <div class="row g-0 flex-row-reverse">
                <div class="col-md-6">
                    <img src="/image/liang.jpg" class="destinasi-img" alt="Liang Sipege">
                </div>
                <div class="col-md-6">
                    <div class="p-4 p-lg-5">
                        <div class="price-tag mb-3">⭐ 4.8/5 - Best Adventure</div>
                        <h2 class="mb-3">LIANG SIPEGE</h2>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt text-danger"></i> Kabupaten Samosir, Sumatera Utara
                        </p>
                        <p>Goa alami yang menyimpan keindahan stalaktit dan stalakmit. Liang Sipege menawarkan pengalaman petualangan yang tak terlupakan bagi para pengunjung.</p>
                        
                        <ul class="feature-list mt-3">
                            <li><i class="fas fa-check-circle"></i> Goa Alami dengan Stalaktit</li>
                            <li><i class="fas fa-check-circle"></i> Petualangan Caving</li>
                            <li><i class="fas fa-check-circle"></i> Nilai Geologi Tinggi</li>
                            <li><i class="fas fa-check-circle"></i> Spot Eksplorasi</li>
                        </ul>
                        
                        <div class="mt-4">
                            <span class="badge bg-primary me-2">Petualangan</span>
                            <span class="badge bg-success me-2">Geologi</span>
                            <span class="badge bg-info">Eksotis</span>
                        </div>
                        
                        <a href="#" class="btn btn-detail mt-4">
                            Lihat Detail <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- Paket Wisata -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center" data-aos="fade-up">Paket Wisata Hemat</h2>
        <div class="row g-4 mt-3">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="card border-0 shadow rounded-4 h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-sun fa-3x text-primary"></i>
                        </div>
                        <h4>Paket 1 Hari</h4>
                        <p class="text-muted">Jelajahi 4 Geosite dalam sehari</p>
                        <h3 class="text-primary mb-3">Rp 350K</h3>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i> Transportasi</li>
                            <li><i class="fas fa-check text-success me-2"></i> Guide Lokal</li>
                            <li><i class="fas fa-check text-success me-2"></i> Tiket Masuk</li>
                            <li><i class="fas fa-check text-success me-2"></i> Makan Siang</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary rounded-pill mt-3">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow rounded-4 h-100 border-primary">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-moon fa-3x text-primary"></i>
                        </div>
                        <h4>Paket 2 Hari 1 Malam</h4>
                        <p class="text-muted">Eksplorasi lengkap dengan menginap</p>
                        <h3 class="text-primary mb-3">Rp 650K</h3>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i> Transportasi</li>
                            <li><i class="fas fa-check text-success me-2"></i> Guide Lokal</li>
                            <li><i class="fas fa-check text-success me-2"></i> Tiket Masuk</li>
                            <li><i class="fas fa-check text-success me-2"></i> 3x Makan + Hotel</li>
                        </ul>
                        <a href="#" class="btn btn-primary rounded-pill mt-3">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow rounded-4 h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-star fa-3x text-primary"></i>
                        </div>
                        <h4>Paket Private</h4>
                        <p class="text-muted">Perjalanan eksklusif sesuai keinginan</p>
                        <h3 class="text-primary mb-3">Rp 1.2M</h3>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i> Mobil Private</li>
                            <li><i class="fas fa-check text-success me-2"></i> Guide Pribadi</li>
                            <li><i class="fas fa-check text-success me-2"></i> All Inclusive</li>
                            <li><i class="fas fa-check text-success me-2"></i> Hotel Bintang 3</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary rounded-pill mt-3">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<!-- AOS CSS -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>

@endsection