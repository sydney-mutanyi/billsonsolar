@extends('layouts.app')

@section('title', 'About Us — Bills On Solar Kenya')

@section('content')
<section style="background: var(--color-charcoal); padding: 75px 24px; color: white; text-align: center; position: relative;">
    <div class="container">
        <span class="eyebrow" style="color:var(--color-gold);">Our Mission</span>
        <h1 style="font-size: clamp(2.2rem, 4vw, 3.5rem); font-weight: 900; letter-spacing: -0.03em; margin-bottom: 16px;">
            Powering Kenya with <span style="color:var(--color-gold);">Clean, Reliable Solar</span>
        </h1>
        <p style="font-size: 16.5px; color: rgba(255,255,255,0.75); max-width: 660px; margin: 0 auto;">
            We are Kenya's premier solar energy equipment supplier and engineering contractor. From Nairobi to Turkana, we build resilient solar energy infrastructure.
        </p>
    </div>
</section>

<section class="section section-white">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;">
            <div>
                <span class="eyebrow">Who We Are</span>
                <h2 style="font-size: 2rem; font-weight: 900; color: var(--color-charcoal); margin-bottom: 16px;">
                    More Than Equipment.<br>Your Long-Term <span style="color:var(--color-gold);">Solar Partner.</span>
                </h2>
                <p style="font-size: 15px; color: var(--color-text-muted); line-height: 1.65; margin-bottom: 16px;">
                    Bills On Solar was founded with a clear objective: to bring world-class, Tier-1 solar panels, lithium storage, and smart hybrid inverters to homes, businesses, and agricultural projects across Kenya.
                </p>
                <p style="font-size: 15px; color: var(--color-text-muted); line-height: 1.65; margin-bottom: 24px;">
                    Our team of EPRA-licensed electrical engineers and certified solar technicians ensure every installation adheres to national grid safety standards, providing clean 24/7 power without blackouts.
                </p>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div style="background: var(--color-cream); padding: 20px; border-radius: 16px; border: 1px solid var(--color-border);">
                        <div style="font-size: 2rem; font-weight: 900; color: var(--color-charcoal);">500+</div>
                        <div style="font-size: 13px; color: var(--color-text-muted); margin-top: 4px;">Completed Installations</div>
                    </div>
                    <div style="background: var(--color-cream); padding: 20px; border-radius: 16px; border: 1px solid var(--color-border);">
                        <div style="font-size: 2rem; font-weight: 900; color: var(--color-gold);">47</div>
                        <div style="font-size: 13px; color: var(--color-text-muted); margin-top: 4px;">Counties Covered in Kenya</div>
                    </div>
                </div>
            </div>

            <div style="background: var(--color-charcoal); border-radius: 24px; padding: 48px; color: white; position: relative; overflow: hidden; box-shadow: var(--shadow-hover);">
                <div style="position: absolute; inset:0; background: radial-gradient(ellipse at 80% 20%, rgba(245,166,35,0.2) 0%, transparent 60%);"></div>
                <div style="position: relative; z-index: 2;">
                    <div style="font-size: 3rem; margin-bottom: 16px;">☀️</div>
                    <h3 style="font-size: 1.6rem; font-weight: 900; color: white; margin-bottom: 12px;">Why Kenyan Homeowners & Enterprises Choose Us</h3>
                    <ul style="display: grid; gap: 14px; font-size: 14px; color: rgba(255,255,255,0.85);">
                        <li>✓ 100% Genuine Tier-1 Verified Equipment</li>
                        <li>✓ EPRA Certified Solar Design & Permits</li>
                        <li>✓ Up to 10-Year Manufacturer Warranties</li>
                        <li>✓ Free Nationwide After-Sales Technical Support</li>
                    </ul>

                    <a href="{{ route('contact') }}" class="btn-primary" style="margin-top: 28px; display: inline-flex;">
                        Talk to Our Engineering Team →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
