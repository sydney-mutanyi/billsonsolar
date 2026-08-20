<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Solution;
use App\Models\Blog;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Admin Dashboard Overview
     */
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();
        $totalSolutions = Solution::count();

        $recentProducts = Product::with(['category', 'brand'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalBrands',
            'totalSolutions',
            'recentProducts'
        ));
    }

    /**
     * Product List Table
     */
    public function products(Request $request)
    {
        $search = $request->query('q', '');
        $query = Product::with(['category', 'brand'])->latest();

        if (!empty($search)) {
            $query->where('title', 'like', "%{$search}%");
        }

        $products = $query->paginate(15);

        return view('admin.products.index', compact('products', 'search'));
    }

    /**
     * Render Product Creation Form
     */
    public function createProduct()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store New Product
     */
    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
            'badge' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:1|max:5',
            'reviews' => 'nullable|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'specs_key' => 'nullable|array',
            'specs_val' => 'nullable|array',
        ]);

        // Build Specs JSON
        $specs = [];
        if (!empty($request->specs_key) && !empty($request->specs_val)) {
            foreach ($request->specs_key as $idx => $key) {
                if (!empty($key) && isset($request->specs_val[$idx])) {
                    $specs[$key] = $request->specs_val[$idx];
                }
            }
        }

        Product::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . rand(100, 999),
            'category_id' => $validated['category_id'],
            'brand_id' => $validated['brand_id'],
            'price' => $validated['price'],
            'badge' => $validated['badge'] ?? null,
            'image' => $validated['image'] ?: 'images/product_solar_panel.png',
            'rating' => $validated['rating'] ?? 5.0,
            'reviews' => $validated['reviews'] ?? 0,
            'is_featured' => $request->has('is_featured'),
            'is_active' => true,
            'specs' => $specs,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Solar product created successfully!');
    }

    /**
     * Render Product Edit Form
     */
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update Product
     */
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
            'badge' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:1|max:5',
            'reviews' => 'nullable|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'specs_key' => 'nullable|array',
            'specs_val' => 'nullable|array',
        ]);

        $specs = [];
        if (!empty($request->specs_key) && !empty($request->specs_val)) {
            foreach ($request->specs_key as $idx => $key) {
                if (!empty($key) && isset($request->specs_val[$idx])) {
                    $specs[$key] = $request->specs_val[$idx];
                }
            }
        }

        $product->update([
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'brand_id' => $validated['brand_id'],
            'price' => $validated['price'],
            'badge' => $validated['badge'] ?? null,
            'image' => $validated['image'] ?: $product->image,
            'rating' => $validated['rating'] ?? 5.0,
            'reviews' => $validated['reviews'] ?? 0,
            'is_featured' => $request->has('is_featured'),
            'specs' => $specs,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Solar product updated successfully!');
    }

    /**
     * Delete Product
     */
    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    /**
     * Categories Management
     */
    public function categories()
    {
        $categories = Category::withCount('products')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store New Category
     */
    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Brands Management
     */
    public function brands()
    {
        $brands = Brand::withCount('products')->get();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Store New Brand
     */
    public function storeBrand(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        Brand::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully!');
    }

    // ============================================================
    // BLOG MANAGEMENT
    // ============================================================

    /**
     * Blog posts list
     */
    public function blogs(Request $request)
    {
        $search = $request->query('q', '');
        $query = Blog::latest();

        if (!empty($search)) {
            $query->where('title', 'like', "%{$search}%");
        }

        $blogs = $query->paginate(15);
        return view('admin.blogs.index', compact('blogs', 'search'));
    }

    /**
     * Show blog creation form
     */
    public function createBlog()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store new blog post
     */
    public function storeBlog(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'category'   => 'required|string|max:100',
            'author'     => 'required|string|max:150',
            'excerpt'    => 'required|string|max:500',
            'body'       => 'required|string',
            'cover_image'=> 'nullable|string|max:255',
            'read_time'  => 'nullable|integer|min:1',
        ]);

        Blog::create([
            'title'        => $validated['title'],
            'slug'         => Str::slug($validated['title']) . '-' . rand(100, 999),
            'category'     => $validated['category'],
            'author'       => $validated['author'],
            'excerpt'      => $validated['excerpt'],
            'body'         => $validated['body'],
            'cover_image'  => $validated['cover_image'] ?: 'images/product_solar_panel.png',
            'read_time'    => $validated['read_time'] ?? 5,
            'is_published' => $request->has('is_published'),
            'is_featured'  => $request->has('is_featured'),
            'published_at' => $request->has('is_published') ? now() : null,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created and published!');
    }

    /**
     * Show blog edit form
     */
    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update blog post
     */
    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'category'   => 'required|string|max:100',
            'author'     => 'required|string|max:150',
            'excerpt'    => 'required|string|max:500',
            'body'       => 'required|string',
            'cover_image'=> 'nullable|string|max:255',
            'read_time'  => 'nullable|integer|min:1',
        ]);

        $wasUnpublished = !$blog->is_published;
        $nowPublishing  = $request->has('is_published');

        $blog->update([
            'title'        => $validated['title'],
            'category'     => $validated['category'],
            'author'       => $validated['author'],
            'excerpt'      => $validated['excerpt'],
            'body'         => $validated['body'],
            'cover_image'  => $validated['cover_image'] ?: $blog->cover_image,
            'read_time'    => $validated['read_time'] ?? 5,
            'is_published' => $nowPublishing,
            'is_featured'  => $request->has('is_featured'),
            'published_at' => ($wasUnpublished && $nowPublishing) ? now() : $blog->published_at,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully!');
    }

    /**
     * Delete blog post
     */
    public function destroyBlog($id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted.');
    }
}
