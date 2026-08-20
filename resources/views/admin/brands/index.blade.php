@extends('layouts.admin')

@section('title', 'Brands Manager — Admin')

@section('content')
<div style="display: grid; grid-template-columns: 1fr 380px; gap: 24px; align-items: start;">

    <!-- Brands Table -->
    <div>
        <div style="margin-bottom: 24px;">
            <h1 style="font-size: 24px; font-weight: 900; color: #0F172A; margin-bottom: 4px;">Solar Brands & Manufacturers</h1>
            <p style="font-size: 14px; color: #64748B;">Manage solar equipment manufacturers (Deye, Victron, Growatt, BYD, GoodWe, Felicity...).</p>
        </div>

        <div class="admin-card" style="padding: 0; overflow: hidden;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="padding-left: 24px;">#</th>
                        <th>Brand / Manufacturer</th>
                        <th>Slug</th>
                        <th>Products Listed</th>
                        <th style="padding-right: 24px; text-align: right;">Added</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($brands as $brand)
                        <tr>
                            <td style="padding-left: 24px; color: #94A3B8; font-size: 12px;">{{ $brand->id }}</td>
                            <td>
                                <div style="font-weight: 700; color: #0F172A;">{{ $brand->name }}</div>
                                @if($brand->description)
                                    <div style="font-size: 11px; color: #94A3B8; margin-top: 2px;">{{ $brand->description }}</div>
                                @endif
                            </td>
                            <td><code style="background: #F1F5F9; padding: 2px 8px; border-radius: 4px; font-size: 12px;">{{ $brand->slug }}</code></td>
                            <td>
                                <span style="background: #F0FDF4; color: #166534; padding: 3px 10px; border-radius: 50px; font-size: 12px; font-weight: 700;">
                                    {{ $brand->products_count }} product{{ $brand->products_count !== 1 ? 's' : '' }}
                                </span>
                            </td>
                            <td style="padding-right: 24px; text-align: right; font-size: 12px; color: #64748B;">{{ $brand->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 48px; color: #94A3B8;">
                                <div style="font-size: 32px; margin-bottom: 8px;">🏢</div>
                                <div style="font-weight: 700;">No brands yet. Add one →</div>
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
            <h2 style="font-size: 18px; font-weight: 900; color: #0F172A; margin-bottom: 4px;">Add New Brand</h2>
            <p style="font-size: 14px; color: #64748B;">Register a new solar equipment manufacturer or brand.</p>
        </div>

        <div class="admin-card">
            <form action="{{ route('admin.brands.store') }}" method="POST">
                @csrf
                @if($errors->any())
                    <div style="background: #FEF2F2; color: #991B1B; padding: 12px 16px; border-radius: 10px; margin-bottom: 16px; font-size: 13px; font-weight: 600;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div style="display: flex; flex-direction: column; gap: 14px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Brand Name *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            placeholder="e.g. Deye Solar, Victron Energy..."
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box;"
                            onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Description (optional)</label>
                        <textarea name="description" rows="3"
                            placeholder="Brief info about this manufacturer, origin, specialty..."
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box; resize: vertical;"
                            onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">{{ old('description') }}</textarea>
                    </div>

                    <button type="submit" class="admin-btn" style="width: 100%; justify-content: center; padding: 12px;">
                        + Register Brand
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
