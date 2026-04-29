@extends('layouts.app')

@section('title', 'Galeri - Geosite Danau Toba')

@section('content')

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #fff;
}

/* ===================== SPOTLIGHT SECTION ===================== */
.spotlight-section {
    padding: 80px 0;
}

.spotlight-header {
    text-align: center;
    margin-bottom: 40px;
}

.spotlight-header h1 {
    font-size: 34px;
    font-weight: 700;
}

.spotlight-header p {
    color: #777;
    font-size: 14px;
}

/* SCROLL */
.spotlight-wrapper {
    overflow-x: auto;
    scrollbar-width: none;
}

.spotlight-wrapper::-webkit-scrollbar {
    display: none;
}

.spotlight-track {
    display: flex;
    padding-left: 60px;
}

/* CARD */
.story-card {
    min-width: 260px;
    height: 380px;
    border-radius: 18px;
    overflow: hidden;
    position: relative;
    flex-shrink: 0;
    margin-left: -50px;
    cursor: pointer;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    transition: 0.3s;
}

.story-card:first-child {
    margin-left: 0;
}

.story-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.story-text {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 15px;
    color: #fff;
    background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
}

/* hover */
.story-card:hover {
    transform: translateY(-8px);
}

/* ===================== LIGHTBOX ===================== */
.lightbox {
    position: fixed;
    inset: 0;
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 99999;

    /* blur background */
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(10px);

    animation: fadeIn 0.3s ease;
}

.lightbox.show {
    display: flex;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.lightbox-content {
    position: relative;
    text-align: center;
    animation: zoomIn 0.25s ease;
}

@keyframes zoomIn {
    from { transform: scale(0.8); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.lightbox img {
    max-width: 90vw;
    max-height: 80vh;
    border-radius: 12px;
}

/* description */
.lightbox-desc {
    margin-top: 10px;
    color: #fff;
    font-size: 16px;
}

/* close */
.close {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 35px;
    color: white;
    cursor: pointer;
}

/* nav button */
.nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 40px;
    color: white;
    cursor: pointer;
    user-select: none;
    padding: 10px;
}

.nav.left { left: 20px; }
.nav.right { right: 20px; }

@media (max-width: 768px) {
    .story-card {
        min-width: 200px;
        height: 300px;
    }
}
</style>

<!-- ===================== GALLERY ===================== -->
<section class="spotlight-section">
    <div class="container">

        <div class="spotlight-header">
            <h1>Stories in the spotlight</h1>
            <p>Cool things you might've missed</p>
        </div>

        <div class="spotlight-wrapper">
            <div class="spotlight-track">

                <div class="story-card" onclick="openLightbox(0)">
                    <img src="/image/meat/galeri/1.jpg">
                    <div class="story-text"><h3>Pantai Muara</h3></div>
                </div>

                <div class="story-card" onclick="openLightbox(1)">
                    <img src="/image/meat/galeri/2.jpg">
                    <div class="story-text"><h3>Sunset View</h3></div>
                </div>

                <div class="story-card" onclick="openLightbox(2)">
                    <img src="/image/batu-bahisan/galeri/1.jpg">
                    <div class="story-text"><h3>Batu Bahisan</h3></div>
                </div>

                <div class="story-card" onclick="openLightbox(3)">
                    <img src="/image/liang-sipege/galeri/1.jpg">
                    <div class="story-text"><h3>Liang Sipege</h3></div>
                </div>

                <div class="story-card" onclick="openLightbox(4)">
                    <img src="/image/meat/galeri/3.jpg">
                    <div class="story-text"><h3>Hidden Beach</h3></div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- ===================== LIGHTBOX ===================== -->
<div class="lightbox" id="lightbox" onclick="outsideClick(event)">
    
    <span class="close" onclick="closeLightbox()">&times;</span>

    <span class="nav left" onclick="prevImage(event)">&#10094;</span>
    <span class="nav right" onclick="nextImage(event)">&#10095;</span>

    <div class="lightbox-content">
        <img id="lightbox-img">
        <div class="lightbox-desc" id="lightbox-desc"></div>
    </div>

</div>

<!-- BACKGROUND MUSIC (YOUTUBE FIX) -->
<iframe
    id="bg-music"
    width="0"
    height="0"
    src="https://www.youtube.com/embed/n2tHazyShic?autoplay=1&mute=1&loop=1&playlist=n2tHazyShic&controls=0"
    frameborder="0"
    allow="autoplay"
    style="display:none;">
</iframe>

<!-- ===================== SCRIPT ===================== -->
<script>
const images = [
    {src:'/image/meat/galeri/1.jpg', desc:'Pantai Muara'},
    {src:'/image/meat/galeri/2.jpg', desc:'Sunset View'},
    {src:'/image/batu-bahisan/galeri/1.jpg', desc:'Batu Bahisan'},
    {src:'/image/liang-sipege/galeri/1.jpg', desc:'Liang Sipege'},
    {src:'/image/meat/galeri/3.jpg', desc:'Hidden Beach'}
];
window.addEventListener("load", function () {
    const frame = document.getElementById("bg-music");

    // paksa reload supaya autoplay dipicu
    frame.src = frame.src;

    // fallback kalau diblok browser
    document.body.addEventListener("click", () => {
        frame.src = frame.src;
    }, { once: true });
});

function openLightbox(index){
    currentIndex = index;
    updateLightbox();
    document.getElementById('lightbox').classList.add('show');
}

function updateLightbox(){
    document.getElementById('lightbox-img').src = images[currentIndex].src;
    document.getElementById('lightbox-desc').innerText = images[currentIndex].desc;
}

function closeLightbox(){
    document.getElementById('lightbox').classList.remove('show');
}

/* next prev */
function nextImage(e){
    e.stopPropagation();
    currentIndex = (currentIndex + 1) % images.length;
    updateLightbox();
}

function prevImage(e){
    e.stopPropagation();
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    updateLightbox();
}

/* klik background */
function outsideClick(e){
    if(e.target.id === 'lightbox') closeLightbox();
}

/* ================= SWIPE MOBILE ================= */
let startX = 0;

document.getElementById('lightbox').addEventListener('touchstart', e => {
    startX = e.touches[0].clientX;
});

document.getElementById('lightbox').addEventListener('touchend', e => {
    let endX = e.changedTouches[0].clientX;

    if(startX - endX > 50){
        nextImage(e);
    } else if(endX - startX > 50){
        prevImage(e);
    }
});
</script>

@endsection