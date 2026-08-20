@extends('layouts.app')

@section('title', 'Contact Us — Bills On Solar Kenya')

@section('content')
<section style="background: var(--color-charcoal); padding: 70px 24px; color: white; text-align: center; position: relative;">
    <div class="container">
        <span class="eyebrow" style="color:var(--color-gold);">We're Here to Help</span>
        <h1 style="font-size: clamp(2.2rem, 4vw, 3.4rem); font-weight: 900; letter-spacing: -0.03em; margin-bottom: 14px;">
            Get in Touch with Our <span style="color:var(--color-gold);">Solar Team</span>
        </h1>
        <p style="font-size: 16px; color: rgba(255,255,255,0.75); max-width: 600px; margin: 0 auto;">
            Have questions about system sizing, inverter compatibility, or nationwide installation? Speak directly with our engineering team in Nairobi.
        </p>
    </div>
</section>

<section class="section section-cream">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: start;">
            
            <!-- Direct Info -->
            <div style="display: grid; gap: 20px;">
                <div style="background: white; border-radius: 20px; padding: 28px; border: 1px solid var(--color-border); box-shadow: var(--shadow-card);">
                    <div style="display: flex; gap: 16px; align-items: start;">
                        <div style="width: 46px; height: 46px; background: var(--color-cream-dark); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--color-gold);">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:24px;height:24px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h3 style="font-size: 16px; font-weight: 800; color: var(--color-charcoal); margin-bottom: 4px;">Phone & Hotline</h3>
                            <p style="font-size: 14px; color: var(--color-text-muted);"><a href="tel:+254795857846" style="color:var(--color-charcoal); font-weight:700;">+254 795 857 846</a></p>
                            <p style="font-size: 12px; color: var(--color-text-muted);">Mon – Sat: 8:00 AM – 6:00 PM</p>
                        </div>
                    </div>
                </div>

                <div style="background: white; border-radius: 20px; padding: 28px; border: 1px solid var(--color-border); box-shadow: var(--shadow-card);">
                    <div style="display: flex; gap: 16px; align-items: start;">
                        <div style="width: 46px; height: 46px; background: #e8fef1; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #25D366;">
                            <svg viewBox="0 0 24 24" fill="currentColor" style="width:24px;height:24px;"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <div>
                            <h3 style="font-size: 16px; font-weight: 800; color: var(--color-charcoal); margin-bottom: 4px;">Instant WhatsApp Chat</h3>
                            <p style="font-size: 13.5px; color: var(--color-text-muted); margin-bottom: 8px;">Fastest response for quotes, product availability & installation questions.</p>
                            <a href="https://wa.me/254795857846?text=Hello%20Bills%20On%20Solar!" target="_blank" style="font-size: 13px; font-weight: 700; color: #25D366;">Start WhatsApp Chat →</a>
                        </div>
                    </div>
                </div>

                <div style="background: white; border-radius: 20px; padding: 28px; border: 1px solid var(--color-border); box-shadow: var(--shadow-card);">
                    <div style="display: flex; gap: 16px; align-items: start;">
                        <div style="width: 46px; height: 46px; background: var(--color-cream-dark); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--color-gold);">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:24px;height:24px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h3 style="font-size: 16px; font-weight: 800; color: var(--color-charcoal); margin-bottom: 4px;">Nairobi Showroom & Office</h3>
                            <p style="font-size: 13.5px; color: var(--color-text-muted);">KCB Industrial Area Plaza, Enterprise Road, Nairobi, Kenya</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div style="background: white; border-radius: 24px; padding: 36px; border: 1px solid var(--color-border); box-shadow: var(--shadow-card);">
                <h2 style="font-size: 20px; font-weight: 800; color: var(--color-charcoal); margin-bottom: 20px;">Send Us a Message</h2>
                
                <form style="display: grid; gap: 14px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: var(--color-charcoal); margin-bottom: 6px;">Your Name *</label>
                        <input type="text" placeholder="John Doe" style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--color-border); outline: none; font-size: 14px;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: var(--color-charcoal); margin-bottom: 6px;">Email / Phone *</label>
                        <input type="text" placeholder="john@example.com or +254 7..." style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--color-border); outline: none; font-size: 14px;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: var(--color-charcoal); margin-bottom: 6px;">Inquiry Type</label>
                        <select style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--color-border); outline: none; font-size: 14px; background: white;">
                            <option>Solar Panel / Equipment Purchase</option>
                            <option>Residential System Installation</option>
                            <option>Commercial Energy Audit</option>
                            <option>After-Sales Technical Support</option>
                        </select>
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: var(--color-charcoal); margin-bottom: 6px;">Message *</label>
                        <textarea rows="4" placeholder="How can we help you power your home or business?" style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--color-border); outline: none; font-size: 14px;"></textarea>
                    </div>

                    <button type="button" onclick="alert('Message sent! Our team will get back to you shortly.')" class="btn-primary" style="justify-content: center; font-size: 14px; padding: 14px;">
                        Send Inquiry →
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
