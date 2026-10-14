<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login — Bills On Solar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #051C12 0%, #0a3622 60%, #1a5c3a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 1.25rem;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 24px 60px rgba(0,0,0,0.4);
        }

        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo span {
            display: inline-block;
            background: linear-gradient(135deg, #f0a500, #e8c547);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 1.6rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .logo p {
            color: rgba(255,255,255,0.5);
            font-size: 0.8rem;
            margin-top: 0.25rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        h1 {
            color: #fff;
            font-size: 1.2rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 1.75rem;
        }

        .alert {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            margin-bottom: 1.25rem;
        }

        .alert-error {
            background: rgba(220,38,38,0.15);
            border: 1px solid rgba(220,38,38,0.4);
            color: #fca5a5;
        }

        .alert-success {
            background: rgba(34,197,94,0.15);
            border: 1px solid rgba(34,197,94,0.4);
            color: #86efac;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            color: rgba(255,255,255,0.7);
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 0.4rem;
            letter-spacing: 0.03em;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 0.6rem;
            color: #fff;
            font-size: 0.95rem;
            font-family: inherit;
            padding: 0.65rem 0.9rem;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #f0a500;
            background: rgba(255,255,255,0.1);
        }

        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: rgba(255,255,255,0.3);
        }

        .field-error {
            color: #fca5a5;
            font-size: 0.78rem;
            margin-top: 0.35rem;
        }

        button[type="submit"] {
            width: 100%;
            background: linear-gradient(135deg, #f0a500, #e8c547);
            border: none;
            border-radius: 0.6rem;
            color: #051C12;
            cursor: pointer;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 700;
            padding: 0.75rem;
            margin-top: 0.5rem;
            transition: opacity 0.2s, transform 0.1s;
        }

        button[type="submit"]:hover { opacity: 0.9; transform: translateY(-1px); }
        button[type="submit"]:active { transform: translateY(0); }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">
            <span>☀ Bills On Solar</span>
            <p>Admin Panel</p>
        </div>

        <h1>Sign in to continue</h1>

        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="admin@billsonsolar.africa"
                    autocomplete="email"
                    required
                >
                @error('email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    autocomplete="current-password"
                    required
                >
                @error('password')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Sign In</button>
        </form>
    </div>
</body>
</html>
