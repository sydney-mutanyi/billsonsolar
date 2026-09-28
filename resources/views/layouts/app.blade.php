<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bills On Solar — Premium solar panels, batteries, inverters, and complete solar installation services in Kenya. Shop online or get a free quote.">
    <title>@yield('title', 'Bills On Solar — Premium Solar Solutions in Kenya')</title>

    <!-- Preconnect for fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    @endif
    @stack('styles')
</head>

<body>

<!-- =============================================
     ANNOUNCEMENT STRIP
     ============================================= -->
<div class="announcement-strip" id="announcementStrip">
    <div class="strip-inner">
        <div class="strip-left">
            <a href="tel:+254702156134" class="strip-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                +254 702 156 134 / +254 724 484 209
            </a>
            <a href="mailto:info@billsonsolar.africa" class="strip-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                info@billsonsolar.africa
            </a>
            <a href="{{ route('contact') }}" class="strip-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                KCB Industrial Area Plaza, Nairobi
            </a>
        </div>
        <div class="strip-right">
            <span style="color:rgba(255,255,255,0.7); font-size:12px; font-weight:600;">🌟 Kenya's Premium Solar Store · Nationwide Delivery · EPRA Certified</span>
        </div>
    </div>
</div>

<!-- =============================================
     HEADER
     ============================================= -->
<header class="site-header" id="siteHeader">
    <div class="header-main" style="justify-content: space-between;">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo-wrap">
            <svg class="logo-icon" viewBox="0 0 36 36" fill="none">
                <circle cx="18" cy="18" r="18" fill="#051C12"/>
                <circle cx="18" cy="18" r="8" fill="#F5A623"/>
                <line x1="18" y1="2" x2="18" y2="7" stroke="#F5A623" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="18" y1="29" x2="18" y2="34" stroke="#F5A623" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="2" y1="18" x2="7" y2="18" stroke="#F5A623" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="29" y1="18" x2="34" y2="18" stroke="#F5A623" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="6.22" y1="6.22" x2="9.76" y2="9.76" stroke="#F5A623" stroke-width="2" stroke-linecap="round"/>
                <line x1="26.24" y1="26.24" x2="29.78" y2="29.78" stroke="#F5A623" stroke-width="2" stroke-linecap="round"/>
                <line x1="29.78" y1="6.22" x2="26.24" y2="9.76" stroke="#F5A623" stroke-width="2" stroke-linecap="round"/>
                <line x1="9.76" y1="26.24" x2="6.22" y2="29.78" stroke="#F5A623" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span class="logo-text">BILLS<span>ON</span>SOLAR</span>
        </a>

        <!-- Desktop Navigation Bar -->
        <nav class="nav-bar desktop-nav" aria-label="Main navigation" style="border:none; background:transparent;">
            <div class="nav-inner" style="padding:0; gap: 8px;">

                <!-- SHOP -->
                <div class="mega-menu-wrap">
                    <a href="{{ route('shop.index') }}" class="nav-link {{ request()->routeIs('shop*') ? 'active' : '' }}">
                        Shop
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="mega-menu" style="left:-100px;min-width:960px;">
                        <div class="mega-grid" style="grid-template-columns:repeat(5,1fr);">
                            <div class="mega-col">
                                <div class="mega-col-title">Solar Panels</div>
                                <ul>
                                    <li><a href="{{ route('shop.index', ['category' => 'panels']) }}">Monocrystalline</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'panels']) }}">Bifacial Panels</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'panels']) }}">Flexible Panels</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'panels']) }}">100W – 200W</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'panels']) }}">Above 400W</a></li>
                                </ul>
                            </div>
                            <div class="mega-col">
                                <div class="mega-col-title">Solar Batteries</div>
                                <ul>
                                    <li><a href="{{ route('shop.index', ['category' => 'batteries']) }}">Lithium (LiFePO4)</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'batteries']) }}">Gel Batteries</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'batteries']) }}">Tubular Batteries</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'batteries']) }}">High-Voltage Storage</a></li>
                                </ul>
                            </div>
                            <div class="mega-col">
                                <div class="mega-col-title">Solar Inverters</div>
                                <ul>
                                    <li><a href="{{ route('shop.index', ['category' => 'inverters']) }}">Hybrid Inverters</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'inverters']) }}">Off-Grid Inverters</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'inverters']) }}">Grid-Tie Inverters</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'inverters']) }}">3kW – 15kW+</a></li>
                                </ul>
                            </div>
                            <div class="mega-col">
                                <div class="mega-col-title">Controllers & Lights</div>
                                <ul>
                                    <li><a href="{{ route('shop.index', ['category' => 'controllers']) }}">MPPT Controllers</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'controllers']) }}">PWM Controllers</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'lights']) }}">Solar Flood Lights</a></li>
                                    <li><a href="{{ route('shop.index', ['category' => 'lights']) }}">Solar Street Lights</a></li>
                                </ul>
                            </div>
                            <div class="mega-col">
                                <div class="mega-col-title">Top Brands</div>
                                <ul>
                                    <li><a href="{{ route('shop.index', ['brand' => 'deye']) }}">Deye</a></li>
                                    <li><a href="{{ route('shop.index', ['brand' => 'growatt']) }}">Growatt</a></li>
                                    <li><a href="{{ route('shop.index', ['brand' => 'victron']) }}">Victron Energy</a></li>
                                    <li><a href="{{ route('shop.index', ['brand' => 'goodwe']) }}">GoodWe</a></li>
                                    <li><a href="{{ route('shop.index', ['brand' => 'byd']) }}">BYD Batteries</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mega-footer">
                            <a href="{{ route('shop.index') }}" class="mega-cta">Browse All Products</a>
                            <a href="{{ route('contact') }}" class="mega-cta">Get Custom System Quote</a>
                        </div>
                    </div>
                </div>

                <!-- SOLUTIONS -->
                <a href="{{ route('solutions') }}" class="nav-link {{ request()->routeIs('solutions') ? 'active' : '' }}">Solutions</a>
                <a href="{{ route('installation') }}" class="nav-link {{ request()->routeIs('installation') ? 'active' : '' }}">Installation</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            </div>
        </nav>

        <!-- Actions -->
        <div class="header-actions">
            <!-- Cart Button -->
            <a href="{{ route('cart') }}" class="header-icon-btn cart-inline" aria-label="Cart" style="flex-direction: row; gap: 6px; font-size: 13.5px; font-weight: 600; padding: 10px 14px; margin-right: 8px;">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <span>Cart</span>
                <span class="badge" id="cartCount" style="position:relative; top:auto; right:auto; margin-left: 2px;">{{ $cartCount ?? 0 }}</span>
            </a>
            <a href="https://wa.me/254702156134?text=Hello%20Bills%20On%20Solar!%20I'd%20like%20a%20custom%20quote." class="btn-quote" target="_blank">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:15px;height:15px"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Get a Quote
            </a>
            <!-- Hamburger -->
            <button class="hamburger-btn" id="hamburgerBtn" aria-label="Open menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<!-- =============================================
     FLOATING WHATSAPP GLASS WIDGET
     ============================================= -->
<a href="https://wa.me/254702156134?text=Hello%20Bills%20On%20Solar!%20I'd%20like%20to%20inquire%20about%20a%20solar%20solution." class="whatsapp-float" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
    <div class="whatsapp-float-icon">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        <span class="whatsapp-float-status"></span>
    </div>
    <div class="whatsapp-float-text">
        <span class="whatsapp-float-title">Chat on WhatsApp</span>
        <span class="whatsapp-float-sub">● Solar Engineers Online</span>
    </div>
</a>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobileOverlay"></div>

<!-- Mobile Menu Drawer -->
<div class="mobile-menu" id="mobileMenu" role="dialog" aria-modal="true" aria-label="Mobile navigation">
    <div class="mobile-menu-header">
        <span class="logo-text" style="font-size:16px;font-weight:900;">BILLS<span style="color:var(--color-gold)">ON</span>SOLAR</span>
        <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Close menu">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:16px;height:16px"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    <nav class="mobile-nav">
        <a href="{{ route('home') }}" class="mobile-nav-link">Home</a>
        <a href="{{ route('shop.index') }}" class="mobile-nav-link">Shop Products</a>
        <a href="{{ route('solutions') }}" class="mobile-nav-link">Solutions</a>
        <a href="{{ route('installation') }}" class="mobile-nav-link">Installation Services</a>
        <a href="{{ route('cart') }}" class="mobile-nav-link" style="display:flex; justify-content:space-between; align-items:center;">
            <span>Cart & System Quote</span>
            <span class="badge" style="position:static; margin:0;">{{ $cartCount ?? 0 }}</span>
        </a>
        <a href="{{ route('about') }}" class="mobile-nav-link">About Us</a>
        <a href="{{ route('contact') }}" class="mobile-nav-link">Contact Us</a>
    </nav>
    <div class="mobile-menu-footer">
        <a href="https://wa.me/254702156134" class="btn-whatsapp-large" style="width:100%;justify-content:center;font-size:14px;padding:14px 24px;" target="_blank">
            <svg viewBox="0 0 24 24" fill="currentColor" style="width:20px;height:20px"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Chat on WhatsApp
        </a>
    </div>
</div>

<!-- Global Flash Notifications -->
@if(session('success') || session('error'))
<div class="container" style="margin-top: 20px; margin-bottom: 4px;">
    @if(session('success'))
        <div style="background: #ECFDF5; border: 1px solid #10B981; color: #065F46; padding: 14px 20px; border-radius: 12px; font-size: 14.5px; font-weight: 600; display: flex; align-items: center; justify-content: space-between; box-shadow: var(--shadow-sm);">
            <div style="display: flex; align-items: center; gap: 10px;">
                <svg viewBox="0 0 20 20" fill="currentColor" style="width: 20px; height: 20px; color: #10B981;"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span>{{ session('success') }}</span>
            </div>
            <a href="{{ route('cart') }}" style="color: #065F46; text-decoration: underline; font-weight: 700;">View Cart & Quote →</a>
        </div>
    @endif
    @if(session('error'))
        <div style="background: #FEF2F2; border: 1px solid #EF4444; color: #991B1B; padding: 14px 20px; border-radius: 12px; font-size: 14.5px; font-weight: 600; display: flex; align-items: center; gap: 10px; box-shadow: var(--shadow-sm);">
            <svg viewBox="0 0 20 20" fill="currentColor" style="width: 20px; height: 20px; color: #EF4444;"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif
</div>
@endif

<!-- =============================================
     MAIN CONTENT
     ============================================= -->
<main>
    @yield('content')
</main>

<!-- =============================================
     FOOTER
     ============================================= -->
<footer class="footer">
    <div class="footer-grid">
        <div class="footer-brand">
            <div class="footer-logo">BILLS<span>ON</span>SOLAR</div>
            <p class="footer-desc">Kenya's premium solar energy platform. We supply, design, and install complete high-performance solar systems for homes, commercial enterprises, and agricultural projects.</p>
            <div class="footer-social">
                <a href="#" class="social-link" aria-label="Facebook">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a href="#" class="social-link" aria-label="Instagram">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                <a href="https://wa.me/254702156134" class="social-link" aria-label="WhatsApp" target="_blank">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </a>
            </div>
        </div>

        <div class="footer-col">
            <div class="footer-col-title">Navigation</div>
            <div class="footer-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('shop.index') }}">Shop Products</a>
                <a href="{{ route('solutions') }}">Solar Solutions</a>
                <a href="{{ route('installation') }}">Installation Services</a>
                <a href="{{ route('cart') }}">Cart & System Quote</a>
                <a href="{{ route('about') }}">About Us</a>
                <a href="{{ route('contact') }}">Contact Us</a>
            </div>
        </div>

        <div class="footer-col">
            <div class="footer-col-title">Categories</div>
            <div class="footer-links">
                <a href="{{ route('shop.index', ['category' => 'panels']) }}">Solar Panels</a>
                <a href="{{ route('shop.index', ['category' => 'batteries']) }}">Solar Batteries</a>
                <a href="{{ route('shop.index', ['category' => 'inverters']) }}">Solar Inverters</a>
                <a href="{{ route('shop.index', ['category' => 'controllers']) }}">Charge Controllers</a>
                <a href="{{ route('shop.index', ['category' => 'lights']) }}">Solar Lights</a>
            </div>
        </div>

        <div class="footer-col">
            <div class="footer-col-title">Contact Us</div>
            <div class="footer-contact-item">
                <div class="footer-contact-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <div class="footer-contact-text"><a href="tel:+254702156134">+254 702 156 134</a> &middot; <a href="tel:+254724484209">+254 724 484 209</a></div>
            </div>
            <div class="footer-contact-item">
                <div class="footer-contact-icon">
                    <svg viewBox="0 0 24 24" fill="currentColor" style="color:var(--color-gold)"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </div>
                <div class="footer-contact-text"><a href="https://wa.me/254702156134" target="_blank">WhatsApp: +254 702 156 134</a></div>
            </div>
            <div class="footer-contact-item">
                <div class="footer-contact-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div class="footer-contact-text"><a href="mailto:info@billsonsolar.africa">info@billsonsolar.africa</a></div>
            </div>
            <div class="footer-contact-item">
                <div class="footer-contact-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div class="footer-contact-text">KCB Industrial Area Plaza,<br>Nairobi, Kenya</div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-copy">© {{ date('Y') }} Bills On Solar. All rights reserved. Powering Kenya with clean energy.</div>
        <div class="footer-bottom-links">
            <a href="{{ route('contact') }}">Support</a>
            <a href="{{ route('solutions') }}">Solutions</a>
            <a href="{{ route('installation') }}">Services</a>
        </div>
    </div>
</footer>

<!-- =============================================
     SHARED JAVASCRIPT
     ============================================= -->
<script>
(function() {
    'use strict';

    /* ---- Sticky Header ---- */
    const header = document.getElementById('siteHeader');
    const strip  = document.getElementById('announcementStrip');

    if (header && strip) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 60) {
                header.classList.add('scrolled');
                strip.classList.add('hidden-strip');
            } else {
                header.classList.remove('scrolled');
                strip.classList.remove('hidden-strip');
            }
        }, { passive: true });
    }

    /* ---- Mobile Menu ---- */
    const hamburger  = document.getElementById('hamburgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const overlay    = document.getElementById('mobileOverlay');
    const closeBtn   = document.getElementById('mobileMenuClose');

    if (hamburger && mobileMenu && overlay && closeBtn) {
        function openMobileMenu() {
            mobileMenu.classList.add('open');
            overlay.classList.add('open');
            hamburger.classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeMobileMenu() {
            mobileMenu.classList.remove('open');
            overlay.classList.remove('open');
            hamburger.classList.remove('open');
            document.body.style.overflow = '';
        }

        hamburger.addEventListener('click', openMobileMenu);
        closeBtn.addEventListener('click', closeMobileMenu);
        overlay.addEventListener('click', closeMobileMenu);
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeMobileMenu();
        });
    }

    /* ---- Scroll Reveal (AOS) ---- */
    const aosEls = document.querySelectorAll('[data-aos]');
    if (aosEls.length > 0) {
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('aos-animate');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });

        aosEls.forEach(function(el) { observer.observe(el); });
    }
})();
</script>

@stack('scripts')
</body>
</html>
