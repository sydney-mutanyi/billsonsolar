@extends('layouts.admin')

@section('title', 'Edit Product — Admin')

@section('content')
<div style="margin-bottom: 28px;">
    <a href="{{ route('admin.products.index') }}" style="color: #64748B; font-size: 13px; font-weight: 600; text-decoration: none;">← Back to Products</a>
    <h1 style="font-size: 24px; font-weight: 900; color: #0F172A; margin: 8px 0 4px;">Edit Solar Product</h1>
    <p style="font-size: 14px; color: #64748B;">Editing: <strong>{{ $product->title }}</strong></p>
</div>

@if($errors->any())
    <div style="background: #FEF2F2; border: 1px solid #FECACA; color: #991B1B; padding: 14px 20px; border-radius: 12px; margin-bottom: 24px; font-size: 13px;">
        <strong style="font-weight: 800;">Please fix the following errors:</strong>
        <ul style="margin: 8px 0 0 16px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div style="display: grid; grid-template-columns: 1fr 360px; gap: 24px; align-items: start;">

        <!-- Left Column -->
        <div style="display: flex; flex-direction: column; gap: 20px;">

            <div class="admin-card">
                <h3 style="font-size: 14px; font-weight: 800; color: #0F172A; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">Product Information</h3>
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Product Title *</label>
                        <input type="text" name="title" value="{{ old('title', $product->title) }}" required
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;"
                            onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Category *</label>
                            <select name="category_id" required style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box; background: white;">
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Brand / Manufacturer *</label>
                            <select name="brand_id" required style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box; background: white;">
                                <option value="">-- Select Brand --</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Price (KES) *</label>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}" required min="0" step="0.01"
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Rating (1–5)</label>
                            <input type="number" name="rating" value="{{ old('rating', $product->rating) }}" min="1" max="5" step="0.1"
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Review Count</label>
                            <input type="number" name="reviews" value="{{ old('reviews', $product->reviews) }}" min="0"
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Badge Label</label>
                            <input type="text" name="badge" value="{{ old('badge', $product->badge) }}" placeholder="e.g. Best Seller, New Arrival"
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Image Path</label>
                            <input type="text" name="image" value="{{ old('image', $product->image) }}"
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical Specs -->
            <div class="admin-card">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">
                    <h3 style="font-size: 14px; font-weight: 800; color: #0F172A;">Technical Specifications</h3>
                    <button type="button" onclick="addSpec()" style="background: #F1F5F9; color: #374151; border: none; padding: 6px 14px; border-radius: 8px; font-size: 12px; font-weight: 700; cursor: pointer;">+ Add Row</button>
                </div>
                <div id="specsContainer" style="display: flex; flex-direction: column; gap: 10px;">
                    @if($product->specs && count($product->specs) > 0)
                        @foreach($product->specs as $specKey => $specVal)
                            <div class="spec-row" style="display: grid; grid-template-columns: 1fr 1fr 36px; gap: 8px; align-items: center;">
                                <input type="text" name="specs_key[]" value="{{ $specKey }}" style="border: 1.5px solid #E2E8F0; border-radius: 8px; padding: 9px 12px; font-size: 13px; outline: none; font-family: inherit;">
                                <input type="text" name="specs_val[]" value="{{ $specVal }}" style="border: 1.5px solid #E2E8F0; border-radius: 8px; padding: 9px 12px; font-size: 13px; outline: none; font-family: inherit;">
                                <button type="button" onclick="removeSpec(this)" style="background: #FEF2F2; color: #DC2626; border: none; border-radius: 8px; width: 36px; height: 36px; cursor: pointer; font-size: 16px;">×</button>
                            </div>
                        @endforeach
                    @else
                        <div class="spec-row" style="display: grid; grid-template-columns: 1fr 1fr 36px; gap: 8px; align-items: center;">
                            <input type="text" name="specs_key[]" placeholder="Spec Name" style="border: 1.5px solid #E2E8F0; border-radius: 8px; padding: 9px 12px; font-size: 13px; outline: none; font-family: inherit;">
                            <input type="text" name="specs_val[]" placeholder="Spec Value" style="border: 1.5px solid #E2E8F0; border-radius: 8px; padding: 9px 12px; font-size: 13px; outline: none; font-family: inherit;">
                            <button type="button" onclick="removeSpec(this)" style="background: #FEF2F2; color: #DC2626; border: none; border-radius: 8px; width: 36px; height: 36px; cursor: pointer; font-size: 16px;">×</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div style="display: flex; flex-direction: column; gap: 20px;">
            <div class="admin-card">
                <h3 style="font-size: 14px; font-weight: 800; color: #0F172A; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">Visibility Options</h3>
                <label style="display: flex; align-items: center; gap: 12px; cursor: pointer; padding: 14px; background: #F8FAFC; border-radius: 10px; border: 1.5px solid #E2E8F0;">
                    <input type="checkbox" name="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: #051C12;">
                    <div>
                        <div style="font-size: 13px; font-weight: 700; color: #0F172A;">Feature on Homepage</div>
                        <div style="font-size: 11px; color: #64748B;">Show in the homepage featured products section</div>
                    </div>
                </label>
            </div>

            <div class="admin-card" style="background: #051C12; border-color: #051C12;">
                <h3 style="font-size: 14px; font-weight: 800; color: white; margin-bottom: 8px;">Update Product</h3>
                <p style="font-size: 12px; color: rgba(255,255,255,0.6); line-height: 1.5; margin-bottom: 16px;">Changes will be immediately reflected on the public shop page.</p>
                <button type="submit" class="admin-btn admin-btn-gold" style="width: 100%; justify-content: center; padding: 13px 20px;">
                    Save Changes →
                </button>
                <a href="{{ route('admin.products.index') }}" style="display: block; text-align: center; margin-top: 10px; font-size: 12px; color: rgba(255,255,255,0.5); text-decoration: none;">Cancel & Go Back</a>
            </div>

            <div class="admin-card" style="border-color: #FECACA;">
                <h3 style="font-size: 14px; font-weight: 800; color: #991B1B; margin-bottom: 8px;">Danger Zone</h3>
                <p style="font-size: 12px; color: #64748B; margin-bottom: 12px;">Permanently delete this product from the database.</p>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this product?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: #FEF2F2; color: #DC2626; border: 1px solid #FECACA; padding: 10px 20px; border-radius: 10px; font-size: 13px; font-weight: 700; cursor: pointer; width: 100%;">
                        Delete Product Permanently
                    </button>
                </form>
            </div>
        </div>

    </div>
</form>

<script>
function addSpec() {
    const container = document.getElementById('specsContainer');
    const row = document.createElement('div');
    row.className = 'spec-row';
    row.style.cssText = 'display: grid; grid-template-columns: 1fr 1fr 36px; gap: 8px; align-items: center;';
    row.innerHTML = `
        <input type="text" name="specs_key[]" placeholder="Spec Name" style="border: 1.5px solid #E2E8F0; border-radius: 8px; padding: 9px 12px; font-size: 13px; outline: none; font-family: inherit;">
        <input type="text" name="specs_val[]" placeholder="Spec Value" style="border: 1.5px solid #E2E8F0; border-radius: 8px; padding: 9px 12px; font-size: 13px; outline: none; font-family: inherit;">
        <button type="button" onclick="removeSpec(this)" style="background: #FEF2F2; color: #DC2626; border: none; border-radius: 8px; width: 36px; height: 36px; cursor: pointer; font-size: 16px;">×</button>
    `;
    container.appendChild(row);
}

function removeSpec(btn) {
    btn.closest('.spec-row').remove();
}
</script>
@endsection
