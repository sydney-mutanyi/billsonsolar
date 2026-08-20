<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard — Bills On Solar')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    @endif

    <style>
        .admin-layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 100vh;
            background: #F8FAFC;
        }
        .admin-sidebar {
            background: #051C12;
            color: white;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(255,255,255,0.08);
        }
        .admin-brand {
            font-size: 16px;
            font-weight: 900;
            letter-spacing: -0.02em;
            color: white;
            padding: 0 12px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .admin-nav {
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1;
        }
        .admin-nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 12px;
            color: rgba(255,255,255,0.7);
            font-size: 13.5px;
            font-weight: 600;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .admin-nav-item:hover, .admin-nav-item.active {
            background: rgba(245,166,35,0.18);
            color: var(--color-gold);
        }
        .admin-nav-item.active {
            background: var(--color-gold);
            color: #051C12;
            font-weight: 800;
        }
        .admin-main {
            display: flex;
            flex-direction: column;
        }
        .admin-topbar {
            background: white;
            height: 64px;
            padding: 0 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #E2E8F0;
        }
        .admin-content {
            padding: 32px;
            flex: 1;
        }
        .admin-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #E2E8F0;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
        }
        .admin-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #051C12;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s ease;
        }
        .admin-btn:hover { background: #0D3A27; color: white; }
        .admin-btn-gold {
            background: var(--color-gold);
            color: #051C12;
        }
        .admin-btn-gold:hover { background: var(--color-gold-dark); }
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13.5px;
        }
        .admin-table th {
            text-align: left;
            padding: 12px 16px;
            background: #F1F5F9;
            color: #475569;
            font-weight: 700;
            border-bottom: 1px solid #E2E8F0;
        }
        .admin-table td {
            padding: 14px 16px;
            border-bottom: 1px solid #F1F5F9;
            color: #1E293B;
        }
    </style>
</head>
<body>

<div class="admin-layout">
    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="admin-brand">
            <span style="color:var(--color-gold);">●</span> BILLS ON SOLAR <span style="font-size:10px; background:rgba(255,255,255,0.15); padding:2px 6px; border-radius:4px;">ADMIN</span>
        </div>

        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                📊 Dashboard
            </a>
            <a href="{{ route('admin.products.index') }}" class="admin-nav-item {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                📦 Products Catalog
            </a>
            <a href="{{ route('admin.categories.index') }}" class="admin-nav-item {{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                🏷️ Categories
            </a>
            <a href="{{ route('admin.brands.index') }}" class="admin-nav-item {{ request()->routeIs('admin.brands*') ? 'active' : '' }}">
                🏢 Brands / Manufacturers
            </a>
        </nav>

        <div style="padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.1); margin-top: auto;">
            <a href="{{ route('home') }}" target="_blank" style="color:rgba(255,255,255,0.6); font-size:12px; font-weight:600; text-decoration:none;">
                ↗ View Live Public Site
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="admin-main">
        <header class="admin-topbar">
            <div style="font-size: 14px; font-weight: 700; color: #334155;">
                Solar System Admin Console
            </div>

            <div style="display: flex; gap: 12px; align-items: center;">
                <a href="{{ route('admin.products.create') }}" class="admin-btn admin-btn-gold">
                    + Add New Product
                </a>
            </div>
        </header>

        <div class="admin-content">
            @if(session('success'))
                <div style="background: #ECFDF5; border: 1px solid #10B981; color: #065F46; padding: 14px 20px; border-radius: 12px; margin-bottom: 24px; font-size: 14px; font-weight: 600;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
