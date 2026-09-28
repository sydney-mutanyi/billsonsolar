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

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: start;">
            
            <!-- Left Image Showcase -->
            <div style="background: var(--color-cream); border-radius: 24px; padding: 40px; text-align: center; position: relative;">
                @if($product->badge)
                    <span class="product-badge" style="position: absolute; top: 20px; left: 20px;">{{ $product->badge }}</span>
                @endif
                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" style="max-height: 420px; margin: 0 auto; filter: drop-shadow(0 15px 30px rgba(0,0,0,0.1));">
                
                <div style="display: flex; justify-content: center; gap: 12px; margin-top: 24px;">
                    <div style="padding: 10px 16px; background: white; border-radius: 50px; font-size: 12px; font-weight: 700; color: var(--color-charcoal); border: 1px solid var(--color-border);">
                        ✓ 10-Year Warranty
                    </div>
                    <div style="padding: 10px 16px; background: white; border-radius: 50px; font-size: 12px; font-weight: 700; color: var(--color-charcoal); border: 1px solid var(--color-border);">
                        ⚡ EPRA Approved
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

                <p style="font-size: 15px; color: var(--color-text-muted); line-height: 1.6; margin-bottom: 32px;">
                    Engineered for high-duty Kenyan solar conditions. Built with Grade A components, superior thermal stability, and maximum energy output. Includes full manufacturer warranty and technical support.
                </p>

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
@endsection
