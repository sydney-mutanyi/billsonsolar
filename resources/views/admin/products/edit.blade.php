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

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Badge Label</label>
                        <input type="text" name="badge" value="{{ old('badge', $product->badge) }}" placeholder="e.g. Best Seller, New Arrival"
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Product Description</label>
                        <textarea name="description" rows="4" placeholder="Detailed product description, key highlights, performance notes..."
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box; resize: vertical; transition: border-color 0.2s;"
                            onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 8px;">
                            Product Gallery & Images <span style="color:#64748B; font-weight:normal;">(Manage existing photos & upload additional ones)</span>
                        </label>
                        
                        <!-- Existing Product Images -->
                        <div style="margin-bottom: 18px;">
                            <div style="font-size: 11px; font-weight: 700; color: #64748B; text-transform: uppercase; margin-bottom: 8px; letter-spacing: 0.04em;">
                                Existing Photos ({{ count($product->all_images) }})
                            </div>
                            
                            <div id="existingImagesGrid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 12px;">
                                @foreach($product->all_images as $idx => $img)
                                    @php $isCover = ($product->image === $img || ($idx === 0 && empty($product->image))); @endphp
                                    <div class="existing-image-card" id="existingCard_{{ $idx }}" style="position: relative; background: white; border: 2px solid {{ $isCover ? '#F5A623' : '#E2E8F0' }}; border-radius: 10px; overflow: hidden; display: flex; flex-direction: column; transition: all 0.2s; box-shadow: {{ $isCover ? '0 4px 12px rgba(245,166,35,0.25)' : '0 2px 4px rgba(0,0,0,0.03)' }};">
                                        <input type="hidden" name="existing_images[]" value="{{ $img }}">
                                        
                                        <img src="{{ asset($img) }}" alt="Product Photo" style="width: 100%; height: 110px; object-fit: contain; background: #FAFCFB; padding: 6px;">
                                        
                                        <label style="border: none; cursor: pointer; font-size: 10.5px; font-weight: 800; padding: 5px 8px; text-align: center; background: {{ $isCover ? '#F5A623' : '#F1F5F9' }}; color: {{ $isCover ? '#051C12' : '#475569' }}; margin: 0; display: block;" class="cover-label">
                                            <input type="radio" name="primary_image" value="{{ $img }}" {{ $isCover ? 'checked' : '' }} style="display: none;" onchange="updateCoverHighlight(this)">
                                            <span class="cover-text">{{ $isCover ? '★ Cover Image' : 'Set as Cover' }}</span>
                                        </label>

                                        <button type="button" onclick="removeExistingImage('existingCard_{{ $idx }}')" title="Delete this image" style="position: absolute; top: 4px; right: 4px; background: rgba(220, 38, 38, 0.9); color: white; border: none; width: 22px; height: 22px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: bold; cursor: pointer; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                                            ×
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Upload Additional / Replacement Images -->
                        <div style="font-size: 11px; font-weight: 700; color: #64748B; text-transform: uppercase; margin-bottom: 8px; letter-spacing: 0.04em;">
                            Add More Photos (JPG, PNG, WEBP, max 5MB each)
                        </div>

                        <input type="file" id="editMultiImageInput" name="images[]" accept="image/*" multiple style="display: none;" onchange="handleNewFilesSelected(this.files)">

                        <div id="editUploadPrompt" style="border: 2px dashed #CBD5E1; border-radius: 12px; padding: 20px 16px; background: #F8FAFC; text-align: center; cursor: pointer; transition: all 0.2s;"
                             onclick="document.getElementById('editMultiImageInput').click();"
                             ondragover="event.preventDefault(); this.style.borderColor='#F5A623'; this.style.background='#FFFDF5';"
                             ondragleave="this.style.borderColor='#CBD5E1'; this.style.background='#F8FAFC';"
                             ondrop="event.preventDefault(); this.style.borderColor='#CBD5E1'; this.style.background='#F8FAFC'; handleNewFilesSelected(event.dataTransfer.files);">
                            <div style="font-size: 26px; margin-bottom: 6px;">📸</div>
                            <div style="font-size: 13.5px; font-weight: 800; color: #0F172A; margin-bottom: 2px;">Click or Drag & Drop to Add New Photos</div>
                            <div style="font-size: 11.5px; color: #64748B;">You can select multiple photos at once. They will be added to the gallery.</div>
                        </div>

                        <!-- New Images Preview Grid -->
                        <div id="newImagesContainer" style="display: none; margin-top: 12px;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                                <div id="newImagesCountLabel" style="font-size: 12px; font-weight: 700; color: #0F172A;">New photos ready to upload</div>
                                <button type="button" onclick="document.getElementById('editMultiImageInput').click();" style="background: #F1F5F9; color: #0F172A; border: 1px solid #CBD5E1; border-radius: 6px; padding: 4px 10px; font-size: 11px; font-weight: 700; cursor: pointer;">+ Select More</button>
                            </div>
                            <div id="newImagesGrid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 12px;"></div>
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
                <p style="font-size: 12px; color: rgba(255,255,255,0.6); line-height: 1.5; margin-bottom: 16px;">Changes and updated photos will be immediately reflected on the public shop page.</p>
                <button type="submit" class="admin-btn admin-btn-gold" style="width: 100%; justify-content: center; padding: 13px 20px;">
                    Save Changes →
                </button>
                <a href="{{ route('admin.products.index') }}" style="display: block; text-align: center; margin-top: 10px; font-size: 12px; color: rgba(255,255,255,0.5); text-decoration: none;">Cancel & Go Back</a>
            </div>

        </div>

    </div>
</form>

<div style="max-width: 360px; margin-left: auto; margin-top: 20px;">
    <div class="admin-card" style="border-color: #FECACA;">
        <h3 style="font-size: 14px; font-weight: 800; color: #991B1B; margin-bottom: 8px;">Danger Zone</h3>
        <p style="font-size: 12px; color: #64748B; margin-bottom: 12px;">Permanently delete this product from the database.</p>
        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this product and all its uploaded photos?')">
            @csrf
            @method('DELETE')
            <button type="submit" style="background: #FEF2F2; color: #DC2626; border: 1px solid #FECACA; padding: 10px 20px; border-radius: 10px; font-size: 13px; font-weight: 700; cursor: pointer; width: 100%;">
                Delete Product Permanently
            </button>
        </form>
    </div>
</div>

<script>
let newFilesList = [];

function updateCoverHighlight(radio) {
    document.querySelectorAll('.existing-image-card').forEach(card => {
        card.style.borderColor = '#E2E8F0';
        card.style.boxShadow = '0 2px 4px rgba(0,0,0,0.03)';
        const lbl = card.querySelector('.cover-label');
        if (lbl) {
            lbl.style.background = '#F1F5F9';
            lbl.style.color = '#475569';
            lbl.querySelector('.cover-text').textContent = 'Set as Cover';
        }
    });

    const activeCard = radio.closest('.existing-image-card');
    if (activeCard) {
        activeCard.style.borderColor = '#F5A623';
        activeCard.style.boxShadow = '0 4px 12px rgba(245,166,35,0.25)';
        const lbl = activeCard.querySelector('.cover-label');
        if (lbl) {
            lbl.style.background = '#F5A623';
            lbl.style.color = '#051C12';
            lbl.querySelector('.cover-text').textContent = '★ Cover Image';
        }
    }
}

function removeExistingImage(cardId) {
    const card = document.getElementById(cardId);
    if (!card) return;

    const remainingCards = document.querySelectorAll('.existing-image-card');
    if (remainingCards.length <= 1 && newFilesList.length === 0) {
        alert('You must have at least one product image. Please upload a new image before removing this one.');
        return;
    }

    const wasCover = card.querySelector('input[type="radio"]:checked');
    card.remove();

    if (wasCover) {
        const nextCard = document.querySelector('.existing-image-card');
        if (nextCard) {
            const nextRadio = nextCard.querySelector('input[type="radio"]');
            if (nextRadio) {
                nextRadio.checked = true;
                updateCoverHighlight(nextRadio);
            }
        }
    }
}

function handleNewFilesSelected(files) {
    if (!files || files.length === 0) return;

    for (let i = 0; i < files.length; i++) {
        const exists = newFilesList.some(f => f.name === files[i].name && f.size === files[i].size);
        if (!exists) {
            newFilesList.push(files[i]);
        }
    }

    syncNewFileInput();
    renderNewGallery();
}

function syncNewFileInput() {
    const input = document.getElementById('editMultiImageInput');
    const dt = new DataTransfer();
    newFilesList.forEach(file => dt.items.add(file));
    input.files = dt.files;
}

function removeNewFile(index) {
    newFilesList.splice(index, 1);
    syncNewFileInput();
    renderNewGallery();
}

function renderNewGallery() {
    const container = document.getElementById('newImagesContainer');
    const grid = document.getElementById('newImagesGrid');
    const countLabel = document.getElementById('newImagesCountLabel');

    if (newFilesList.length === 0) {
        container.style.display = 'none';
        return;
    }

    container.style.display = 'block';
    countLabel.textContent = `${newFilesList.length} new photo${newFilesList.length > 1 ? 's' : ''} ready to upload`;
    grid.innerHTML = '';

    newFilesList.forEach((file, idx) => {
        const card = document.createElement('div');
        card.style.cssText = `
            position: relative;
            background: white;
            border: 2px dashed #10B981;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 4px rgba(0,0,0,0.03);
        `;

        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.style.cssText = 'width: 100%; height: 110px; object-fit: contain; background: #FAFCFB; padding: 6px;';
        img.alt = file.name;

        const badge = document.createElement('div');
        badge.style.cssText = 'font-size: 10px; font-weight: 700; padding: 4px; text-align: center; background: #ECFDF5; color: #065F46;';
        badge.textContent = '✚ New Upload';

        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.onclick = () => removeNewFile(idx);
        removeBtn.style.cssText = `
            position: absolute;
            top: 4px;
            right: 4px;
            background: rgba(220, 38, 38, 0.9);
            color: white;
            border: none;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        `;
        removeBtn.innerHTML = '×';

        const info = document.createElement('div');
        info.style.cssText = 'padding: 3px 6px; font-size: 9.5px; color: #64748B; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; background: white;';
        info.textContent = `${file.name} (${(file.size / 1024).toFixed(0)}KB)`;

        card.appendChild(removeBtn);
        card.appendChild(img);
        card.appendChild(badge);
        card.appendChild(info);
        grid.appendChild(card);
    });
}

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
