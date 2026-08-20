@extends('layouts.app')

@section('title', 'Shop Solar Panels, Batteries & Inverters — Bills On Solar Kenya')

@section('content')
<!-- =============================================
     PAGE HEADER
     ============================================= -->
<section style="background: var(--color-charcoal); padding: 60px 24px; color: white; text-align: center; position: relative; overflow: hidden;">
    <div style="position: absolute; inset:0; background: radial-gradient(circle at 50% 30%, rgba(245,166,35,0.15) 0%, transparent 60%);"></div>
    <div class="container" style="position: relative; z-index: 2;">
        <span class="eyebrow" style="color:var(--color-gold);">Verified Solar Store</span>
        <h1 style="font-size: clamp(2.2rem, 4vw, 3.2rem); font-weight: 900; letter-spacing: -0.03em; margin-bottom: 12px;">
            Shop Premium <span style="color:var(--color-gold);">Solar Products</span>
        </h1>
        <p style="font-size: 16px; color: rgba(255,255,255,0.7); max-width: 600px; margin: 0 auto 28px;">
            Tier-1 Monocrystalline panels, LiFePO4 Lithium batteries, hybrid inverters, MPPT controllers, and complete solar packages across Kenya.
        </p>

        <!-- Search Bar -->
        <form action="{{ route('shop.index') }}" method="GET" style="max-width: 540px; margin: 0 auto; display: flex; gap: 8px; background: rgba(255,255,255,0.1); padding: 6px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.2); backdrop-filter: blur(12px);">
            <input type="text" name="q" value="{{ $search }}" placeholder="Search solar panels, lithium batteries, Deye inverters..." style="flex:1; background:none; border:none; padding: 10px 20px; color: white; outline:none; font-size:14px;">
            <button type="submit" class="btn-primary" style="padding: 10px 24px; font-size:12px;">
                Search
            </button>
        </form>
    </div>
</section>

<!-- =============================================
     PRODUCT CATALOG SECTION
     ============================================= -->
<section class="section section-cream">
    <div class="container">
        
        <!-- Category Filter Pills -->
        <div class="product-tabs" style="margin-bottom: 30px;">
            <a href="{{ route('shop.index', ['category' => 'all', 'brand' => $selectedBrand]) }}" class="product-tab {{ $selectedCategory === 'all' ? 'active' : '' }}">
                All Equipment
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('shop.index', ['category' => $cat->slug, 'brand' => $selectedBrand]) }}" class="product-tab {{ $selectedCategory === $cat->slug ? 'active' : '' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        <!-- Product Grid -->
        <div class="product-grid">
            @forelse($products as $product)
                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" loading="lazy">
                        @if($product->badge)
                            <span class="product-badge">{{ $product->badge }}</span>
                        @endif
                        <div class="product-actions-overlay">
                            <a href="https://wa.me/254795857846?text=I'm%20interested%20in%20the%20{{ urlencode($product->title) }}" class="btn-whatsapp-sm" target="_blank">
                                <svg viewBox="0 0 24 24" fill="currentColor" style="width:14px;height:14px"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                Quick Quote
                            </a>
                            <a href="{{ route('shop.detail', $product->slug) }}" class="btn-view-sm">View Details</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">{{ $product->brand ? $product->brand->name : 'Bills On Solar' }}</div>
                        <div class="product-name"><a href="{{ route('shop.detail', $product->slug) }}">{{ $product->title }}</a></div>
                        <div class="product-meta">
                            <div class="product-price"><span class="currency">KES </span>{{ number_format($product->price) }}</div>
                            <div class="product-rating">★ {{ $product->rating }} ({{ $product->reviews }})</div>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: white; border-radius: 20px;">
                    <p style="font-size: 18px; color: var(--color-text-muted);">No products found matching your search criteria.</p>
                    <a href="{{ route('shop.index') }}" class="btn-primary" style="margin-top: 16px; display: inline-flex;">View All Products</a>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
