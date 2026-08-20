@extends('layouts.admin')

@section('title', 'Blog Posts Manager — Admin')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 28px;">
    <div>
        <h1 style="font-size: 24px; font-weight: 900; color: #0F172A; margin-bottom: 4px;">Solar Blog Posts</h1>
        <p style="font-size: 14px; color: #64748B;">Manage educational articles, guides, and news for your customers.</p>
    </div>
    <a href="{{ route('admin.blogs.create') }}" class="admin-btn admin-btn-gold">
        + Write New Post
    </a>
</div>

<!-- Search -->
<form method="GET" action="{{ route('admin.blogs.index') }}" style="margin-bottom: 24px;">
    <div style="display: flex; gap: 10px; max-width: 480px;">
        <input type="text" name="q" value="{{ $search }}" placeholder="Search posts by title..."
            style="flex:1; border: 1px solid #E2E8F0; border-radius: 10px; padding: 10px 16px; font-size: 13px; outline: none; font-family: inherit;">
        <button type="submit" class="admin-btn">Search</button>
        @if($search)
            <a href="{{ route('admin.blogs.index') }}" class="admin-btn" style="background: #F1F5F9; color: #475569;">Clear</a>
        @endif
    </div>
</form>

<div class="admin-card" style="padding: 0; overflow: hidden;">
    <table class="admin-table">
        <thead>
            <tr>
                <th style="width: 36px; padding-left: 24px;">#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Read Time</th>
                <th>Status</th>
                <th>Featured</th>
                <th style="padding-right: 24px; text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $post)
                <tr>
                    <td style="padding-left: 24px; color: #94A3B8; font-size: 12px;">{{ $post->id }}</td>
                    <td>
                        <div style="font-weight: 700; color: #0F172A; font-size: 13px; max-width: 300px; line-height: 1.4;">{{ $post->title }}</div>
                        <div style="font-size: 11px; color: #94A3B8; margin-top: 2px;">{{ $post->slug }}</div>
                    </td>
                    <td>
                        <span style="background: #F0F9FF; color: #0369A1; padding: 3px 10px; border-radius: 50px; font-size: 11px; font-weight: 700; white-space: nowrap;">
                            {{ $post->category }}
                        </span>
                    </td>
                    <td style="font-size: 13px; color: #334155;">{{ $post->author }}</td>
                    <td style="font-size: 13px; color: #64748B;">{{ $post->read_time }} min read</td>
                    <td>
                        @if($post->is_published)
                            <span style="background: #ECFDF5; color: #065F46; padding: 3px 10px; border-radius: 50px; font-size: 11px; font-weight: 700;">● Published</span>
                        @else
                            <span style="background: #FEF9C3; color: #713F12; padding: 3px 10px; border-radius: 50px; font-size: 11px; font-weight: 700;">Draft</span>
                        @endif
                    </td>
                    <td>
                        @if($post->is_featured)
                            <span style="color: #10B981; font-weight: 800; font-size: 12px;">★ Featured</span>
                        @else
                            <span style="color: #CBD5E1; font-size: 12px;">—</span>
                        @endif
                    </td>
                    <td style="padding-right: 24px; text-align: right; white-space: nowrap;">
                        <div style="display: flex; gap: 8px; justify-content: flex-end;">
                            @if($post->is_published)
                                <a href="{{ route('blog.show', $post->slug) }}" target="_blank" style="background: #F0FDF4; color: #166534; padding: 6px 14px; border-radius: 8px; font-size: 12px; font-weight: 700; text-decoration: none;">View</a>
                            @endif
                            <a href="{{ route('admin.blogs.edit', $post->id) }}" style="background: #EFF6FF; color: #1D4ED8; padding: 6px 14px; border-radius: 8px; font-size: 12px; font-weight: 700; text-decoration: none;">Edit</a>
                            <form action="{{ route('admin.blogs.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete this blog post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #FEF2F2; color: #DC2626; padding: 6px 14px; border-radius: 8px; font-size: 12px; font-weight: 700; border: none; cursor: pointer;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center; padding: 48px; color: #94A3B8;">
                        <div style="font-size: 32px; margin-bottom: 8px;">✍️</div>
                        <div style="font-weight: 700;">No blog posts yet.</div>
                        <a href="{{ route('admin.blogs.create') }}" style="color: var(--color-gold-dark); font-weight: 700;">Write your first post →</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if($blogs->hasPages())
        <div style="padding: 16px 24px; border-top: 1px solid #F1F5F9; display: flex; justify-content: flex-end;">
            {{ $blogs->withQueryString()->links() }}
        </div>
    @endif
</div>
@endsection
