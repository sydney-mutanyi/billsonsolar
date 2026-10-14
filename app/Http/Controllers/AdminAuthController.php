<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLogin()
    {
        if (session('admin_authenticated')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    /**
     * Handle the admin login form submission.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Hard-coded admin credentials (or read from .env)
        $adminEmail    = config('admin.email',    env('ADMIN_EMAIL',    'admin@billsonsolar.africa'));
        $adminPassword = config('admin.password', env('ADMIN_PASSWORD', 'admin1234'));

        if ($request->email === $adminEmail && $request->password === $adminPassword) {
            $request->session()->put('admin_authenticated', true);
            $request->session()->put('admin_email', $adminEmail);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Welcome back!');
        }

        return back()
            ->withInput(['email' => $request->email])
            ->withErrors(['email' => 'Invalid credentials. Please try again.']);
    }

    /**
     * Log the admin out.
     */
    public function logout(Request $request)
    {
        $request->session()->forget(['admin_authenticated', 'admin_email']);

        return redirect()->route('admin.login')
            ->with('success', 'You have been logged out.');
    }
}
