@extends('layouts.admin')

@section('title', 'Manage Solar Products — Admin')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 28px;">
    <div>
        <h1 style="font-size: 24px; font-weight: 900; color: #0F172A; margin-bottom: 4px;">Solar Products Catalog</h1>
        <p style="font-size: 14px; color: #64748B;">Manage panels, batteries, inverters, charge controllers, and accessories.</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="admin-btn admin-btn-gold">
        + Add New Product
    </a>
</div>

<!-- Search Bar -->
<form method="GET" action="{{ route('admin.products.index') }}" style="margin-bottom: 24px;">
    <div style="display: flex; gap: 10px; max-width: 480px;">
        <input type="text" name="q" value="{{ $search }}" placeholder="Search products by title..." style="flex:1; border: 1px solid #E2E8F0; border-radius: 10px; padding: 10px 16px; font-size: 13px; outline: none; font-family: inherit;">
        <button type="submit" class="admin-btn">Search</button>
        @if($search)
            <a href="{{ route('admin.products.index') }}" class="admin-btn" style="background: #F1F5F9; color: #475569;">Clear</a>
        @endif
    </div>
</form>

<div class="admin-card" style="padding: 0; overflow: hidden;">
    <table class="admin-table">
        <thead>
            <tr>
                <th style="width: 36px; padding-left: 24px;">#</th>
                <th>Product Title</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Rating</th>
                <th>Badge</th>
                <th>Featured</th>
                <th style="padding-right: 24px; text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td style="padding-left: 24px; color: #94A3B8; font-size: 12px;">{{ $product->id }}</td>
                    <td>
                        <div style="font-weight: 700; color: #0F172A; font-size: 13px; max-width: 260px; line-height: 1.4;">{{ $product->title }}</div>
                        <div style="font-size: 11px; color: #94A3B8; margin-top: 2px;">{{ $product->slug }}</div>
                    </td>
                    <td>
                        <span style="background: #EFF6FF; color: #1D4ED8; padding: 3px 10px; border-radius: 50px; font-size: 11px; font-weight: 700; white-space: nowrap;">
                            {{ $product->category ? $product->category->name : '—' }}
                        </span>
                    </td>
                    <td style="font-size: 13px; font-weight: 600; color: #334155; white-space: nowrap;">{{ $product->brand ? $product->brand->name : '—' }}</td>
                    <td style="font-weight: 800; color: #051C12; white-space: nowrap;">KES {{ number_format($product->price) }}</td>
                    <td style="font-size: 13px; color: #92400E;">★ {{ $product->rating }} ({{ $product->reviews }})</td>
                    <td>
                        @if($product->badge)
                            <span style="background: #FEF3C7; color: #92400E; padding: 3px 10px; border-radius: 50px; font-size: 11px; font-weight: 700;">{{ $product->badge }}</span>
                        @else
                            <span style="color: #CBD5E1;">—</span>
                        @endif
                    </td>
                    <td>
                        @if($product->is_featured)
                            <span style="color: #10B981; font-weight: 800; font-size: 12px;">✓ Yes</span>
                        @else
                            <span style="color: #CBD5E1; font-size: 12px;">No</span>
                        @endif
                    </td>
                    <td style="padding-right: 24px; text-align: right; white-space: nowrap;">
                        <div style="display: flex; gap: 8px; justify-content: flex-end;">
                            <a href="{{ route('admin.products.edit', $product->id) }}" style="background: #EFF6FF; color: #1D4ED8; padding: 6px 14px; border-radius: 8px; font-size: 12px; font-weight: 700; text-decoration: none;">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product from database?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #FEF2F2; color: #DC2626; padding: 6px 14px; border-radius: 8px; font-size: 12px; font-weight: 700; border: none; cursor: pointer;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center; padding: 48px; color: #94A3B8;">
                        <div style="font-size: 32px; margin-bottom: 8px;">📦</div>
                        <div style="font-weight: 700;">No products found.</div>
                        <a href="{{ route('admin.products.create') }}" style="color: var(--color-gold-dark); font-weight: 700;">Add your first solar product →</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    @if($products->hasPages())
        <div style="padding: 16px 24px; border-top: 1px solid #F1F5F9; display: flex; justify-content: flex-end;">
            {{ $products->withQueryString()->links() }}
        </div>
    @endif
</div>
@endsection
