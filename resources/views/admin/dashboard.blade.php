@extends('layouts.admin')

@section('title', 'Admin Dashboard Overview — Bills On Solar')

@section('content')
<div style="margin-bottom: 28px;">
    <h1 style="font-size: 24px; font-weight: 900; color: #0F172A; margin-bottom: 4px;">Dashboard Overview</h1>
    <p style="font-size: 14px; color: #64748B;">Overview of solar products, inventory status, categories, and quick management shortcuts.</p>
</div>

<!-- Metrics Cards -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 32px;">
    <div class="admin-card">
        <div style="font-size: 12px; font-weight: 700; color: #64748B; text-transform: uppercase; margin-bottom: 8px;">Total Products</div>
        <div style="font-size: 28px; font-weight: 900; color: #051C12;">{{ $totalProducts }}</div>
        <div style="font-size: 12px; color: #10B981; font-weight: 600; margin-top: 4px;">Active Solar Equipment</div>
    </div>

    <div class="admin-card">
        <div style="font-size: 12px; font-weight: 700; color: #64748B; text-transform: uppercase; margin-bottom: 8px;">Categories</div>
        <div style="font-size: 28px; font-weight: 900; color: #051C12;">{{ $totalCategories }}</div>
        <div style="font-size: 12px; color: #64748B; font-weight: 600; margin-top: 4px;">Panels, Batteries, Inverters...</div>
    </div>

    <div class="admin-card">
        <div style="font-size: 12px; font-weight: 700; color: #64748B; text-transform: uppercase; margin-bottom: 8px;">Manufacturers / Brands</div>
        <div style="font-size: 28px; font-weight: 900; color: #051C12;">{{ $totalBrands }}</div>
        <div style="font-size: 12px; color: #64748B; font-weight: 600; margin-top: 4px;">Deye, Victron, BYD, Growatt</div>
    </div>

    <div class="admin-card">
        <div style="font-size: 12px; font-weight: 700; color: #64748B; text-transform: uppercase; margin-bottom: 8px;">Solar Solutions</div>
        <div style="font-size: 28px; font-weight: 900; color: var(--color-gold-dark);">{{ $totalSolutions }}</div>
        <div style="font-size: 12px; color: #64748B; font-weight: 600; margin-top: 4px;">Turnkey Packages</div>
    </div>
</div>

<!-- Recent Products Table -->
<div class="admin-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="font-size: 16px; font-weight: 800; color: #0F172A;">Recent Solar Additions</h2>
        <a href="{{ route('admin.products.index') }}" style="font-size: 13px; font-weight: 700; color: var(--color-gold-dark); text-decoration: none;">View All Products →</a>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Product Title</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price (KES)</th>
                <th>Rating</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentProducts as $product)
                <tr>
                    <td style="font-weight: 700;">{{ $product->title }}</td>
                    <td><span style="background: #F1F5F9; padding: 4px 10px; border-radius: 50px; font-size: 11px; font-weight: 700;">{{ $product->category ? $product->category->name : 'General' }}</span></td>
                    <td>{{ $product->brand ? $product->brand->name : 'Bills On Solar' }}</td>
                    <td style="font-weight: 800; color: #051C12;">KES {{ number_format($product->price) }}</td>
                    <td>★ {{ $product->rating }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" style="color: #2563EB; font-weight: 700; text-decoration: none;">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #64748B; padding: 24px;">No products in database yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
