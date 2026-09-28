@extends('layouts.app')

@section('title', 'Cart & Solar System Quote Builder — Bills On Solar Kenya')

@section('content')
<section class="section section-cream" style="min-height: 75vh;">
    <div class="container">
        <!-- Page Header -->
        <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 16px; margin-bottom: 32px;">
            <div>
                <span class="eyebrow">Your Selection</span>
                <h1 style="font-size: clamp(2rem, 3.5vw, 2.8rem); font-weight: 900; color: var(--color-charcoal); margin-bottom: 6px; letter-spacing: -0.02em;">
                    System Cart & <span style="color:var(--color-gold);">Quote Summary</span>
                </h1>
                <p style="font-size: 15px; color: var(--color-text-muted); margin: 0;">
                    Review your equipment list. Send directly to our engineers on WhatsApp for instant invoicing, warranty registration & delivery.
                </p>
            </div>
            
            @if(count($items) > 0)
                <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Are you sure you want to clear your cart?');">
                    @csrf
                    <button type="submit" style="background: none; border: 1px solid #EF4444; color: #EF4444; padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s;">
                        <svg viewBox="0 0 20 20" fill="currentColor" style="width:16px;height:16px;"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        Clear Cart
                    </button>
                </form>
            @endif
        </div>

        @if(count($items) > 0)
            <div style="display: grid; grid-template-columns: 1fr 390px; gap: 32px; align-items: start;">
                
                <!-- Items List Container -->
                <div style="background: white; border-radius: 20px; padding: 28px; border: 1px solid var(--color-border); box-shadow: var(--shadow-card);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 14px; border-bottom: 1px solid var(--color-border);">
                        <h2 style="font-size: 18px; font-weight: 800; color: var(--color-charcoal); margin: 0;">
                            Selected Equipment ({{ count($items) }} {{ Str::plural('Product', count($items)) }})
                        </h2>
                        <a href="{{ route('shop.index') }}" style="font-size: 13.5px; font-weight: 700; color: var(--color-solar-blue);">+ Add More Products</a>
                    </div>

                    <div style="display: grid; gap: 24px;">
                        @foreach($items as $item)
                            @php $lineTotal = $item['price'] * $item['qty']; @endphp
                            <div style="display: grid; grid-template-columns: 90px 1fr auto; gap: 20px; align-items: center; padding-bottom: 20px; border-bottom: 1px solid rgba(0,0,0,0.06);">
                                
                                <!-- Product Image -->
                                <div style="width: 90px; height: 90px; background: var(--color-cream); border-radius: 14px; padding: 10px; display: flex; align-items: center; justify-content: center; border: 1px solid var(--color-border);">
                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                </div>

                                <!-- Product Details & Quantity Control -->
                                <div>
                                    <div style="font-size: 11.5px; font-weight: 700; color: var(--color-gold); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 2px;">
                                        {{ $item['brand'] }}
                                    </div>
                                    <h3 style="font-size: 15.5px; font-weight: 700; color: var(--color-charcoal); margin-bottom: 6px; line-height: 1.3;">
                                        <a href="{{ route('shop.detail', $item['slug']) }}" style="color: inherit; text-decoration: none;">
                                            {{ $item['title'] }}
                                        </a>
                                    </h3>
                                    <div style="font-size: 13.5px; font-weight: 600; color: var(--color-text-muted); margin-bottom: 12px;">
                                        KES {{ number_format($item['price']) }} <span style="font-size: 12px; font-weight: normal;">/ unit</span>
                                    </div>

                                    <!-- Quantity Update Form -->
                                    <form action="{{ route('cart.update') }}" method="POST" style="display: inline-flex; align-items: center; gap: 8px;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                        <div style="display: inline-flex; align-items: center; background: var(--color-cream); border-radius: 8px; border: 1px solid var(--color-border); overflow: hidden;">
                                            <button type="button" onclick="decrementQty(this)" style="background: none; border: none; padding: 6px 10px; font-size: 15px; font-weight: bold; cursor: pointer; color: var(--color-charcoal);">-</button>
                                            <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" max="999" onchange="this.form.submit()" style="width: 44px; text-align: center; border: none; background: transparent; font-weight: 700; font-size: 13.5px; color: var(--color-charcoal); -moz-appearance: textfield;">
                                            <button type="button" onclick="incrementQty(this)" style="background: none; border: none; padding: 6px 10px; font-size: 15px; font-weight: bold; cursor: pointer; color: var(--color-charcoal);">+</button>
                                        </div>
                                        <button type="submit" style="background: none; border: none; color: var(--color-solar-blue); font-size: 12px; font-weight: 600; cursor: pointer; padding: 4px;">Update</button>
                                    </form>
                                </div>

                                <!-- Line Total & Remove -->
                                <div style="text-align: right; display: flex; flex-direction: column; justify-content: space-between; height: 100%; min-height: 80px;">
                                    <div style="font-size: 17px; font-weight: 800; color: var(--color-charcoal);">
                                        KES {{ number_format($lineTotal) }}
                                    </div>

                                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: none; border: none; color: #EF4444; font-size: 12.5px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 4px;" title="Remove from cart">
                                            <svg viewBox="0 0 20 20" fill="currentColor" style="width:14px;height:14px;"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            Remove
                                        </button>
                                    </form>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <!-- Bottom Nav -->
                    <div style="margin-top: 24px; padding-top: 16px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
                        <a href="{{ route('shop.index') }}" class="btn-ghost" style="color:var(--color-charcoal); border-color:var(--color-border); font-size:13.5px; padding: 10px 18px;">
                            ← Continue Shopping
                        </a>
                        <div style="font-size: 13px; color: var(--color-text-muted);">
                            ⚡ All equipment comes with standard manufacturer warranty.
                        </div>
                    </div>
                </div>

                <!-- Quote Summary Sidebar -->
                <div style="background: var(--color-charcoal); border-radius: 20px; padding: 28px; color: white; box-shadow: var(--shadow-hover); position: sticky; top: 100px;">
                    <h2 style="font-size: 18px; font-weight: 800; color: white; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid rgba(255,255,255,0.12);">
                        Official Quote Summary
                    </h2>

                    <div style="display: grid; gap: 14px; margin-bottom: 24px;">
                        <div style="display: flex; justify-content: space-between; font-size: 14px; color: rgba(255,255,255,0.7);">
                            <span>Total Units:</span>
                            <span style="color: white; font-weight: 700;">{{ array_sum(array_column($items, 'qty')) }} units</span>
                        </div>

                        <div style="display: flex; justify-content: space-between; font-size: 14px; color: rgba(255,255,255,0.7);">
                            <span>Equipment Subtotal:</span>
                            <span style="color: white; font-weight: 800; font-size: 15px;">KES {{ number_format($subtotal) }}</span>
                        </div>

                        <div style="display: flex; justify-content: space-between; font-size: 14px; color: rgba(255,255,255,0.7);">
                            <span>Engineering & Setup:</span>
                            <span style="color: var(--color-gold); font-weight: 700;">Available on Request</span>
                        </div>

                        <div style="display: flex; justify-content: space-between; font-size: 14px; color: rgba(255,255,255,0.7);">
                            <span>Delivery Across Kenya:</span>
                            <span style="color: #10B981; font-weight: 700;">Same Day / Next Day</span>
                        </div>

                        <div style="display: flex; justify-content: space-between; font-size: 1.35rem; font-weight: 900; color: white; padding-top: 16px; border-top: 1px dashed rgba(255,255,255,0.18);">
                            <span>Est. Total:</span>
                            <span style="color: var(--color-gold);">KES {{ number_format($subtotal) }}</span>
                        </div>
                    </div>

                    <!-- Direct WhatsApp Order CTA -->
                    <a href="{{ $whatsappUrl }}" class="btn-whatsapp-large" style="width:100%; justify-content:center; padding: 14px 20px; font-size: 14px; font-weight: 700; margin-bottom: 12px;" target="_blank">
                        <svg viewBox="0 0 24 24" fill="currentColor" style="width:20px;height:20px"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Send Quote Order on WhatsApp →
                    </a>

                    <div style="font-size: 12px; text-align: center; color: rgba(255,255,255,0.6); line-height: 1.4;">
                        ✓ Instant response from certified solar specialists<br>
                        ✓ Proforma invoice issued directly
                    </div>
                </div>

            </div>
        @else
            <!-- Empty Cart State -->
            <div style="background: white; border-radius: 24px; padding: 64px 32px; text-align: center; border: 1px solid var(--color-border); box-shadow: var(--shadow-card); max-width: 620px; margin: 0 auto;">
                <div style="width: 84px; height: 84px; background: var(--color-cream); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; color: var(--color-gold);">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:42px;height:42px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <h2 style="font-size: 22px; font-weight: 800; color: var(--color-charcoal); margin-bottom: 10px;">
                    Your System Cart is Empty
                </h2>
                <p style="font-size: 15px; color: var(--color-text-muted); line-height: 1.6; margin-bottom: 28px; max-width: 440px; margin-left: auto; margin-right: auto;">
                    You have not added any solar equipment or components to your quote builder yet. Explore our high-efficiency solar panels, hybrid inverters, and lithium storage batteries.
                </p>
                <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('shop.index') }}" class="btn-primary" style="padding: 12px 28px; font-size: 14.5px;">
                        Browse Solar Equipment
                    </a>
                    <a href="{{ route('solutions') }}" class="btn-ghost" style="padding: 12px 24px; font-size: 14.5px; color: var(--color-charcoal);">
                        View Pre-Configured Packages
                    </a>
                </div>
            </div>
        @endif

    </div>
</section>

@push('scripts')
<script>
function incrementQty(btn) {
    const input = btn.parentNode.querySelector('input[type="number"]');
    input.value = parseInt(input.value || 1) + 1;
    input.form.submit();
}

function decrementQty(btn) {
    const input = btn.parentNode.querySelector('input[type="number"]');
    const val = parseInt(input.value || 1);
    if (val > 1) {
        input.value = val - 1;
        input.form.submit();
    }
}
</script>
@endpush
@endsection
