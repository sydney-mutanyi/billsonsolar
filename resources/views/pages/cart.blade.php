@extends('layouts.app')

@section('title', 'Cart & Solar System Quote Builder — Bills On Solar Kenya')

@section('content')
<section class="section section-cream">
    <div class="container">
        <h1 style="font-size: clamp(2rem, 3.5vw, 2.8rem); font-weight: 900; color: var(--color-charcoal); margin-bottom: 8px;">
            System Cart & <span style="color:var(--color-gold);">Quote Summary</span>
        </h1>
        <p style="font-size: 15px; color: var(--color-text-muted); margin-bottom: 32px;">
            Review your selected solar equipment. Send your order directly to our sales team via WhatsApp for instant invoicing & delivery.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 380px; gap: 32px; align-items: start;">
            
            <!-- Items List -->
            <div style="background: white; border-radius: 20px; padding: 28px; border: 1px solid var(--color-border); box-shadow: var(--shadow-card);">
                <h2 style="font-size: 18px; font-weight: 800; color: var(--color-charcoal); margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--color-border);">
                    Selected Equipment ({{ count($items) }} Items)
                </h2>

                <div style="display: grid; gap: 20px;">
                    @php $subtotal = 0; @endphp
                    @foreach($items as $item)
                        @php $lineTotal = $item['price'] * $item['qty']; $subtotal += $lineTotal; @endphp
                        <div style="display: flex; gap: 16px; align-items: center; padding-bottom: 16px; border-bottom: 1px solid rgba(0,0,0,0.06);">
                            <div style="width: 80px; height: 80px; background: var(--color-cream); border-radius: 12px; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" style="max-height: 100%;">
                            </div>

                            <div style="flex: 1;">
                                <div style="font-size: 11px; font-weight: 700; color: var(--color-text-muted);">{{ $item['brand'] }}</div>
                                <h3 style="font-size: 14.5px; font-weight: 700; color: var(--color-charcoal); margin-bottom: 4px;">{{ $item['title'] }}</h3>
                                <div style="font-size: 13px; color: var(--color-text-muted);">Qty: {{ $item['qty'] }} × KES {{ number_format($item['price']) }}</div>
                            </div>

                            <div style="font-size: 16px; font-weight: 800; color: var(--color-charcoal);">
                                KES {{ number_format($lineTotal) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Summary Box -->
            <div style="background: var(--color-charcoal); border-radius: 20px; padding: 28px; color: white; box-shadow: var(--shadow-hover);">
                <h2 style="font-size: 18px; font-weight: 800; color: white; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid rgba(255,255,255,0.12);">
                    Quote Breakdown
                </h2>

                <div style="display: grid; gap: 12px; margin-bottom: 24px;">
                    <div style="display: flex; justify-content: space-between; font-size: 14px; color: rgba(255,255,255,0.7);">
                        <span>Equipment Subtotal:</span>
                        <span style="color: white; font-weight: 700;">KES {{ number_format($subtotal) }}</span>
                    </div>

                    <div style="display: flex; justify-content: space-between; font-size: 14px; color: rgba(255,255,255,0.7);">
                        <span>Professional Installation:</span>
                        <span style="color: var(--color-gold); font-weight: 700;">Included (Optional)</span>
                    </div>

                    <div style="display: flex; justify-content: space-between; font-size: 14px; color: rgba(255,255,255,0.7);">
                        <span>Nationwide Delivery:</span>
                        <span style="color: #10B981; font-weight: 700;">Available</span>
                    </div>

                    <div style="display: flex; justify-content: space-between; font-size: 1.3rem; font-weight: 900; color: white; padding-top: 14px; border-top: 1px dashed rgba(255,255,255,0.15);">
                        <span>Est. Total:</span>
                        <span style="color: var(--color-gold);">KES {{ number_format($subtotal) }}</span>
                    </div>
                </div>

                <a href="https://wa.me/254795857846?text=Hello%20BillsOnSolar!%20I'd%20like%20to%20place%20an%20order%20for%20my%20cart%20totaling%20KES%20{{ number_format($subtotal) }}" class="btn-whatsapp-large" style="width:100%; justify-content:center; padding: 14px; font-size: 13.5px;" target="_blank">
                    <svg viewBox="0 0 24 24" fill="currentColor" style="width:20px;height:20px"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Send Order on WhatsApp →
                </a>
            </div>

        </div>
    </div>
</section>
@endsection
