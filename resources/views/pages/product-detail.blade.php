@extends('layouts.app')

@section('title', $product->title . ' — Bills On Solar Kenya')

@section('content')
<section class="section section-white">
    <div class="container">
        <!-- Breadcrumb -->
        <div style="font-size: 13px; color: var(--color-text-muted); margin-bottom: 24px;">
            <a href="{{ route('home') }}" style="color:var(--color-text-muted);">Home</a> / 
            <a href="{{ route('shop.index') }}" style="color:var(--color-text-muted);">Shop</a> / 
            <span style="color:var(--color-charcoal); font-weight: 600;">{{ $product->title }}</span>
        </div>

        @php
            $galleryImages = $product->all_images;
        @endphp

        <div class="product-detail-grid">
            
            <!-- Left Image Showcase: Interactive Moving Carousel -->
            <div class="product-gallery-showcase">
                
                <!-- Main Carousel Frame -->
                <div class="carousel-main-frame" id="productCarousel">
                    @if($product->badge)
                        <span class="product-badge carousel-badge">{{ $product->badge }}</span>
                    @endif

                    @if(count($galleryImages) > 1)
                        <div class="carousel-counter" id="carouselCounter">
                            <span id="currentSlideNum">1</span> / {{ count($galleryImages) }}
                        </div>
                    @endif

                    <!-- Slides -->
                    <div class="carousel-slides-wrapper" id="carouselSlides">
                        @foreach($galleryImages as $index => $img)
                            <div class="carousel-slide {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                                <img src="{{ asset($img) }}" 
                                     alt="{{ $product->title }} — Photo {{ $index + 1 }}" 
                                     loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                                     onclick="openLightbox({{ $index }})"
                                     class="carousel-img">
                            </div>
                        @endforeach
                    </div>

                    @if(count($galleryImages) > 1)
                        <!-- Nav Arrows -->
                        <button type="button" class="carousel-nav-btn prev" onclick="prevSlide()" aria-label="Previous Photo">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button type="button" class="carousel-nav-btn next" onclick="nextSlide()" aria-label="Next Photo">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                        </button>

                        <!-- Moving Auto-play Progress Bar -->
                        <div class="carousel-progress-track">
                            <div class="carousel-progress-bar" id="carouselProgressBar"></div>
                        </div>
                    @endif

                    <!-- Zoom Button -->
                    <button type="button" class="carousel-zoom-btn" onclick="openLightbox(currentSlideIndex)" title="Click to view full size">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width:14px;height:14px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                        <span>Enlarge</span>
                    </button>
                </div>

                @if(count($galleryImages) > 1)
                    <!-- Thumbnail Navigation Bar -->
                    <div class="carousel-thumbnails-strip" id="thumbnailsStrip">
                        @foreach($galleryImages as $index => $img)
                            <button type="button" 
                                    class="carousel-thumb {{ $index === 0 ? 'active' : '' }}" 
                                    data-index="{{ $index }}"
                                    onclick="goToSlide({{ $index }})" 
                                    aria-label="View photo {{ $index + 1 }}">
                                <img src="{{ asset($img) }}" alt="Thumbnail {{ $index + 1 }}">
                            </button>
                        @endforeach
                    </div>
                @endif

                <!-- Trust Strip -->
                <div class="gallery-trust-strip">
                    <div class="trust-pill">
                        <span style="color:#10B981; font-weight:900;">✓</span> 10-Year Warranty
                    </div>
                    <div class="trust-pill">
                        <span style="color:#F5A623;">⚡</span> EPRA Approved
                    </div>
                    <div class="trust-pill">
                        <span style="color:#3B82F6;">🚚</span> Fast Kenya Delivery
                    </div>
                </div>

            </div>

            <!-- Right Details -->
            <div>
                <span class="eyebrow">{{ $product->brand ? $product->brand->name : 'Bills On Solar' }}</span>
                <h1 style="font-size: clamp(1.8rem, 3vw, 2.5rem); font-weight: 800; color: var(--color-charcoal); line-height: 1.2; margin-bottom: 16px;">
                    {{ $product->title }}
                </h1>
                
                <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                    <div style="font-size: 2.2rem; font-weight: 900; color: var(--color-charcoal); letter-spacing: -0.03em;">
                        KES {{ number_format($product->price) }}
                    </div>
                    <span style="background: rgba(16,185,129,0.15); color: #10B981; font-size: 12px; font-weight: 700; padding: 6px 12px; border-radius: 50px;">
                        ● In Stock · Nairobi Warehouse
                    </span>
                </div>

                <div style="font-size: 15px; color: var(--color-text-muted); line-height: 1.6; margin-bottom: 32px; white-space: pre-line;">{{ $product->description ?: 'Engineered for high-duty Kenyan solar conditions. Built with Grade A components, superior thermal stability, and maximum energy output. Includes full manufacturer warranty and technical support.' }}</div>

                <!-- Actions -->
                <form action="{{ route('cart.add') }}" method="POST" style="margin-bottom: 36px;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    
                    <div style="display: flex; gap: 14px; align-items: center; margin-bottom: 16px; flex-wrap: wrap;">
                        <div style="display: inline-flex; align-items: center; background: var(--color-cream); border-radius: 12px; border: 1px solid var(--color-border); padding: 4px;">
                            <button type="button" onclick="const q = document.getElementById('productQty'); if(parseInt(q.value)>1) q.value = parseInt(q.value)-1;" style="background: none; border: none; padding: 8px 14px; font-size: 16px; font-weight: bold; cursor: pointer; color: var(--color-charcoal);">-</button>
                            <input type="number" id="productQty" name="qty" value="1" min="1" max="99" style="width: 48px; text-align: center; border: none; background: transparent; font-weight: 800; font-size: 15px; color: var(--color-charcoal); -moz-appearance: textfield;">
                            <button type="button" onclick="const q = document.getElementById('productQty'); q.value = parseInt(q.value)+1;" style="background: none; border: none; padding: 8px 14px; font-size: 16px; font-weight: bold; cursor: pointer; color: var(--color-charcoal);">+</button>
                        </div>

                        <button type="submit" class="btn-primary" style="flex: 1; min-width: 200px; justify-content: center; font-size: 14.5px; padding: 14px 20px; cursor: pointer;">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            Add to System Quote / Cart
                        </button>
                    </div>

                    <a href="https://wa.me/254702156134?text=Hello%20BillsOnSolar!%20I'd%20like%20to%20order/quote%20the%20{{ urlencode($product->title) }}" class="btn-whatsapp-large" style="width: 100%; justify-content: center; font-size: 14px; padding: 13px 20px;" target="_blank">
                        <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Instant WhatsApp Order / Inquiry
                    </a>
                </form>

                <!-- Technical Specification Matrix -->
                <div style="background: var(--color-cream); border-radius: 16px; padding: 24px;">
                    <h3 style="font-size: 16px; font-weight: 800; color: var(--color-charcoal); margin-bottom: 16px;">Technical Specifications</h3>
                    @if($product->specs)
                        <div style="display: grid; gap: 10px;">
                            @foreach($product->specs as $key => $val)
                                <div style="display: flex; justify-content: space-between; font-size: 13.5px; padding-bottom: 8px; border-bottom: 1px solid rgba(0,0,0,0.06);">
                                    <span style="color: var(--color-text-muted); font-weight: 500;">{{ $key }}</span>
                                    <span style="color: var(--color-charcoal); font-weight: 700;">{{ $val }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Related Products -->
@if(count($relatedProducts) > 0)
<section class="section section-cream">
    <div class="container">
        <h2 class="section-title" style="margin-bottom: 32px;">Related <span class="highlight">Equipment</span></h2>
        <div class="product-grid">
            @foreach($relatedProducts as $p)
                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="{{ asset($p->image) }}" alt="{{ $p->title }}" loading="lazy">
                        <div class="product-actions-overlay">
                            <a href="{{ route('shop.detail', $p->slug) }}" class="btn-view-sm" style="width:100%; text-align:center;">View Specifications</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">{{ $p->brand ? $p->brand->name : 'Bills On Solar' }}</div>
                        <div class="product-name"><a href="{{ route('shop.detail', $p->slug) }}">{{ $p->title }}</a></div>
                        <div class="product-price">KES {{ number_format($p->price) }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Fullscreen Lightbox Modal -->
<div id="productLightbox" class="product-lightbox-modal" onclick="handleLightboxBackdropClick(event)">
    <button type="button" class="lightbox-btn-close" onclick="closeLightbox()" aria-label="Close Lightbox">&times;</button>
    <button type="button" class="lightbox-nav-btn prev" onclick="lightboxPrev(event)" aria-label="Previous image">&#10094;</button>
    <div class="lightbox-stage">
        <img id="lightboxImg" src="" alt="Enlarged Product View">
        <div class="lightbox-caption">
            <span id="lightboxCounter">1 / 1</span> &bull; {{ $product->title }}
        </div>
    </div>
    <button type="button" class="lightbox-nav-btn next" onclick="lightboxNext(event)" aria-label="Next image">&#10095;</button>
</div>

@push('styles')
<style>
/* Layout */
.product-detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: start;
}
@media (max-width: 920px) {
    .product-detail-grid {
        grid-template-columns: 1fr;
        gap: 36px;
    }
}

/* Gallery Showcase Box */
.product-gallery-showcase {
    background: var(--color-cream, #FAFCFB);
    border: 1px solid var(--color-border, #E2E8F0);
    border-radius: 24px;
    padding: 24px;
    position: relative;
    box-shadow: 0 10px 30px -5px rgba(0,0,0,0.03);
}

/* Main Carousel Stage */
.carousel-main-frame {
    position: relative;
    height: 440px;
    border-radius: 18px;
    background: radial-gradient(circle at center, #FFFFFF 0%, #F4F8F5 100%);
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(0,0,0,0.04);
}
@media (max-width: 600px) {
    .carousel-main-frame {
        height: 320px;
    }
}

/* Badge */
.carousel-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    z-index: 10;
}

/* Counter */
.carousel-counter {
    position: absolute;
    top: 16px;
    right: 16px;
    background: rgba(5, 28, 18, 0.75);
    color: white;
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    padding: 4px 12px;
    border-radius: 50px;
    font-size: 11px;
    font-weight: 800;
    z-index: 10;
    letter-spacing: 0.04em;
    border: 1px solid rgba(255,255,255,0.15);
}

/* Slides */
.carousel-slides-wrapper {
    width: 100%;
    height: 100%;
    position: relative;
}
.carousel-slide {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transform: scale(0.96) translate3d(0, 0, 0);
    transition: opacity 0.45s cubic-bezier(0.16, 1, 0.3, 1), transform 0.45s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.45s;
    padding: 24px;
}
.carousel-slide.active {
    opacity: 1;
    visibility: visible;
    transform: scale(1) translate3d(0, 0, 0);
    z-index: 2;
}
.carousel-img {
    max-height: 360px;
    max-width: 88%;
    object-fit: contain;
    margin: 0 auto;
    filter: drop-shadow(0 15px 30px rgba(5, 28, 18, 0.12));
    cursor: zoom-in;
    transition: transform 0.35s ease;
}
.carousel-img:hover {
    transform: scale(1.035);
}

/* Nav Buttons */
.carousel-nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(0, 0, 0, 0.08);
    color: #051C12;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    transition: all 0.25s ease;
    cursor: pointer;
}
.carousel-nav-btn svg {
    width: 18px;
    height: 18px;
}
.carousel-nav-btn.prev { left: 14px; }
.carousel-nav-btn.next { right: 14px; }
.carousel-nav-btn:hover {
    background: #F5A623;
    color: #051C12;
    transform: translateY(-50%) scale(1.08);
    box-shadow: 0 6px 20px rgba(245, 166, 35, 0.4);
}

/* Zoom Button */
.carousel-zoom-btn {
    position: absolute;
    bottom: 14px;
    right: 14px;
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(0, 0, 0, 0.08);
    color: #051C12;
    padding: 6px 12px;
    border-radius: 50px;
    font-size: 11px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 5px;
    z-index: 10;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    transition: all 0.2s ease;
}
.carousel-zoom-btn:hover {
    background: #051C12;
    color: white;
    transform: translateY(-2px);
}

/* Moving Auto-play Progress Bar */
.carousel-progress-track {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: rgba(0, 0, 0, 0.05);
    z-index: 9;
}
.carousel-progress-bar {
    height: 100%;
    width: 0%;
    background: linear-gradient(90deg, #F5A623, #FFC14D);
    border-radius: 0 2px 2px 0;
    transition: width 0.08s linear;
}

/* Thumbnails Strip */
.carousel-thumbnails-strip {
    display: flex;
    gap: 10px;
    margin-top: 16px;
    overflow-x: auto;
    padding: 4px 2px 8px;
    justify-content: center;
    scrollbar-width: thin;
    scrollbar-color: #CBD5E1 transparent;
}
.carousel-thumbnails-strip::-webkit-scrollbar {
    height: 4px;
}
.carousel-thumbnails-strip::-webkit-scrollbar-thumb {
    background: #CBD5E1;
    border-radius: 4px;
}
.carousel-thumb {
    flex: 0 0 68px;
    height: 68px;
    border-radius: 12px;
    background: white;
    border: 2px solid var(--color-border, #E2E8F0);
    padding: 4px;
    cursor: pointer;
    transition: all 0.25s ease;
    overflow: hidden;
    outline: none;
}
.carousel-thumb img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 6px;
}
.carousel-thumb:hover {
    border-color: #94A3B8;
    transform: translateY(-2px);
}
.carousel-thumb.active {
    border-color: #F5A623;
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 4px 14px rgba(245, 166, 35, 0.35);
}

/* Trust Strip */
.gallery-trust-strip {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
    flex-wrap: wrap;
}
.trust-pill {
    padding: 8px 14px;
    background: white;
    border-radius: 50px;
    font-size: 11.5px;
    font-weight: 700;
    color: var(--color-charcoal, #051C12);
    border: 1px solid var(--color-border, #E2E8F0);
    display: flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.02);
}

/* Lightbox Modal */
.product-lightbox-modal {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 999999;
    background: rgba(5, 28, 18, 0.94);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    align-items: center;
    justify-content: center;
    animation: fadeInLightbox 0.25s ease forwards;
}
.product-lightbox-modal.open {
    display: flex;
}
@keyframes fadeInLightbox {
    from { opacity: 0; }
    to { opacity: 1; }
}
.lightbox-stage {
    max-width: 90vw;
    max-height: 85vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
#lightboxImg {
    max-width: 85vw;
    max-height: 75vh;
    object-fit: contain;
    border-radius: 14px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.5);
    animation: zoomInImg 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
@keyframes zoomInImg {
    from { transform: scale(0.92); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}
.lightbox-caption {
    margin-top: 14px;
    color: rgba(255,255,255,0.85);
    font-size: 13px;
    font-weight: 600;
    text-align: center;
}
.lightbox-btn-close {
    position: absolute;
    top: 20px;
    right: 24px;
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    font-size: 26px;
    line-height: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
}
.lightbox-btn-close:hover {
    background: rgba(220, 38, 38, 0.85);
    transform: scale(1.08);
}
.lightbox-nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    font-size: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
}
.lightbox-nav-btn.prev { left: 24px; }
.lightbox-nav-btn.next { right: 24px; }
.lightbox-nav-btn:hover {
    background: #F5A623;
    color: #051C12;
    transform: translateY(-50%) scale(1.1);
}
@media (max-width: 600px) {
    .lightbox-nav-btn { width: 40px; height: 40px; font-size: 18px; }
    .lightbox-nav-btn.prev { left: 10px; }
    .lightbox-nav-btn.next { right: 10px; }
}
</style>
@endpush

@push('scripts')
<script>
(function() {
    const imagesList = @json(array_values($galleryImages));
    const totalSlides = imagesList.length;
    let currentSlideIndex = 0;
    let isPaused = false;
    let autoPlayInterval = null;
    let progressTimer = null;
    let progressPercent = 0;
    const slideDuration = 4200; // 4.2s per slide
    const progressStep = 50; // update bar every 50ms

    window.currentSlideIndex = currentSlideIndex;

    const slides = document.querySelectorAll('.carousel-slide');
    const thumbs = document.querySelectorAll('.carousel-thumb');
    const counterEl = document.getElementById('currentSlideNum');
    const progressBar = document.getElementById('carouselProgressBar');
    const carouselFrame = document.getElementById('productCarousel');

    function updateSlide(newIndex) {
        if (totalSlides <= 0) return;
        currentSlideIndex = (newIndex + totalSlides) % totalSlides;
        window.currentSlideIndex = currentSlideIndex;

        // Update slides
        slides.forEach((s, idx) => {
            if (idx === currentSlideIndex) {
                s.classList.add('active');
            } else {
                s.classList.remove('active');
            }
        });

        // Update thumbnails
        thumbs.forEach((t, idx) => {
            if (idx === currentSlideIndex) {
                t.classList.add('active');
                t.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            } else {
                t.classList.remove('active');
            }
        });

        // Update Counter
        if (counterEl) {
            counterEl.textContent = currentSlideIndex + 1;
        }

        // Reset progress bar on manual slide change
        resetProgress();
    }

    window.nextSlide = function() {
        updateSlide(currentSlideIndex + 1);
    };

    window.prevSlide = function() {
        updateSlide(currentSlideIndex - 1);
    };

    window.goToSlide = function(idx) {
        updateSlide(idx);
    };

    // Auto-advance progress ticker
    function startAutoPlay() {
        if (totalSlides <= 1) return;

        clearInterval(progressTimer);
        progressPercent = 0;

        progressTimer = setInterval(() => {
            if (!isPaused) {
                progressPercent += (progressStep / slideDuration) * 100;
                if (progressBar) {
                    progressBar.style.width = Math.min(progressPercent, 100) + '%';
                }
                if (progressPercent >= 100) {
                    progressPercent = 0;
                    nextSlide();
                }
            }
        }, progressStep);
    }

    function resetProgress() {
        progressPercent = 0;
        if (progressBar) {
            progressBar.style.width = '0%';
        }
    }

    // Hover pause & resume
    if (carouselFrame) {
        carouselFrame.addEventListener('mouseenter', () => { isPaused = true; });
        carouselFrame.addEventListener('mouseleave', () => { isPaused = false; });

        // Touch swiping on mobile
        let touchStartX = 0;
        let touchEndX = 0;

        carouselFrame.addEventListener('touchstart', (e) => {
            isPaused = true;
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        carouselFrame.addEventListener('touchend', (e) => {
            isPaused = false;
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, { passive: true });

        function handleSwipe() {
            const swipeDiff = touchEndX - touchStartX;
            if (Math.abs(swipeDiff) > 40) {
                if (swipeDiff < 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            }
        }
    }

    // Start auto carousel
    if (totalSlides > 1) {
        startAutoPlay();
    }

    /* ---- Lightbox Modal ---- */
    const lightbox = document.getElementById('productLightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxCounter = document.getElementById('lightboxCounter');

    window.openLightbox = function(index) {
        if (index === undefined || index === null) index = currentSlideIndex;
        currentSlideIndex = index;
        updateSlide(index);

        if (lightbox && lightboxImg) {
            lightboxImg.src = '{{ asset("") }}' + imagesList[currentSlideIndex].replace(/^\//, '');
            if (lightboxCounter) {
                lightboxCounter.textContent = `${currentSlideIndex + 1} / ${totalSlides}`;
            }
            lightbox.classList.add('open');
            document.body.style.overflow = 'hidden';
            isPaused = true;
        }
    };

    window.closeLightbox = function() {
        if (lightbox) {
            lightbox.classList.remove('open');
            document.body.style.overflow = '';
            isPaused = false;
        }
    };

    window.handleLightboxBackdropClick = function(e) {
        if (e.target === lightbox || e.target.classList.contains('lightbox-stage')) {
            closeLightbox();
        }
    };

    window.lightboxNext = function(e) {
        if (e) e.stopPropagation();
        nextSlide();
        if (lightboxImg) {
            lightboxImg.src = '{{ asset("") }}' + imagesList[currentSlideIndex].replace(/^\//, '');
            if (lightboxCounter) {
                lightboxCounter.textContent = `${currentSlideIndex + 1} / ${totalSlides}`;
            }
        }
    };

    window.lightboxPrev = function(e) {
        if (e) e.stopPropagation();
        prevSlide();
        if (lightboxImg) {
            lightboxImg.src = '{{ asset("") }}' + imagesList[currentSlideIndex].replace(/^\//, '');
            if (lightboxCounter) {
                lightboxCounter.textContent = `${currentSlideIndex + 1} / ${totalSlides}`;
            }
        }
    };

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (lightbox && lightbox.classList.contains('open')) {
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') lightboxNext();
            if (e.key === 'ArrowLeft') lightboxPrev();
        }
    });

})();
</script>
@endpush
@endsection

