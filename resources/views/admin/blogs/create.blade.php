@extends('layouts.admin')

@section('title', 'Write New Blog Post — Admin')

@section('content')
<div style="margin-bottom: 28px;">
    <a href="{{ route('admin.blogs.index') }}" style="color: #64748B; font-size: 13px; font-weight: 600; text-decoration: none;">← Back to Blog Posts</a>
    <h1 style="font-size: 24px; font-weight: 900; color: #0F172A; margin: 8px 0 4px;">Write New Blog Post</h1>
    <p style="font-size: 14px; color: #64748B;">Create educational solar content that will appear on your public /blog page.</p>
</div>

@if($errors->any())
    <div style="background: #FEF2F2; border: 1px solid #FECACA; color: #991B1B; padding: 14px 20px; border-radius: 12px; margin-bottom: 24px; font-size: 13px;">
        <strong>Please fix these errors:</strong>
        <ul style="margin: 8px 0 0 16px;">
            @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.blogs.store') }}" method="POST">
    @csrf
    <div style="display: grid; grid-template-columns: 1fr 320px; gap: 24px; align-items: start;">

        <!-- Left: Post Content -->
        <div style="display: flex; flex-direction: column; gap: 20px;">
            <div class="admin-card">
                <h3 style="font-size: 14px; font-weight: 800; color: #0F172A; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">Post Details</h3>
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Post Title *</label>
                        <input type="text" name="title" value="{{ old('title') }}" required
                            placeholder="e.g. How to Size a Solar System for Your Nairobi Home"
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;"
                            onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr 80px; gap: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Category *</label>
                            <input type="text" name="category" value="{{ old('category', 'Solar Tips') }}" required
                                placeholder="Solar Tips, Guides, News..."
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Author Name *</label>
                            <input type="text" name="author" value="{{ old('author', 'Bills On Solar Team') }}" required
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Read (min)</label>
                            <input type="number" name="read_time" value="{{ old('read_time', 5) }}" min="1"
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Cover Image Path</label>
                        <input type="text" name="cover_image" value="{{ old('cover_image', 'images/product_solar_panel.png') }}"
                            placeholder="images/blog-cover.png"
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Excerpt / Summary * <span style="color:#94A3B8; font-weight:500;">(max 500 chars — shown in listing cards)</span></label>
                        <textarea name="excerpt" required maxlength="500" rows="3"
                            placeholder="A compelling 1–2 sentence summary of what this post covers..."
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box; resize: vertical;"
                            onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">{{ old('excerpt') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="admin-card">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">
                    <h3 style="font-size: 14px; font-weight: 800; color: #0F172A;">Post Body *</h3>
                    <span style="font-size: 11px; color: #94A3B8; background: #F1F5F9; padding: 4px 10px; border-radius: 6px;">HTML supported</span>
                </div>
                <textarea name="body" required rows="18"
                    placeholder="Write your full post content here. HTML tags like &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;strong&gt; are supported."
                    style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 14px; font-size: 13px; outline: none; font-family: 'Courier New', monospace; box-sizing: border-box; resize: vertical; line-height: 1.6;"
                    onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">{{ old('body') }}</textarea>
                <p style="font-size: 11px; color: #94A3B8; margin-top: 8px;">Tip: Use &lt;h2&gt; for section headings, &lt;p&gt; for paragraphs, &lt;ul&gt;&lt;li&gt; for lists, &lt;strong&gt; for bold text.</p>
            </div>
        </div>

        <!-- Right: Publish Options -->
        <div style="display: flex; flex-direction: column; gap: 16px;">
            <div class="admin-card">
                <h3 style="font-size: 14px; font-weight: 800; color: #0F172A; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">Publish Settings</h3>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label style="display: flex; align-items: center; gap: 12px; cursor: pointer; padding: 14px; background: #F8FAFC; border-radius: 10px; border: 1.5px solid #E2E8F0;">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: #10B981;">
                        <div>
                            <div style="font-size: 13px; font-weight: 700; color: #0F172A;">Publish Immediately</div>
                            <div style="font-size: 11px; color: #64748B;">Make visible on public /blog page</div>
                        </div>
                    </label>
                    <label style="display: flex; align-items: center; gap: 12px; cursor: pointer; padding: 14px; background: #F8FAFC; border-radius: 10px; border: 1.5px solid #E2E8F0;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: #F5A623;">
                        <div>
                            <div style="font-size: 13px; font-weight: 700; color: #0F172A;">★ Feature this Post</div>
                            <div style="font-size: 11px; color: #64748B;">Highlight at top of blog page</div>
                        </div>
                    </label>
                </div>
            </div>

            <div class="admin-card" style="background: #051C12; border-color: #051C12;">
                <h3 style="font-size: 14px; font-weight: 800; color: white; margin-bottom: 8px;">Ready to Write?</h3>
                <p style="font-size: 12px; color: rgba(255,255,255,0.6); line-height: 1.5; margin-bottom: 16px;">Save as draft or publish directly to your solar blog.</p>
                <button type="submit" class="admin-btn admin-btn-gold" style="width: 100%; justify-content: center; padding: 13px 20px;">
                    Save Blog Post →
                </button>
                <a href="{{ route('admin.blogs.index') }}" style="display: block; text-align: center; margin-top: 10px; font-size: 12px; color: rgba(255,255,255,0.5); text-decoration: none;">Cancel</a>
            </div>
        </div>

    </div>
</form>
@endsection
