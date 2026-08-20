@extends('layouts.app')

@section('title', 'Solar Solutions for Home, Business & Agriculture — Bills On Solar Kenya')

@section('content')
<section style="background: var(--color-charcoal); padding: 70px 24px; color: white; text-align: center; position: relative; overflow: hidden;">
    <div style="position: absolute; inset:0; background: radial-gradient(ellipse at 70% 30%, rgba(245,166,35,0.18) 0%, transparent 60%);"></div>
    <div class="container" style="position: relative; z-index: 2;">
        <span class="eyebrow" style="color:var(--color-gold);">Turnkey Solar Engineering</span>
        <h1 style="font-size: clamp(2.2rem, 4vw, 3.5rem); font-weight: 900; letter-spacing: -0.03em; margin-bottom: 16px;">
            Solar Systems Built for <span style="color:var(--color-gold);">Every Need</span>
        </h1>
        <p style="font-size: 17px; color: rgba(255,255,255,0.75); max-width: 660px; margin: 0 auto;">
            From residential villa back-ups to commercial grid-ties and agricultural water pumps — we design, supply, and commission complete warrantied solar systems across Kenya.
        </p>
    </div>
</section>

<section class="section section-cream">
    <div class="container">
        <div style="display: grid; gap: 40px;">
            @foreach($solutions as $sol)
                <div style="background: white; border-radius: 24px; padding: 40px; border: 1px solid var(--color-border); display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 40px; align-items: center; box-shadow: var(--shadow-card);" data-aos="fade-up">
                    <div>
                        <span class="eyebrow" style="margin-bottom:8px;">{{ $sol->badge }}</span>
                        <h2 style="font-size: 1.8rem; font-weight: 900; color: var(--color-charcoal); margin-bottom: 8px;">
                            {{ $sol->title }}
                        </h2>
                        <p style="font-size: 15px; font-weight: 700; color: var(--color-gold-dark); margin-bottom: 16px;">
                            {{ $sol->tagline }}
                        </p>
                        <p style="font-size: 14.5px; color: var(--color-text-muted); line-height: 1.65; margin-bottom: 24px;">
                            {{ $sol->desc }}
                        </p>

                        @if($sol->features)
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 28px;">
                                @foreach($sol->features as $feat)
                                    <div style="display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 600; color: var(--color-charcoal);">
                                        <span style="color:#10B981; font-weight:900;">✓</span> {{ $feat }}
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <a href="https://wa.me/254795857846?text=Hello%20BillsOnSolar!%20I'm%20interested%20in%20the%20{{ urlencode($sol->title) }}" class="btn-primary" target="_blank">
                            Get Custom Quote for {{ $sol->badge }} →
                        </a>
                    </div>

                    <!-- Metric Box -->
                    <div style="background: var(--color-charcoal); border-radius: 20px; padding: 32px; color: white; box-shadow: inset 0 0 30px rgba(0,0,0,0.3);">
                        <div style="font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-gold); margin-bottom: 16px;">
                            System Highlights
                        </div>
                        
                        <div style="display: grid; gap: 16px;">
                            <div>
                                <div style="font-size: 11px; color: rgba(255,255,255,0.6);">Recommended Capacity</div>
                                <div style="font-size: 16px; font-weight: 800; color: white;">{{ $sol->capacity }}</div>
                            </div>
                            <div>
                                <div style="font-size: 11px; color: rgba(255,255,255,0.6);">Battery Storage</div>
                                <div style="font-size: 16px; font-weight: 800; color: white;">{{ $sol->battery }}</div>
                            </div>
                            <div>
                                <div style="font-size: 11px; color: rgba(255,255,255,0.6);">Estimated Monthly Savings</div>
                                <div style="font-size: 16px; font-weight: 800; color: var(--color-gold);">{{ $sol->savings }}</div>
                            </div>
                            <div style="padding-top: 14px; border-top: 1px dashed rgba(255,255,255,0.15);">
                                <div style="font-size: 11px; color: rgba(255,255,255,0.6);">Packages Starting From</div>
                                <div style="font-size: 1.8rem; font-weight: 900; color: white;">{{ $sol->price }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
