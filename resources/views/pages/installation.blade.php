@extends('layouts.app')

@section('title', 'Solar Installation Services & EPRA Audits — Bills On Solar Kenya')

@section('content')
<section style="background: var(--color-charcoal); padding: 70px 24px; color: white; text-align: center; position: relative;">
    <div class="container">
        <span class="eyebrow" style="color:var(--color-gold);">Turnkey Engineering</span>
        <h1 style="font-size: clamp(2.2rem, 4vw, 3.4rem); font-weight: 900; letter-spacing: -0.03em; margin-bottom: 14px;">
            Professional <span style="color:var(--color-gold);">Solar Installation</span>
        </h1>
        <p style="font-size: 16px; color: rgba(255,255,255,0.75); max-width: 620px; margin: 0 auto;">
            Our EPRA-certified engineers handle everything — from initial site load audit to mounting, electrical wiring, grid connection, and commissioning.
        </p>
    </div>
</section>

<!-- 4-Step Process -->
<section class="section section-white">
    <div class="container">
        <div class="section-header">
            <span class="eyebrow">How It Works</span>
            <h2 class="section-title">Our 4-Step <span class="highlight">Installation Workflow</span></h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px;">
            <div style="background: var(--color-cream); padding: 32px 24px; border-radius: 20px; border: 1px solid var(--color-border); text-align: center;">
                <div style="width: 50px; height: 50px; background: var(--color-charcoal); color: var(--color-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 900; margin: 0 auto 16px;">1</div>
                <h3 style="font-size: 16px; font-weight: 800; color: var(--color-charcoal); margin-bottom: 8px;">Energy Site Audit</h3>
                <p style="font-size: 13.5px; color: var(--color-text-muted); line-height: 1.5;">We assess your roof orientation, energy bill history, and peak loads to calculate exact system sizing.</p>
            </div>

            <div style="background: var(--color-cream); padding: 32px 24px; border-radius: 20px; border: 1px solid var(--color-border); text-align: center;">
                <div style="width: 50px; height: 50px; background: var(--color-charcoal); color: var(--color-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 900; margin: 0 auto 16px;">2</div>
                <h3 style="font-size: 16px; font-weight: 800; color: var(--color-charcoal); margin-bottom: 8px;">Custom Engineering</h3>
                <p style="font-size: 13.5px; color: var(--color-text-muted); line-height: 1.5;">Design single-line diagrams, select compatible hybrid inverters & lithium storage, and obtain EPRA permits.</p>
            </div>

            <div style="background: var(--color-cream); padding: 32px 24px; border-radius: 20px; border: 1px solid var(--color-border); text-align: center;">
                <div style="width: 50px; height: 50px; background: var(--color-charcoal); color: var(--color-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 900; margin: 0 auto 16px;">3</div>
                <h3 style="font-size: 16px; font-weight: 800; color: var(--color-charcoal); margin-bottom: 8px;">On-Site Installation</h3>
                <p style="font-size: 13.5px; color: var(--color-text-muted); line-height: 1.5;">Fast, clean installation by certified technicians. Heavy-duty aluminum rails, DB surge protection & cabling.</p>
            </div>

            <div style="background: var(--color-cream); padding: 32px 24px; border-radius: 20px; border: 1px solid var(--color-border); text-align: center;">
                <div style="width: 50px; height: 50px; background: var(--color-charcoal); color: var(--color-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 900; margin: 0 auto 16px;">4</div>
                <h3 style="font-size: 16px; font-weight: 800; color: var(--color-charcoal); margin-bottom: 8px;">Testing & Warranty</h3>
                <p style="font-size: 13.5px; color: var(--color-text-muted); line-height: 1.5;">Commissioning, mobile Wi-Fi app monitoring setup, and handover of your 10-year warranty documentation.</p>
            </div>
        </div>
    </div>
</section>

<!-- Book Audit Form -->
<section class="section section-cream">
    <div class="container" style="max-width: 800px;">
        <div style="background: white; border-radius: 24px; padding: 40px; border: 1px solid var(--color-border); box-shadow: var(--shadow-card);">
            <div style="text-align: center; margin-bottom: 32px;">
                <span class="eyebrow">Free Site Audit</span>
                <h2 style="font-size: 1.8rem; font-weight: 900; color: var(--color-charcoal);">Book a Solar Installation Site Audit</h2>
                <p style="font-size: 14.5px; color: var(--color-text-muted);">Fill in your details below and our technical team will reach out within 15 minutes.</p>
            </div>

            <form style="display: grid; gap: 16px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: var(--color-charcoal); margin-bottom: 6px;">Full Name *</label>
                        <input type="text" placeholder="e.g. David Kamau" style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--color-border); outline: none; font-size: 14px;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: var(--color-charcoal); margin-bottom: 6px;">Phone / WhatsApp *</label>
                        <input type="tel" placeholder="+254 7..." style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--color-border); outline: none; font-size: 14px;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: var(--color-charcoal); margin-bottom: 6px;">Location / County *</label>
                        <input type="text" placeholder="e.g. Karen, Nairobi / Nakuru" style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--color-border); outline: none; font-size: 14px;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: var(--color-charcoal); margin-bottom: 6px;">Property Type *</label>
                        <select style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--color-border); outline: none; font-size: 14px; background: white;">
                            <option>Residential Home / Villa</option>
                            <option>Commercial Office / Factory</option>
                            <option>Agricultural Farm / Pump</option>
                            <option>School or Institution</option>
                        </select>
                    </div>
                </div>

                <button type="button" onclick="alert('Thank you! Our engineering team will call you shortly to confirm your audit.')" class="btn-primary" style="justify-content: center; font-size: 14px; padding: 14px; margin-top: 8px;">
                    Submit Audit Request →
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
