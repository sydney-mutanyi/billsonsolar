@extends('layouts.app')

@section('title', 'Bills On Solar — Premium Solar Solutions in Kenya')

@section('content')

<!-- =============================================
     HERO CAROUSEL SECTION
     ============================================= -->
<section class="hero" id="home">
    <div class="hero-slider" id="heroSlider">

        <!-- SLIDE 1: Residential Solar -->
        <div class="hero-slide active" data-slide="0">
            <img src="{{ asset('images/solar_hero_1.png') }}" class="slide-bg-img" alt="Residential Solar Installation in Kenya">
            <div class="slide-overlay"></div>
            <div class="hero-content">
                <div class="hero-left">
                    <div class="hero-badge">
                        <span class="hero-badge-dot"></span>
                        Residential Solar Solutions
                    </div>
                    <h1 class="hero-headline">
                        POWER YOUR HOME,<br>
                        <span class="gold">ZERO OUTAGES.</span>
                    </h1>
                    <p class="hero-subtext">
                        Premium Monocrystalline solar panels & smart lithium battery backups engineered for Kenyan homes and villas. Say goodbye to blackouts and high KPLC bills.
                    </p>
                    <div class="hero-ctas">
                        <a href="{{ route('shop.index', ['category' => 'panels']) }}" class="btn-primary">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:16px;height:16px"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            Explore Solar Kits
                        </a>
                        <a href="{{ route('contact') }}" class="btn-ghost">
                            Get Free Home Quote →
                        </a>
                    </div>
                </div>

                <!-- Right-hand Quick Estimator Card -->
                <div class="hero-visual">
                    <div class="hero-estimator-card">
                        <div class="estimator-header">
                            <div class="estimator-title">
                                <span>⚡</span> Quick System Sizer
                            </div>
                            <span class="estimator-badge">Instant Estimate</span>
                        </div>
                        <p style="font-size:12px;color:rgba(255,255,255,0.7);margin-bottom:14px;">Select your property type to estimate recommended system size:</p>
                        <div class="estimator-options">
                            <button class="estimator-opt-btn active" onclick="setEstimator('home', this)">🏡 Home</button>
                            <button class="estimator-opt-btn" onclick="setEstimator('business', this)">🏢 Business</button>
                            <button class="estimator-opt-btn" onclick="setEstimator('farm', this)">🌾 Off-Grid</button>
                        </div>
                        <div class="estimator-details" id="estimatorDetails">
                            <div class="estimator-row"><span>Recommended System:</span> <span class="estimator-val" id="estSystem">5kW Hybrid System</span></div>
                            <div class="estimator-row"><span>Solar Battery:</span> <span class="estimator-val" id="estBattery">5.12kWh Lithium</span></div>
                            <div class="estimator-row"><span>Est. Monthly Savings:</span> <span class="estimator-val" id="estSavings">85% - KES 15,000/mo</span></div>
                            <div class="estimator-row bold"><span>Typical Payback:</span> <span class="estimator-val" id="estPayback">18 - 24 Months</span></div>
                        </div>
                        <a href="https://wa.me/254795857846?text=Hello%20BillsOnSolar!%20I'd%20like%20a%20quote%20for%20a%205kW%20Residential%20Solar%20System." class="btn-whatsapp-large" id="estWaBtn" target="_blank" style="width:100%;justify-content:center;font-size:13px;padding:12px 18px;">
                            <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Get Home System Quote
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- SLIDE 2: Lithium Batteries & Hybrid Inverters -->
        <div class="hero-slide" data-slide="1">
            <img src="{{ asset('images/solar_hero_2.png') }}" class="slide-bg-img" alt="Lithium Battery and Smart Hybrid Inverter Storage">
            <div class="slide-overlay"></div>
            <div class="hero-content">
                <div class="hero-left">
                    <div class="hero-badge">
                        <span class="hero-badge-dot"></span>
                        Smart Storage & Backup
                    </div>
                    <h1 class="hero-headline">
                        UNINTERRUPTED,<br>
                        <span class="gold">24/7 STORAGE.</span>
                    </h1>
                    <p class="hero-subtext">
                        LiFePO4 Lithium batteries with 6,000+ cycle lifespan paired with top-tier Deye, Victron & Growatt hybrid inverters. Clean energy stored when you need it most.
                    </p>
                    <div class="hero-ctas">
                        <a href="{{ route('shop.index', ['category' => 'batteries']) }}" class="btn-primary">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:16px;height:16px"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            Explore Batteries
                        </a>
                        <a href="{{ route('shop.index', ['category' => 'inverters']) }}" class="btn-ghost">
                            View Inverters →
                        </a>
                    </div>
                </div>

                <div class="hero-visual">
                    <div class="hero-estimator-card">
                        <div class="estimator-header">
                            <div class="estimator-title">
                                <span>🔋</span> Battery Storage Highlight
                            </div>
                            <span class="estimator-badge" style="color:#F5A623;border-color:rgba(245,166,35,0.4);background:rgba(245,166,35,0.15);">10-Yr Warranty</span>
                        </div>
                        <div class="estimator-details" style="margin-top:10px;">
                            <div class="estimator-row"><span>Cell Type:</span> <span class="estimator-val">Grade A LiFePO4 Chemistry</span></div>
                            <div class="estimator-row"><span>Cycle Life:</span> <span class="estimator-val">> 6,000 Cycles @ 80% DOD</span></div>
                            <div class="estimator-row"><span>Switchover Time:</span> <span class="estimator-val">0ms UPS Instant Backup</span></div>
                            <div class="estimator-row bold"><span>Compatible Inverters:</span> <span class="estimator-val">Deye, Victron, Growatt</span></div>
                        </div>
                        <a href="https://wa.me/254795857846?text=Hello%20BillsOnSolar!%20I'm%20interested%20in%20a%20Lithium%20Battery%20and%20Inverter%20package." class="btn-whatsapp-large" target="_blank" style="width:100%;justify-content:center;font-size:13px;padding:12px 18px;">
                            <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Get Battery System Quote
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- SLIDE 3: Commercial Solar -->
        <div class="hero-slide" data-slide="2">
            <img src="{{ asset('images/solar_hero_3.png') }}" class="slide-bg-img" alt="Commercial Solar Installation Kenya">
            <div class="slide-overlay"></div>
            <div class="hero-content">
                <div class="hero-left">
                    <div class="hero-badge">
                        <span class="hero-badge-dot"></span>
                        Commercial & Industrial
                    </div>
                    <h1 class="hero-headline">
                        CUT POWER BILLS<br>
                        <span class="gold">BY UP TO 80%.</span>
                    </h1>
                    <p class="hero-subtext">
                        Commercial solar grid-tie & hybrid installations for factories, hotels, schools and office complexes across Kenya. Turn energy cost into long-term capital savings.
                    </p>
                    <div class="hero-ctas">
                        <a href="{{ route('solutions') }}" class="btn-primary">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:16px;height:16px"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            Commercial Solutions
                        </a>
                        <a href="{{ route('contact') }}" class="btn-ghost">
                            Book Free Site Audit →
                        </a>
                    </div>
                </div>

                <div class="hero-visual">
                    <div class="hero-estimator-card">
                        <div class="estimator-header">
                            <div class="estimator-title">
                                <span>🏭</span> Commercial Audit
                            </div>
                            <span class="estimator-badge">EPRA Certified</span>
                        </div>
                        <div class="estimator-details" style="margin-top:10px;">
                            <div class="estimator-row"><span>System Range:</span> <span class="estimator-val">10kW up to 500kW+</span></div>
                            <div class="estimator-row"><span>EPRA Compliance:</span> <span class="estimator-val">Full Permit & Grid Tie</span></div>
                            <div class="estimator-row"><span>ROI Timeline:</span> <span class="estimator-val">2.5 to 3.5 Years</span></div>
                            <div class="estimator-row bold"><span>Site Assessment:</span> <span class="estimator-val">Free Energy Audit</span></div>
                        </div>
                        <a href="https://wa.me/254795857846?text=Hello%20BillsOnSolar!%20I'd%20like%20to%20schedule%20a%20commercial%20solar%20site%20audit." class="btn-whatsapp-large" target="_blank" style="width:100%;justify-content:center;font-size:13px;padding:12px 18px;">
                            <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Book Commercial Audit
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Carousel Controls Overlay -->
    <div class="hero-controls">
        <div class="hero-indicators" id="heroIndicators">
            <div class="hero-dot active" onclick="goToSlide(0)"><div class="hero-dot-fill"></div></div>
            <div class="hero-dot" onclick="goToSlide(1)"><div class="hero-dot-fill"></div></div>
            <div class="hero-dot" onclick="goToSlide(2)"><div class="hero-dot-fill"></div></div>
        </div>
        <div class="hero-arrows">
            <button class="hero-arrow-btn" onclick="prevSlide()" aria-label="Previous Slide">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button class="hero-arrow-btn" onclick="nextSlide()" aria-label="Next Slide">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
    </div>

    <!-- Progress Bar at bottom of Hero -->
    <div class="hero-progress-container">
        <div class="hero-progress-bar" id="heroProgressBar"></div>
    </div>
</section>

<!-- =============================================
     TRUST MARQUEE STRIP
     ============================================= -->
<div class="trust-strip">
    <div class="trust-marquee" id="trustMarquee">
        <div class="trust-item">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Nationwide Delivery Across Kenya
        </div>
        <div class="trust-item">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            10-Year Warranty Coverage
        </div>
        <div class="trust-item">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            500+ Projects Completed
        </div>
        <div class="trust-item">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            EPRA Certified Technicians
        </div>
    </div>
</div>

<!-- =============================================
     STATS SECTION
     ============================================= -->
<section class="stats-section">
    <div class="stats-inner">
        <div class="stat-block" data-aos="fade-up">
            <div class="counter-num"><span class="counter-val" data-target="500">0</span><span class="unit">+</span></div>
            <div class="stat-label">Solar Installations Completed</div>
        </div>
        <div class="stat-block" data-aos="fade-up" style="transition-delay:0.1s">
            <div class="counter-num"><span class="counter-val" data-target="200">0</span><span class="unit">+</span></div>
            <div class="stat-label">Premium Products in Stock</div>
        </div>
        <div class="stat-block" data-aos="fade-up" style="transition-delay:0.2s">
            <div class="counter-num"><span class="counter-val" data-target="47">0</span></div>
            <div class="stat-label">Counties Served Across Kenya</div>
        </div>
        <div class="stat-block" data-aos="fade-up" style="transition-delay:0.3s">
            <div class="counter-num"><span class="counter-val" data-target="10">0</span><span class="unit">yr</span></div>
            <div class="stat-label">Product Warranty Coverage</div>
        </div>
    </div>
</section>

<!-- =============================================
     SHOP BY CATEGORY
     ============================================= -->
<section class="section section-cream">
    <div class="container">
        <div class="section-header">
            <span class="eyebrow" data-aos="fade-up">Our Products</span>
            <h2 class="section-title" data-aos="fade-up">Shop by <span class="highlight">Category</span></h2>
            <p class="section-sub" data-aos="fade-up">Everything you need for a complete, high-performance solar system — from panels to batteries to smart inverters.</p>
        </div>
        <div class="category-grid">
            <a href="{{ route('shop.index', ['category' => 'panels']) }}" class="category-card" data-aos="fade-up" style="transition-delay:0.05s">
                <div class="cat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="14" rx="2" stroke-width="2"/><line x1="3" y1="9" x2="21" y2="9" stroke-width="2"/><line x1="9" y1="9" x2="9" y2="18" stroke-width="2"/><line x1="15" y1="9" x2="15" y2="18" stroke-width="2"/></svg>
                </div>
                <div class="cat-name">Solar Panels</div>
                <div class="cat-count">100W – 550W+</div>
            </a>
            <a href="{{ route('shop.index', ['category' => 'batteries']) }}" class="category-card" data-aos="fade-up" style="transition-delay:0.1s">
                <div class="cat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18a1 1 0 011 1v8a1 1 0 01-1 1H3a1 1 0 01-1-1V8a1 1 0 011-1zM7 7V5m10 2V5M13 12H7m4 0l-2-2m2 2l-2 2"/></svg>
                </div>
                <div class="cat-name">Solar Batteries</div>
                <div class="cat-count">Lithium, Gel, Lead</div>
            </a>
            <a href="{{ route('shop.index', ['category' => 'inverters']) }}" class="category-card" data-aos="fade-up" style="transition-delay:0.15s">
                <div class="cat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div class="cat-name">Solar Inverters</div>
                <div class="cat-count">Hybrid, Off-Grid, Grid-Tie</div>
            </a>
            <a href="{{ route('shop.index', ['category' => 'controllers']) }}" class="category-card" data-aos="fade-up" style="transition-delay:0.2s">
                <div class="cat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                </div>
                <div class="cat-name">Charge Controllers</div>
                <div class="cat-count">MPPT & PWM</div>
            </a>
            <a href="{{ route('shop.index', ['category' => 'lights']) }}" class="category-card" data-aos="fade-up" style="transition-delay:0.25s">
                <div class="cat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                </div>
                <div class="cat-name">Solar Lights</div>
                <div class="cat-count">Street, Flood, Garden</div>
            </a>
            <a href="{{ route('shop.index') }}" class="category-card" data-aos="fade-up" style="transition-delay:0.3s">
                <div class="cat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
                <div class="cat-name">Browse All</div>
                <div class="cat-count">View Catalog →</div>
            </a>
        </div>
    </div>
</section>

<!-- =============================================
     FEATURED PRODUCTS
     ============================================= -->
<section class="section section-white">
    <div class="container">
        <div class="section-header">
            <span class="eyebrow" data-aos="fade-up">Top Picks</span>
            <h2 class="section-title" data-aos="fade-up">Featured <span class="highlight">Products</span></h2>
            <p class="section-sub" data-aos="fade-up">Curated selection of our best-selling solar products — all premium grade, fully warrantied, and ready for installation.</p>
        </div>

        <div class="product-grid" id="productGrid">
            @foreach($featuredProducts as $fp)
                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="{{ asset($fp->image) }}" alt="{{ $fp->title }}" loading="lazy">
                        @if($fp->badge)
                            <span class="product-badge">{{ $fp->badge }}</span>
                        @endif
                        <div class="product-actions-overlay">
                            <a href="https://wa.me/254795857846?text=I'm%20interested%20in%20the%20{{ urlencode($fp->title) }}" class="btn-whatsapp-sm" target="_blank">
                                <svg viewBox="0 0 24 24" fill="currentColor" style="width:14px;height:14px"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                Get Quote
                            </a>
                            <a href="{{ route('shop.detail', $fp->slug) }}" class="btn-view-sm">View Details</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">{{ $fp->brand ? $fp->brand->name : 'Bills On Solar' }}</div>
                        <div class="product-name"><a href="{{ route('shop.detail', $fp->slug) }}">{{ $fp->title }}</a></div>
                        <div class="product-meta">
                            <div class="product-price"><span class="currency">KES </span>{{ number_format($fp->price) }}</div>
                            <div class="product-rating">★ {{ $fp->rating }} ({{ $fp->reviews }})</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="text-align:center;margin-top:40px;" data-aos="fade-up">
            <a href="{{ route('shop.index') }}" class="btn-primary" style="display:inline-flex;">
                View All Products
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:16px;height:16px"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
(function() {
    /* ---- HERO CAROUSEL CONTROLLER ---- */
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    const progressBar = document.getElementById('heroProgressBar');
    const SLIDE_DURATION = 6000;
    let slideTimer = null;
    let progressTimer = null;
    let progressStartTime = 0;

    function startProgressBar() {
        if (!progressBar) return;
        progressBar.style.transition = 'none';
        progressBar.style.width = '0%';
        progressStartTime = Date.now();

        clearInterval(progressTimer);
        progressTimer = setInterval(function() {
            const elapsed = Date.now() - progressStartTime;
            const pct = Math.min(100, (elapsed / SLIDE_DURATION) * 100);
            progressBar.style.transition = 'width 0.1s linear';
            progressBar.style.width = pct + '%';
            if (pct >= 100) {
                clearInterval(progressTimer);
            }
        }, 100);
    }

    window.goToSlide = function(index) {
        if (index < 0) index = slides.length - 1;
        if (index >= slides.length) index = 0;
        currentSlide = index;

        slides.forEach(function(slide, idx) {
            if (idx === currentSlide) {
                slide.classList.add('active');
            } else {
                slide.classList.remove('active');
            }
        });

        dots.forEach(function(dot, idx) {
            if (idx === currentSlide) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });

        resetAutoPlay();
    };

    window.nextSlide = function() { goToSlide(currentSlide + 1); };
    window.prevSlide = function() { goToSlide(currentSlide - 1); };

    function resetAutoPlay() {
        clearInterval(slideTimer);
        startProgressBar();
        slideTimer = setInterval(function() { nextSlide(); }, SLIDE_DURATION);
    }

    if (slides.length > 0) {
        resetAutoPlay();
    }

    /* ---- QUICK ESTIMATOR CONTROL ---- */
    const estimatorData = {
        home: {
            system: '5kW Hybrid System',
            battery: '5.12kWh Lithium',
            savings: '85% - KES 15,000/mo',
            payback: '18 - 24 Months',
            waMsg: "Hello BillsOnSolar! I'd like a quote for a 5kW Residential Solar System."
        },
        business: {
            system: '15kW - 50kW Commercial',
            battery: '14.3kWh High-Voltage',
            savings: '80% - KES 65,000/mo',
            payback: '2.5 Years',
            waMsg: "Hello BillsOnSolar! I'd like a quote for a Commercial Business Solar System."
        },
        farm: {
            system: '100% Off-Grid Solar + Pump',
            battery: '10kWh Lithium Pack',
            savings: 'Zero KPLC Dependency',
            payback: 'Immediate Independence',
            waMsg: "Hello BillsOnSolar! I'd like a quote for an Off-Grid Farm Solar & Pumping System."
        }
    };

    window.setEstimator = function(type, btn) {
        document.querySelectorAll('.estimator-opt-btn').forEach(function(b) { b.classList.remove('active'); });
        btn.classList.add('active');
        const data = estimatorData[type] || estimatorData.home;

        document.getElementById('estSystem').textContent = data.system;
        document.getElementById('estBattery').textContent = data.battery;
        document.getElementById('estSavings').textContent = data.savings;
        document.getElementById('estPayback').textContent = data.payback;

        const waBtn = document.getElementById('estWaBtn');
        if (waBtn) {
            waBtn.href = "https://wa.me/254795857846?text=" + encodeURIComponent(data.waMsg);
        }
    };
})();
</script>
@endpush
