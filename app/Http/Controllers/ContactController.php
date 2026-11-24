<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactInquiry;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Handle the contact form submission.
     *
     * Anti-spam layers:
     *   1. Honeypot field — bots fill hidden fields; humans never see them.
     *   2. Time-to-fill check — bots submit in < 2 seconds; humans take ≥ 4.
     *   3. Rate limiting — applied via 'throttle:5,1' middleware on the route.
     */
    public function submit(Request $request)
    {
        // ── Layer 1: Honeypot ───────────────────────────────────────
        // If the hidden "company_website" field has any value, a bot filled it.
        // Return a fake success so the bot doesn't retry.
        if (!empty($request->input('company_website'))) {
            Log::info('Contact form honeypot triggered', ['ip' => $request->ip()]);
            return back()->with('success', 'Thank you! Our team will respond shortly.');
        }

        // ── Layer 2: Time-to-fill check ─────────────────────────────
        // Reject submissions that arrive faster than 4 seconds after page load.
        try {
            $formLoadedAt = decrypt($request->input('_form_token'));
            $secondsElapsed = time() - (int) $formLoadedAt;

            if ($secondsElapsed < 4) {
                Log::info('Contact form timing check failed', [
                    'ip' => $request->ip(),
                    'seconds' => $secondsElapsed,
                ]);
                return back()->with('success', 'Thank you! Our team will respond shortly.');
            }
        } catch (\Exception $e) {
            // If token is missing, tampered, or cannot be decrypted → suspicious.
            Log::warning('Contact form token invalid', ['ip' => $request->ip()]);
            return back()->with('success', 'Thank you! Our team will respond shortly.');
        }

        // ── Validation ──────────────────────────────────────────────
        $validated = $request->validate([
            'name'         => 'required|string|max:150',
            'contact_info' => 'required|string|max:200',
            'inquiry_type' => 'nullable|string|max:150',
            'message'      => 'required|string|max:3000',
        ]);

        // ── Persist to database ─────────────────────────────────────
        ContactInquiry::create([
            'name'         => $validated['name'],
            'contact_info' => $validated['contact_info'],
            'inquiry_type' => $validated['inquiry_type'] ?? null,
            'message'      => $validated['message'],
            'ip_address'   => $request->ip(),
            'user_agent'   => substr((string) $request->userAgent(), 0, 255),
        ]);

        return back()->with('success', 'Your inquiry has been received! Our solar team will get back to you within 24 hours.');
    }
}
