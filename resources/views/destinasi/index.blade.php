@extends('layouts.app')

@section('title', 'Destinasi Geosite - Danau Toba')

@section('content')

<style>
    /* ==================== HERO SECTION ==================== */
    .destinasi-hero {
        height: 85vh;
        min-height: 600px;
        position: relative;
        overflow: hidden;
        margin-top: 0;
    }
    
    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('/image/destinasi-hero.jpg');
        background-size: cover;
        background-position: center;
        animation: zoomSlow 20s ease-out infinite;
    }
    
    @keyframes zoomSlow {
        0% { transform: scale(1); }
        100% { transform: scale(1.1); }
    }
    
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0,0,0,0.75) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.6) 100%);
    }
    
    .hero-content {
        position: relative;
        z-index: 10;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: white;
        padding: 0 20px;
    }
    
    .hero-badge {
        display: inline-block;
        padding: 6px 20px;
        background: rgba(198, 164, 59, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(198, 164, 59, 0.5);
        border-radius: 50px;
        font-size: 0.7rem;
        letter-spacing: 3px;
        margin-bottom: 25px;
        animation: fadeInUp 0.8s ease;
    }
    
    .hero-content h1 {
        font-size: 4.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        animation: fadeInUp 0.8s ease 0.1s both;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    
    .hero-content h1 span {
        color: #c6a43b;
    }
    
    .hero-content p {
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto 30px;
        opacity: 0.9;
        animation: fadeInUp 0.8s ease 0.2s both;
    }
    
    .hero-scroll {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        animation: bounce 2s infinite;
        cursor: pointer;
        z-index: 10;
    }
    
    .hero-scroll a {
        color: white;
        font-size: 0.7rem;
        letter-spacing: 2px;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }
    
    .hero-scroll .line {
        width: 20px;
        height: 35px;
        border: 1px solid rgba(255,255,255,0.5);
        border-radius: 15px;
        position: relative;
    }
    
    .hero-scroll .line::before {
        content: '';
        position: absolute;
        top: 5px;
        left: 50%;
        transform: translateX(-50%);
        width: 3px;
        height: 8px;
        background: white;
        border-radius: 2px;
        animation: scrollMove 1.5s infinite;
    }
    
    @keyframes scrollMove {
        0% { top: 5px; opacity: 1; }
        80% { top: 20px; opacity: 0; }
        100% { top: 5px; opacity: 0; }
    }
    
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateX(-50%) translateY(0); }
        50% { transform: translateX(-50%) translateY(-10px); }
    }
    
    /* ==================== CATEGORY SECTION ==================== */
    .category-section {
        padding: 100px 0;
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .section-header .subtitle {
        display: inline-block;
        font-size: 0.7rem;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: #c6a43b;
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #1a1a1a;
    }
    
    .section-header .divider {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #c6a43b, #e8c45a);
        margin: 0 auto 20px;
        border-radius: 3px;
    }
    
    .section-header p {
        color: #666;
        max-width: 600px;
        margin: 0 auto;
    }
    
    /* Category Cards Premium */
    .category-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    
    .category-card {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        transition: all 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        cursor: pointer;
        background: white;
    }
    
    .category-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 30px 60px rgba(0,0,0,0.2);
    }
    
    .category-card .card-image {
        position: relative;
        height: 300px;
        overflow: hidden;
    }
    
    .category-card .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }
    
    .category-card:hover .card-image img {
        transform: scale(1.1);
    }
    
    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.7) 100%);
    }
    
    .card-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        padding: 8px 18px;
        background: rgba(0,0,0,0.6);
        backdrop-filter: blur(10px);
        border-radius: 30px;
        color: white;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 1px;
        z-index: 2;
    }
    
    .card-badge i {
        margin-right: 5px;
        color: #c6a43b;
    }
    
    .card-content {
        padding: 25px;
        text-align: center;
        position: relative;
        background: white;
    }
    
    .card-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #c6a43b, #e8c45a);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: -50px auto 15px;
        position: relative;
        z-index: 2;
        box-shadow: 0 10px 20px rgba(198, 164, 59, 0.3);
    }
    
    .card-icon i {
        font-size: 28px;
        color: white;
    }
    
    .card-content h3 {
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #1a1a1a;
    }
    
    .card-content p {
        font-size: 0.85rem;
        color: #666;
        line-height: 1.7;
        margin-bottom: 20px;
    }
    
    .card-stats {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 20px;
    }
    
    .stat {
        text-align: center;
    }
    
    .stat-number {
        font-size: 1.2rem;
        font-weight: 700;
        color: #c6a43b;
    }
    
    .stat-label {
        font-size: 0.6rem;
        color: #999;
        text-transform: uppercase;
    }
    
    .card-btn {
        display: inline-block;
        padding: 10px 30px;
        background: transparent;
        border: 2px solid #c6a43b;
        color: #c6a43b;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .card-btn:hover {
        background: #c6a43b;
        color: #1a1a1a;
        transform: translateY(-3px);
    }
    
    /* ==================== STATS SECTION ==================== */
    .stats-section {
        background: linear-gradient(135deg, #1a1a2e, #16213e);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }
    
    .stats-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(198,164,59,0.05) 0%, transparent 70%);
        animation: rotate 30s linear infinite;
    }
    
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        position: relative;
        z-index: 2;
    }
    
    .stat-item {
        text-align: center;
        padding: 30px;
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.1);
        transition: all 0.3s ease;
    }
    
    .stat-item:hover {
        transform: translateY(-5px);
        background: rgba(255,255,255,0.1);
        border-color: #c6a43b;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: #c6a43b;
        margin-bottom: 10px;
    }
    
    .stat-label {
        font-size: 0.7rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.7);
    }
    
    /* ==================== FEATURE SECTION ==================== */
    .feature-section {
        padding: 100px 0;
        background: #f8f9fa;
    }
    
    .features-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
    }
    
    .feature-card {
        text-align: center;
        padding: 30px 20px;
        background: white;
        border-radius: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    
    .feature-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #c6a43b20, #c6a43b40);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .feature-icon {
        background: linear-gradient(135deg, #c6a43b, #e8c45a);
        transform: scale(1.1);
    }
    
    .feature-icon i {
        font-size: 35px;
        color: #c6a43b;
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .feature-icon i {
        color: white;
    }
    
    .feature-card h4 {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #1a1a1a;
    }
    
    .feature-card p {
        font-size: 0.8rem;
        color: #666;
        line-height: 1.6;
    }
    
    /* ==================== 3D FEATURED SECTION ==================== */
    .featured-section {
        padding: 120px 0;
        background: linear-gradient(135deg, #0f0f1e 0%, #1a1a2e 50%, #16213e 100%);
        position: relative;
        overflow: hidden;
    }

    .featured-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 20% 50%, rgba(198, 164, 59, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 80% 80%, rgba(198, 164, 59, 0.08) 0%, transparent 50%);
        pointer-events: none;
    }

    .featured-container {
        position: relative;
        z-index: 1;
    }

    .featured-content {
        perspective: 1200px;
        display: flex;
        gap: 40px;
        align-items: center;
        margin-top: 60px;
    }

    .featured-text {
        flex: 1;
        color: white;
    }

    .featured-text .subtitle {
        display: inline-block;
        font-size: 0.7rem;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: #c6a43b;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .featured-text h2 {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 20px;
        color: white;
        line-height: 1.2;
    }

    .featured-text h2 span {
        color: #c6a43b;
        background: linear-gradient(135deg, #c6a43b, #e8c45a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .featured-text p {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .featured-highlights {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .highlight-item {
        display: flex;
        gap: 15px;
        padding: 15px;
        background: rgba(198, 164, 59, 0.1);
        border-left: 3px solid #c6a43b;
        border-radius: 8px;
        backdrop-filter: blur(10px);
    }

    .highlight-item i {
        font-size: 24px;
        color: #c6a43b;
        flex-shrink: 0;
    }

    .highlight-item h4 {
        font-size: 0.9rem;
        font-weight: 700;
        color: white;
        margin-bottom: 5px;
    }

    .highlight-item p {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.7);
        margin: 0;
    }

    .featured-cards-container {
        flex: 1;
        perspective: 1200px;
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .featured-cards-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .featured-card {
        position: absolute;
        width: 280px;
        height: 380px;
        background: white;
        border-radius: 24px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        transform-style: preserve-3d;
        transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
        cursor: pointer;
        transform: rotateY(0deg) rotateX(0deg) translateZ(0) scale(0.85);
        opacity: 0.6;
    }

    .featured-card:nth-child(1) {
        transform: rotateY(-25deg) rotateX(5deg) translateZ(-50px) scale(0.85);
        opacity: 0.7;
    }

    .featured-card:nth-child(2) {
        transform: rotateY(0deg) rotateX(0deg) translateZ(50px) scale(1);
        opacity: 1;
        z-index: 10;
    }

    .featured-card:nth-child(3) {
        transform: rotateY(25deg) rotateX(5deg) translateZ(-50px) scale(0.85);
        opacity: 0.7;
    }

    .featured-card:hover {
        transform: rotateY(0deg) rotateX(-8deg) translateZ(60px) scale(1.02);
        box-shadow: 0 30px 80px rgba(198, 164, 59, 0.3);
    }

    .featured-card:nth-child(1):hover {
        transform: rotateY(-15deg) rotateX(3deg) translateZ(0px) scale(0.95);
    }

    .featured-card:nth-child(3):hover {
        transform: rotateY(15deg) rotateX(3deg) translateZ(0px) scale(0.95);
    }

    .featured-card-image {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .featured-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .featured-card:hover .featured-card-image img {
        transform: scale(1.1) rotateZ(2deg);
    }

    .featured-card-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, #c6a43b, #e8c45a);
        color: white;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 1px;
        z-index: 2;
        box-shadow: 0 8px 20px rgba(198, 164, 59, 0.4);
    }

    .featured-card-content {
        padding: 25px;
        height: 180px;
        display: flex;
        flex-direction: column;
    }

    .featured-card-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: #1a1a1a;
        margin-bottom: 8px;
    }

    .featured-card-desc {
        font-size: 0.75rem;
        color: #666;
        line-height: 1.6;
        flex: 1;
        margin-bottom: 12px;
    }

    .featured-card-tag {
        display: inline-block;
        background: linear-gradient(135deg, #c6a43b20, #c6a43b40);
        color: #c6a43b;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 1px;
        border: 1px solid #c6a43b;
        width: fit-content;
    }

    .card-carousel-nav {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 40px;
    }

    .carousel-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        border: 2px solid rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .carousel-dot.active {
        background: #c6a43b;
        border-color: #c6a43b;
        transform: scale(1.2);
        box-shadow: 0 0 15px rgba(198, 164, 59, 0.5);
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .hero-content h1 {
            font-size: 3rem;
        }
        .category-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .features-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .featured-content {
            flex-direction: column;
            gap: 40px;
        }
        .featured-cards-container {
            min-height: 400px;
        }
        .featured-card {
            width: 250px;
            height: 340px;
        }
    }
    
    @media (max-width: 768px) {
        .destinasi-hero {
            height: 70vh;
            min-height: 500px;
        }
        .hero-content h1 {
            font-size: 2.2rem;
        }
        .hero-content p {
            font-size: 0.9rem;
        }
        .category-grid {
            grid-template-columns: 1fr;
        }
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        .features-grid {
            grid-template-columns: 1fr;
        }
        .section-header h2 {
            font-size: 1.8rem;
        }
    }
</style>

<!-- ==================== HERO SECTION ==================== -->
<section class="destinasi-hero">
    <div class="hero-background"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-badge" data-aos="fade-up">EXPLORE THE GEOSITE</span>
        <h1 data-aos="fade-up" data-aos-delay="100">Destinasi <span>GeoToba</span></h1>
        <p data-aos="fade-up" data-aos-delay="200">Jelajahi keindahan geologi, budaya, dan pesona alam Caldera Danau Toba yang diakui UNESCO</p>
    </div>
    <div class="hero-scroll">
        <a href="#categories">
            <span>SCROLL</span>
            <div class="line"></div>
        </a>
    </div>
</section>

<!-- ==================== CATEGORY SECTION ==================== -->
<section class="category-section" id="categories">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="subtitle">PILIH KATEGORI</span>
            <h2>Temukan Destinasi Favoritmu</h2>
            <div class="divider"></div>
            <p>Nikmati pengalaman wisata yang berbeda di setiap kategorinya</p>
        </div>
        
        <div class="category-grid">
            <!-- Destinasi Alam -->
            <div class="category-card" data-aos="fade-up" data-aos-delay="0">
                <div class="card-image">
                    <img src="/image/destinasi/alam.jpg" alt="Destinasi Alam">
                    <div class="card-overlay"></div>
                    <span class="card-badge"><i class="fas fa-tag"></i> NATURE</span>
                </div>
                <div class="card-content">
                    <div class="card-icon">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <h3>Destinasi Alam</h3>
                    <p>Jelajahi keindahan alam Danau Toba yang memukau, goa alami dengan stalaktit, formasi batuan unik, dan air terjun yang menyegarkan.</p>
                    <div class="card-stats">
                        <div class="stat">
                            <div class="stat-number">3+</div>
                            <div class="stat-label">DESTINASI</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number">100%</div>
                            <div class="stat-label">ALAMI</div>
                        </div>
                    </div>
                    <a href="{{ url('/destinasi/alam') }}" class="card-btn">Jelajahi →</a>
                </div>
            </div>
            
            <!-- Destinasi Buatan -->
            <div class="category-card" data-aos="fade-up" data-aos-delay="100">
                <div class="card-image">
                    <img src="/image/destinasi/buatan.jpg" alt="Destinasi Buatan">
                    <div class="card-overlay"></div>
                    <span class="card-badge"><i class="fas fa-tag"></i> URBAN</span>
                </div>
                <div class="card-content">
                    <div class="card-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Destinasi Buatan</h3>
                    <p>Nikmati wisata buatan yang ikonik, patung megah, taman kota dengan view danau, dan jembatan dengan pemandangan spektakuler.</p>
                    <div class="card-stats">
                        <div class="stat">
                            <div class="stat-number">3+</div>
                            <div class="stat-label">DESTINASI</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number">⭐ 4.8</div>
                            <div class="stat-label">RATING</div>
                        </div>
                    </div>
                    <a href="{{ url('/destinasi/buatan') }}" class="card-btn">Jelajahi →</a>
                </div>
            </div>
            
            <!-- Destinasi Budaya -->
            <div class="category-card" data-aos="fade-up" data-aos-delay="200">
                <div class="card-image">
                    <img src="/image/destinasi/budaya.jpg" alt="Destinasi Budaya">
                    <div class="card-overlay"></div>
                    <span class="card-badge"><i class="fas fa-tag"></i> HERITAGE</span>
                </div>
                <div class="card-content">
                    <div class="card-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>Destinasi Budaya</h3>
                    <p>Rasakan kearifan lokal Batak Toba, kunjungi desa adat, museum sejarah, dan pusat kerajinan tenun ulos khas.</p>
                    <div class="card-stats">
                        <div class="stat">
                            <div class="stat-number">3+</div>
                            <div class="stat-label">DESTINASI</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number">🎭</div>
                            <div class="stat-label">TRADISI</div>
                        </div>
                    </div>
                    <a href="{{ url('/destinasi/budaya') }}" class="card-btn">Jelajahi →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== 3D FEATURED SECTION ==================== -->
<section class="featured-section">
    <div class="featured-container">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="subtitle">PILIHAN UNGGULAN</span>
                <h2>Destinasi <span>Imperdible</span> di GeoToba</h2>
                <div class="divider"></div>
            </div>

            <div class="featured-content">
                <div class="featured-text" data-aos="fade-right">
                    <span class="subtitle">REKOMENDASI KAMI</span>
                    <h2>Destinasi yang <span>Wajib Dikunjungi</span></h2>
                    <p>Berikut adalah destinasi unggulan yang paling direkomendasikan untuk memberikan pengalaman wisata terbaik Anda di Danau Toba.</p>
                    
                    <div class="featured-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-star"></i>
                            <div>
                                <h4>Top Rating</h4>
                                <p>Rating tertinggi dari pengunjung</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-heart"></i>
                            <div>
                                <h4>Favorit</h4>
                                <p>Paling sering dikunjungi</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-camera"></i>
                            <div>
                                <h4>Instagram</h4>
                                <p>Spot foto terbaik</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-compass"></i>
                            <div>
                                <h4>Eksplorasi</h4>
                                <p>Petualangan seru</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="featured-cards-container" data-aos="fade-left">
                    <div class="featured-cards-wrapper">
                        <!-- Featured Card 1: Sibandang -->
                        <div class="featured-card">
                            <div class="featured-card-image">
                                <img src="/image/4.jpeg" alt="Sibandang">
                                <span class="featured-card-badge">⭐ 4.9</span>
                            </div>
                            <div class="featured-card-content">
                                <h3 class="featured-card-title">Sibandang</h3>
                                <p class="featured-card-desc">Goa alami dengan stalaktit dan stalakmit yang memukau. Destinasi caving terbaik.</p>
                                <span class="featured-card-tag">Goa Alami</span>
                            </div>
                        </div>

                        <!-- Featured Card 2: Muara -->
                        <div class="featured-card">
                            <div class="featured-card-image">
                                <img src="/image/1.jpeg" alt="Muara">
                                <span class="featured-card-badge">⭐ 4.8</span>
                            </div>
                            <div class="featured-card-content">
                                <h3 class="featured-card-title">Muara</h3>
                                <p class="featured-card-desc">Formasi batuan unik dengan pemandangan sunset yang spektakuler di Danau Toba.</p>
                                <span class="featured-card-tag">Formasi Unik</span>
                            </div>
                        </div>

                        <!-- Featured Card 3: Papande -->
                        <div class="featured-card">
                            <div class="featured-card-image">
                                <img src="/image/2.jpeg" alt="Papande">
                                <span class="featured-card-badge">⭐ 4.7</span>
                            </div>
                            <div class="featured-card-content">
                                <h3 class="featured-card-title">Papande</h3>
                                <p class="featured-card-desc">Air terjun cantik dengan suasana asri untuk petualangan keluarga yang menyenangkan.</p>
                                <span class="featured-card-tag">Air Terjun</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-carousel-nav">
                <div class="carousel-dot active" onclick="rotateCard(0)"></div>
                <div class="carousel-dot" onclick="rotateCard(1)"></div>
                <div class="carousel-dot" onclick="rotateCard(2)"></div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== STATS SECTION ==================== -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-number">74.000+</div>
                <div class="stat-label">TAHUN SEJARAH CALDERA</div>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-number">9</div>
                <div class="stat-label">GEOSITE UNGGULAN</div>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-number">15+</div>
                <div class="stat-label">WARISAN BUDAYA</div>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-number">100+</div>
                <div class="stat-label">UMKM LOKAL</div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== FEATURE SECTION ==================== -->
<section class="feature-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="subtitle">MENGAPA HARUS KE GEOTOBA?</span>
            <h2>Pengalaman Wisata Tak Terlupakan</h2>
            <div class="divider"></div>
            <p>Nikmati keunikan yang hanya ada di Geopark Danau Toba</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-icon">
                    <i class="fas fa-mountain"></i>
                </div>
                <h4>Geologi Unik</h4>
                <p>Formasi batuan vulkanik hasil letusan supervolcano 74.000 tahun lalu</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-icon">
                    <i class="fas fa-landmark"></i>
                </div>
                <h4>Budaya Batak</h4>
                <p>Warisan budaya yang masih terjaga, tarian tradisional, dan tenun ulos</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-icon">
                    <i class="fas fa-camera"></i>
                </div>
                <h4>Spot Instagramable</h4>
                <p>Destinasi dengan pemandangan Danau Toba yang memukau untuk foto</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-icon">
                    <i class="fas fa-umbrella-beach"></i>
                </div>
                <h4>Aktivitas Seru</h4>
                <p>Trekking, caving, camping, dan wisata budaya yang menarik</p>
            </div>
        </div>
    </div>
</section>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<!-- AOS -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    // Inisialisasi AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });
    
    // Smooth scroll
    document.querySelector('.hero-scroll a').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('#categories').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });

    // 3D Card Carousel
    let currentIndex = 1;
    const cards = document.querySelectorAll('.featured-card');
    const dots = document.querySelectorAll('.carousel-dot');

    function rotateCard(index) {
        currentIndex = index;
        cards.forEach((card, i) => {
            let offset = i - index;
            
            if (offset === -1) {
                card.style.transform = 'rotateY(-25deg) rotateX(5deg) translateZ(-50px) scale(0.85)';
                card.style.opacity = '0.7';
                card.style.zIndex = '0';
            } else if (offset === 0) {
                card.style.transform = 'rotateY(0deg) rotateX(0deg) translateZ(50px) scale(1)';
                card.style.opacity = '1';
                card.style.zIndex = '10';
            } else if (offset === 1) {
                card.style.transform = 'rotateY(25deg) rotateX(5deg) translateZ(-50px) scale(0.85)';
                card.style.opacity = '0.7';
                card.style.zIndex = '0';
            } else {
                card.style.transform = 'rotateY(0deg) rotateX(0deg) translateZ(0px) scale(0.85)';
                card.style.opacity = '0.6';
                card.style.zIndex = '0';
            }
        });

        // Update dots
        dots.forEach((dot, i) => {
            dot.classList.remove('active');
            if (i === index) {
                dot.classList.add('active');
            }
        });
    }

    // Auto rotate cards every 5 seconds
    let autoRotateInterval = setInterval(() => {
        currentIndex = (currentIndex + 1) % cards.length;
        rotateCard(currentIndex);
    }, 5000);

    // Stop auto rotate on manual interaction
    dots.forEach(dot => {
        dot.addEventListener('click', function() {
            clearInterval(autoRotateInterval);
            autoRotateInterval = setInterval(() => {
                currentIndex = (currentIndex + 1) % cards.length;
                rotateCard(currentIndex);
            }, 5000);
        });
    });

    // Mouse move effect untuk card
    const cardsContainer = document.querySelector('.featured-cards-wrapper');
    if (cardsContainer) {
        cardsContainer.addEventListener('mousemove', function(e) {
            const rect = cardsContainer.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const angleX = (y - centerY) * 0.05;
            const angleY = (centerX - x) * 0.05;
            
            const activeCard = cardsContainer.querySelector('.featured-card[style*="scale(1)"]');
            if (activeCard) {
                activeCard.style.transform = `rotateX(${angleX}deg) rotateY(${angleY}deg) translateZ(50px) scale(1)`;
            }
        });

        cardsContainer.addEventListener('mouseleave', function() {
            rotateCard(currentIndex);
        });
    }
</script>

@endsection