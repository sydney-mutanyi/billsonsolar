@extends('layouts.admin')

@section('title', 'Categories Manager — Admin')

@section('content')
<div style="display: grid; grid-template-columns: 1fr 380px; gap: 24px; align-items: start;">

    <!-- Categories Table -->
    <div>
        <div style="margin-bottom: 24px;">
            <h1 style="font-size: 24px; font-weight: 900; color: #0F172A; margin-bottom: 4px;">Product Categories</h1>
            <p style="font-size: 14px; color: #64748B;">Manage solar product categories (Panels, Batteries, Inverters, Controllers...).</p>
        </div>

        <div class="admin-card" style="padding: 0; overflow: hidden;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="padding-left: 24px;">#</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Products</th>
                        <th style="padding-right: 24px; text-align: right;">Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $cat)
                        <tr>
                            <td style="padding-left: 24px; color: #94A3B8; font-size: 12px;">{{ $cat->id }}</td>
                            <td>
                                <div style="font-weight: 700; color: #0F172A;">{{ $cat->name }}</div>
                                @if($cat->description)
                                    <div style="font-size: 11px; color: #94A3B8; margin-top: 2px;">{{ $cat->description }}</div>
                                @endif
                            </td>
                            <td><code style="background: #F1F5F9; padding: 2px 8px; border-radius: 4px; font-size: 12px;">{{ $cat->slug }}</code></td>
                            <td>
                                <span style="background: #EFF6FF; color: #1D4ED8; padding: 3px 10px; border-radius: 50px; font-size: 12px; font-weight: 700;">
                                    {{ $cat->products_count }} product{{ $cat->products_count !== 1 ? 's' : '' }}
                                </span>
                            </td>
                            <td style="padding-right: 24px; text-align: right; font-size: 12px; color: #64748B;">{{ $cat->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 48px; color: #94A3B8;">
                                <div style="font-size: 32px; margin-bottom: 8px;">🏷️</div>
                                <div style="font-weight: 700;">No categories yet. Add one →</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Add Form -->
    <div>
        <div style="margin-bottom: 24px;">
            <h2 style="font-size: 18px; font-weight: 900; color: #0F172A; margin-bottom: 4px;">Add New Category</h2>
            <p style="font-size: 14px; color: #64748B;">Quickly create a new solar product category.</p>
        </div>

        <div class="admin-card">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                @if($errors->any())
                    <div style="background: #FEF2F2; color: #991B1B; padding: 12px 16px; border-radius: 10px; margin-bottom: 16px; font-size: 13px; font-weight: 600;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div style="display: flex; flex-direction: column; gap: 14px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Category Name *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            placeholder="e.g. Solar Lights, Water Pumps..."
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box;"
                            onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Description (optional)</label>
                        <textarea name="description" rows="3"
                            placeholder="Short description of this product category..."
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box; resize: vertical;"
                            onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">{{ old('description') }}</textarea>
                    </div>

                    <button type="submit" class="admin-btn" style="width: 100%; justify-content: center; padding: 12px;">
                        + Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
