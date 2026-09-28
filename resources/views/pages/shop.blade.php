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
                        <div class="product-actions-overlay" style="flex-direction: column; gap: 8px;">
                            <form action="{{ route('cart.add') }}" method="POST" style="width: 100%; margin: 0;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="qty" value="1">
                                <button type="submit" class="btn-primary" style="width: 100%; padding: 8px 12px; font-size: 12.5px; justify-content: center; border-radius: 8px; cursor: pointer;">
                                    + Add to Cart
                                </button>
                            </form>
                            <a href="{{ route('shop.detail', $product->slug) }}" class="btn-view-sm" style="width:100%; text-align:center; padding: 8px 12px; font-size: 12.5px;">View Details</a>
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
