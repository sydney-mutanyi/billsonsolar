@extends('layouts.admin')

@section('title', 'Add New Solar Product — Admin')

@section('content')
<div style="margin-bottom: 28px;">
    <a href="{{ route('admin.products.index') }}" style="color: #64748B; font-size: 13px; font-weight: 600; text-decoration: none;">← Back to Products</a>
    <h1 style="font-size: 24px; font-weight: 900; color: #0F172A; margin: 8px 0 4px;">Add New Solar Product</h1>
    <p style="font-size: 14px; color: #64748B;">Fill in the product details. All products will appear on the public shop page.</p>
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

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display: grid; grid-template-columns: 1fr 360px; gap: 24px; align-items: start;">

        <!-- Left Column: Core Details -->
        <div style="display: flex; flex-direction: column; gap: 20px;">

            <div class="admin-card">
                <h3 style="font-size: 14px; font-weight: 800; color: #0F172A; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">Product Information</h3>

                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Product Title *</label>
                        <input type="text" name="title" value="{{ old('title') }}" required
                            placeholder="e.g. 550W Monocrystalline Solar Panel — High Efficiency"
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box; transition: border-color 0.2s;"
                            onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Category *</label>
                            <select name="category_id" required style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box; background: white;">
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Brand / Manufacturer *</label>
                            <select name="brand_id" required style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box; background: white;">
                                <option value="">-- Select Brand --</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Price (KES) *</label>
                            <input type="number" name="price" value="{{ old('price') }}" required min="0" step="0.01"
                                placeholder="e.g. 18500"
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Rating (1–5)</label>
                            <input type="number" name="rating" value="{{ old('rating', 5.0) }}" min="1" max="5" step="0.1"
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Review Count</label>
                            <input type="number" name="reviews" value="{{ old('reviews', 0) }}" min="0"
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Badge Label</label>
                        <input type="text" name="badge" value="{{ old('badge') }}" placeholder="e.g. Best Seller, New Arrival"
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Product Description</label>
                        <textarea name="description" rows="4" placeholder="Detailed product description, key highlights, performance notes..."
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box; resize: vertical; transition: border-color 0.2s;"
                            onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">
                            Product Images * <span style="color:#64748B; font-weight:normal;">(Upload multiple images — JPG, PNG, WEBP, max 5MB each)</span>
                        </label>
                        
                        <input type="file" id="multiImageInput" name="images[]" accept="image/*" multiple style="display: none;" onchange="handleFilesSelected(this.files)">
                        <input type="hidden" id="primaryImageIndexInput" name="primary_image_index" value="0">

                        <!-- Dropzone area (when empty) -->
                        <div id="uploadPrompt" style="border: 2px dashed #CBD5E1; border-radius: 12px; padding: 28px 16px; background: #F8FAFC; text-align: center; cursor: pointer; transition: all 0.2s;"
                             onclick="document.getElementById('multiImageInput').click();"
                             ondragover="event.preventDefault(); this.style.borderColor='#F5A623'; this.style.background='#FFFDF5';"
                             ondragleave="this.style.borderColor='#CBD5E1'; this.style.background='#F8FAFC';"
                             ondrop="event.preventDefault(); this.style.borderColor='#CBD5E1'; this.style.background='#F8FAFC'; handleFilesSelected(event.dataTransfer.files);">
                            <div style="font-size: 32px; margin-bottom: 8px;">📸</div>
                            <div style="font-size: 14px; font-weight: 800; color: #0F172A; margin-bottom: 4px;">Click or Drag & Drop Multiple Images Here</div>
                            <div style="font-size: 12px; color: #64748B;">You can select multiple photos at once. The first image will be the primary cover (or click any thumbnail to change it).</div>
                        </div>

                        <!-- Preview Gallery (when files are chosen) -->
                        <div id="imageGalleryContainer" style="display: none; margin-top: 12px;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                <div id="galleryCountLabel" style="font-size: 12px; font-weight: 700; color: #0F172A;">0 images selected</div>
                                <button type="button" onclick="document.getElementById('multiImageInput').click();" style="background: #F1F5F9; color: #0F172A; border: 1px solid #CBD5E1; border-radius: 6px; padding: 4px 10px; font-size: 11.5px; font-weight: 700; cursor: pointer;">+ Add More Photos</button>
                            </div>

                            <div id="previewGrid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 12px;">
                                <!-- Dynamically generated thumbnails -->
                            </div>

                            <p style="font-size: 11px; color: #64748B; margin-top: 8px;">
                                💡 <strong>Tip:</strong> Click the "Set as Cover" badge on any image to choose which photo is displayed first in the shop catalog.
                            </p>
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
                    <div class="spec-row" style="display: grid; grid-template-columns: 1fr 1fr 36px; gap: 8px; align-items: center;">
                        <input type="text" name="specs_key[]" placeholder="Spec Name (e.g. Max Power)" style="border: 1.5px solid #E2E8F0; border-radius: 8px; padding: 9px 12px; font-size: 13px; outline: none; font-family: inherit;">
                        <input type="text" name="specs_val[]" placeholder="Spec Value (e.g. 550W)" style="border: 1.5px solid #E2E8F0; border-radius: 8px; padding: 9px 12px; font-size: 13px; outline: none; font-family: inherit;">
                        <button type="button" onclick="removeSpec(this)" style="background: #FEF2F2; color: #DC2626; border: none; border-radius: 8px; width: 36px; height: 36px; cursor: pointer; font-size: 16px;">×</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Options & Submit -->
        <div style="display: flex; flex-direction: column; gap: 20px;">
            <div class="admin-card">
                <h3 style="font-size: 14px; font-weight: 800; color: #0F172A; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">Visibility Options</h3>
                <label style="display: flex; align-items: center; gap: 12px; cursor: pointer; padding: 14px; background: #F8FAFC; border-radius: 10px; border: 1.5px solid #E2E8F0;">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: #051C12;">
                    <div>
                        <div style="font-size: 13px; font-weight: 700; color: #0F172A;">Feature on Homepage</div>
                        <div style="font-size: 11px; color: #64748B;">Show in the homepage featured products section</div>
                    </div>
                </label>
            </div>

            <div class="admin-card" style="background: #051C12; border-color: #051C12;">
                <h3 style="font-size: 14px; font-weight: 800; color: white; margin-bottom: 8px;">Ready to Publish?</h3>
                <p style="font-size: 12px; color: rgba(255,255,255,0.6); line-height: 1.5; margin-bottom: 16px;">This product will be immediately visible on the public shop page with all uploaded gallery images.</p>
                <button type="submit" class="admin-btn admin-btn-gold" style="width: 100%; justify-content: center; padding: 13px 20px;">
                    Save Solar Product →
                </button>
                <a href="{{ route('admin.products.index') }}" style="display: block; text-align: center; margin-top: 10px; font-size: 12px; color: rgba(255,255,255,0.5); text-decoration: none;">Cancel & Go Back</a>
            </div>
        </div>

    </div>
</form>

<script>
let selectedFilesList = [];
let primaryImageIndex = 0;

function handleFilesSelected(newFiles) {
    if (!newFiles || newFiles.length === 0) return;

    for (let i = 0; i < newFiles.length; i++) {
        // Prevent duplicate file names if possible
        const exists = selectedFilesList.some(f => f.name === newFiles[i].name && f.size === newFiles[i].size);
        if (!exists) {
            selectedFilesList.push(newFiles[i]);
        }
    }

    syncFileInput();
    renderGallery();
}

function syncFileInput() {
    const input = document.getElementById('multiImageInput');
    const dt = new DataTransfer();
    selectedFilesList.forEach(file => dt.items.add(file));
    input.files = dt.files;
}

function removeFile(index) {
    selectedFilesList.splice(index, 1);
    if (primaryImageIndex >= selectedFilesList.length) {
        primaryImageIndex = Math.max(0, selectedFilesList.length - 1);
    }
    syncFileInput();
    renderGallery();
}

function setPrimaryImage(index) {
    primaryImageIndex = index;
    document.getElementById('primaryImageIndexInput').value = index;
    renderGallery();
}

function renderGallery() {
    const prompt = document.getElementById('uploadPrompt');
    const container = document.getElementById('imageGalleryContainer');
    const grid = document.getElementById('previewGrid');
    const countLabel = document.getElementById('galleryCountLabel');

    if (selectedFilesList.length === 0) {
        prompt.style.display = 'block';
        container.style.display = 'none';
        return;
    }

    prompt.style.display = 'none';
    container.style.display = 'block';
    countLabel.textContent = `${selectedFilesList.length} image${selectedFilesList.length > 1 ? 's' : ''} ready`;
    document.getElementById('primaryImageIndexInput').value = primaryImageIndex;

    grid.innerHTML = '';

    selectedFilesList.forEach((file, idx) => {
        const card = document.createElement('div');
        const isCover = (idx === primaryImageIndex);
        card.style.cssText = `
            position: relative;
            background: white;
            border: 2px solid ${isCover ? '#F5A623' : '#E2E8F0'};
            border-radius: 10px;
            overflow: hidden;
            box-shadow: ${isCover ? '0 4px 12px rgba(245,166,35,0.25)' : '0 2px 4px rgba(0,0,0,0.03)'};
            transition: all 0.2s;
            display: flex;
            flex-direction: column;
        `;

        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.style.cssText = 'width: 100%; height: 110px; object-fit: contain; background: #FAFCFB; padding: 6px;';
        img.alt = file.name;

        // Cover badge / set button
        const badgeBtn = document.createElement('button');
        badgeBtn.type = 'button';
        badgeBtn.onclick = () => setPrimaryImage(idx);
        badgeBtn.style.cssText = `
            border: none;
            cursor: pointer;
            font-size: 10.5px;
            font-weight: 800;
            padding: 5px 8px;
            text-align: center;
            background: ${isCover ? '#F5A623' : '#F1F5F9'};
            color: ${isCover ? '#051C12' : '#475569'};
            transition: background 0.2s;
        `;
        badgeBtn.textContent = isCover ? '★ Cover Image' : 'Set as Cover';

        // Remove button
        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.onclick = (e) => {
            e.stopPropagation();
            removeFile(idx);
        };
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
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        `;
        removeBtn.innerHTML = '×';
        removeBtn.title = 'Remove this image';

        // Filename info
        const info = document.createElement('div');
        info.style.cssText = 'padding: 4px 6px; font-size: 10px; color: #64748B; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; background: white;';
        info.textContent = `${file.name} (${(file.size / 1024).toFixed(0)}KB)`;

        card.appendChild(removeBtn);
        card.appendChild(img);
        card.appendChild(badgeBtn);
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
        <input type="text" name="specs_key[]" placeholder="Spec Name (e.g. Max Power)" style="border: 1.5px solid #E2E8F0; border-radius: 8px; padding: 9px 12px; font-size: 13px; outline: none; font-family: inherit;">
        <input type="text" name="specs_val[]" placeholder="Spec Value (e.g. 550W)" style="border: 1.5px solid #E2E8F0; border-radius: 8px; padding: 9px 12px; font-size: 13px; outline: none; font-family: inherit;">
        <button type="button" onclick="removeSpec(this)" style="background: #FEF2F2; color: #DC2626; border: none; border-radius: 8px; width: 36px; height: 36px; cursor: pointer; font-size: 16px;">×</button>
    `;
    container.appendChild(row);
}

function removeSpec(btn) {
    btn.closest('.spec-row').remove();
}
</script>
@endsection
