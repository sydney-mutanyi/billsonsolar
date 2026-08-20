<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Solution;
use App\Models\Blog;

class PageController extends Controller
{
    /**
     * Homepage
     */
    public function home()
    {
        $featuredProducts = Product::with(['category', 'brand'])
            ->where('is_active', true)
            ->where('is_featured', true)
            ->take(4)
            ->get();

        $categories = Category::all();

        return view('welcome', compact('featuredProducts', 'categories'));
    }

    /**
     * Shop Products Catalog
     */
    public function shop(Request $request)
    {
        $categorySlug = $request->query('category', 'all');
        $brandSlug = $request->query('brand', 'all');
        $search = $request->query('q', '');

        $query = Product::with(['category', 'brand'])->where('is_active', true);

        if ($categorySlug !== 'all') {
            $query->whereHas('category', function($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        if ($brandSlug !== 'all') {
            $query->whereHas('brand', function($q) use ($brandSlug) {
                $q->where('slug', $brandSlug);
            });
        }

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('brand', function($bQuery) use ($search) {
                      $bQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $products = $query->get();
        $categories = Category::all();
        $brands = Brand::all();

        return view('pages.shop', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'selectedCategory' => $categorySlug,
            'selectedBrand' => $brandSlug,
            'search' => $search,
        ]);
    }

    /**
     * Product Details Page
     */
    public function productDetail($slug = null)
    {
        $product = Product::with(['category', 'brand'])
            ->where('slug', $slug)
            ->first();

        if (!$product) {
            $product = Product::with(['category', 'brand'])->firstOrFail();
        }

        $relatedProducts = Product::with(['category', 'brand'])
            ->where('id', '!=', $product->id)
            ->where('category_id', $product->category_id)
            ->take(4)
            ->get();

        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::with(['category', 'brand'])
                ->where('id', '!=', $product->id)
                ->take(4)
                ->get();
        }

        return view('pages.product-detail', compact('product', 'relatedProducts'));
    }

    /**
     * Solar Solutions Page
     */
    public function solutions()
    {
        $solutions = Solution::all();
        return view('pages.solutions', compact('solutions'));
    }

    /**
     * Solar Installation & Engineering Page
     */
    public function installation()
    {
        return view('pages.installation');
    }

    /**
     * Cart & System Quote Builder Page
     */
    public function cart()
    {
        $featuredProducts = Product::with(['category', 'brand'])->take(2)->get();
        $items = [];

        foreach ($featuredProducts as $index => $fp) {
            $items[] = [
                'slug' => $fp->slug,
                'title' => $fp->title,
                'brand' => $fp->brand ? $fp->brand->name : 'Bills On Solar',
                'price' => $fp->price,
                'qty' => $index === 0 ? 6 : 1,
                'image' => $fp->image ?: 'images/product_solar_panel.png'
            ];
        }

        return view('pages.cart', compact('items'));
    }

    /**
     * Contact Us Page
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * About Us Page
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Public Blog Listing
     */
    public function blog(Request $request)
    {
        $category = $request->query('category', '');

        $query = Blog::published()->latest('published_at');

        if (!empty($category)) {
            $query->where('category', $category);
        }

        $posts = $query->paginate(9);
        $featured = Blog::published()->where('is_featured', true)->latest()->take(1)->first();
        $categories = Blog::published()->select('category')->distinct()->pluck('category');

        return view('pages.blog', compact('posts', 'featured', 'categories', 'category'));
    }

    /**
     * Single Blog Post
     */
    public function blogPost($slug)
    {
        $post = Blog::published()->where('slug', $slug)->firstOrFail();

        $related = Blog::published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.blog-post', compact('post', 'related'));
    }
}

