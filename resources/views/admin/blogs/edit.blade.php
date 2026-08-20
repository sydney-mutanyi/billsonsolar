@extends('layouts.admin')

@section('title', 'Edit Blog Post — Admin')

@section('content')
<div style="margin-bottom: 28px;">
    <a href="{{ route('admin.blogs.index') }}" style="color: #64748B; font-size: 13px; font-weight: 600; text-decoration: none;">← Back to Blog Posts</a>
    <h1 style="font-size: 24px; font-weight: 900; color: #0F172A; margin: 8px 0 4px;">Edit Blog Post</h1>
    <p style="font-size: 14px; color: #64748B;">Editing: <strong>{{ $blog->title }}</strong></p>
</div>

@if($errors->any())
    <div style="background: #FEF2F2; border: 1px solid #FECACA; color: #991B1B; padding: 14px 20px; border-radius: 12px; margin-bottom: 24px; font-size: 13px;">
        <strong>Please fix these errors:</strong>
        <ul style="margin: 8px 0 0 16px;">
            @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div style="display: grid; grid-template-columns: 1fr 320px; gap: 24px; align-items: start;">

        <!-- Left: Content -->
        <div style="display: flex; flex-direction: column; gap: 20px;">
            <div class="admin-card">
                <h3 style="font-size: 14px; font-weight: 800; color: #0F172A; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">Post Details</h3>
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Post Title *</label>
                        <input type="text" name="title" value="{{ old('title', $blog->title) }}" required
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 14px; outline: none; font-family: inherit; box-sizing: border-box;"
                            onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr 80px; gap: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Category *</label>
                            <input type="text" name="category" value="{{ old('category', $blog->category) }}" required
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Author *</label>
                            <input type="text" name="author" value="{{ old('author', $blog->author) }}" required
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Read (min)</label>
                            <input type="number" name="read_time" value="{{ old('read_time', $blog->read_time) }}" min="1"
                                style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box;">
                        </div>
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Cover Image Path</label>
                        <input type="text" name="cover_image" value="{{ old('cover_image', $blog->cover_image) }}"
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px;">Excerpt / Summary *</label>
                        <textarea name="excerpt" required maxlength="500" rows="3"
                            style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 11px 14px; font-size: 13px; outline: none; font-family: inherit; box-sizing: border-box; resize: vertical;"
                            onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">{{ old('excerpt', $blog->excerpt) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="admin-card">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">
                    <h3 style="font-size: 14px; font-weight: 800; color: #0F172A;">Post Body *</h3>
                    <span style="font-size: 11px; color: #94A3B8; background: #F1F5F9; padding: 4px 10px; border-radius: 6px;">HTML supported</span>
                </div>
                <textarea name="body" required rows="20"
                    style="width: 100%; border: 1.5px solid #E2E8F0; border-radius: 10px; padding: 14px; font-size: 13px; outline: none; font-family: 'Courier New', monospace; box-sizing: border-box; resize: vertical; line-height: 1.6;"
                    onfocus="this.style.borderColor='#051C12'" onblur="this.style.borderColor='#E2E8F0'">{{ old('body', $blog->body) }}</textarea>
            </div>
        </div>

        <!-- Right -->
        <div style="display: flex; flex-direction: column; gap: 16px;">
            <div class="admin-card">
                <h3 style="font-size: 14px; font-weight: 800; color: #0F172A; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">Publish Settings</h3>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label style="display: flex; align-items: center; gap: 12px; cursor: pointer; padding: 14px; background: #F8FAFC; border-radius: 10px; border: 1.5px solid #E2E8F0;">
                        <input type="checkbox" name="is_published" value="1" {{ $blog->is_published ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: #10B981;">
                        <div>
                            <div style="font-size: 13px; font-weight: 700; color: #0F172A;">Published</div>
                            <div style="font-size: 11px; color: #64748B;">Visible on public /blog page</div>
                        </div>
                    </label>
                    <label style="display: flex; align-items: center; gap: 12px; cursor: pointer; padding: 14px; background: #F8FAFC; border-radius: 10px; border: 1.5px solid #E2E8F0;">
                        <input type="checkbox" name="is_featured" value="1" {{ $blog->is_featured ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: #F5A623;">
                        <div>
                            <div style="font-size: 13px; font-weight: 700; color: #0F172A;">★ Featured Post</div>
                            <div style="font-size: 11px; color: #64748B;">Highlighted at top of blog</div>
                        </div>
                    </label>
                </div>
                @if($blog->published_at)
                    <div style="margin-top: 12px; font-size: 11px; color: #94A3B8;">Published: {{ $blog->published_at->format('d M Y, H:i') }}</div>
                @endif
            </div>

            <div class="admin-card" style="background: #051C12; border-color: #051C12;">
                <button type="submit" class="admin-btn admin-btn-gold" style="width: 100%; justify-content: center; padding: 13px 20px;">
                    Save Changes →
                </button>
                <a href="{{ route('admin.blogs.index') }}" style="display: block; text-align: center; margin-top: 10px; font-size: 12px; color: rgba(255,255,255,0.5); text-decoration: none;">Cancel</a>
            </div>

            <div class="admin-card" style="border-color: #FECACA;">
                <h3 style="font-size: 14px; font-weight: 800; color: #991B1B; margin-bottom: 8px;">Danger Zone</h3>
                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Permanently delete this blog post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: #FEF2F2; color: #DC2626; border: 1px solid #FECACA; padding: 10px 20px; border-radius: 10px; font-size: 13px; font-weight: 700; cursor: pointer; width: 100%;">
                        Delete Post Permanently
                    </button>
                </form>
            </div>
        </div>

    </div>
</form>
@endsection
