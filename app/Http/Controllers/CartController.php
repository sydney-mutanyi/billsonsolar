<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display the shopping cart & system quote summary.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $items = array_values($cart);

        $subtotal = 0;
        $orderLines = [];

        foreach ($items as $item) {
            $lineTotal = $item['price'] * $item['qty'];
            $subtotal += $lineTotal;
            $orderLines[] = "• {$item['qty']}x {$item['title']} @ KES " . number_format($item['price']) . " = KES " . number_format($lineTotal);
        }

        $waMessage = "Hello Bills On Solar! I would like to request an official quote / order for my cart:\n\n";
        if (!empty($orderLines)) {
            $waMessage .= implode("\n", $orderLines) . "\n\n";
            $waMessage .= "*Equipment Subtotal: KES " . number_format($subtotal) . "*\n";
            $waMessage .= "Please confirm availability and delivery to my location.";
        } else {
            $waMessage .= "I have an inquiry regarding solar equipment and installation packages.";
        }

        $whatsappUrl = "https://wa.me/254702156134?text=" . urlencode($waMessage);

        return view('pages.cart', compact('items', 'subtotal', 'whatsappUrl'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'nullable|integer|min:1',
        ]);

        $productId = (int) $request->input('product_id');
        $qty = (int) ($request->input('qty') ?: 1);

        $product = Product::with('brand')->findOrFail($productId);
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['qty'] += $qty;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'slug' => $product->slug,
                'title' => $product->title,
                'brand' => $product->brand ? $product->brand->name : 'Bills On Solar',
                'price' => (float) $product->price,
                'qty' => $qty,
                'image' => $product->image ?: 'images/product_solar_panel.png',
            ];
        }

        session()->put('cart', $cart);

        $cartCount = array_sum(array_column($cart, 'qty'));

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "{$product->title} added to cart!",
                'cartCount' => $cartCount,
            ]);
        }

        return redirect()->back()->with('success', "{$product->title} has been added to your cart.");
    }

    /**
     * Update product quantity in cart.
     */
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'qty' => 'required|integer|min:0',
        ]);

        $productId = (int) $request->input('product_id');
        $qty = (int) $request->input('qty');

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            if ($qty <= 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId]['qty'] = $qty;
            }
            session()->put('cart', $cart);
        }

        $cartCount = array_sum(array_column($cart, 'qty'));

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Cart updated successfully!',
                'cartCount' => $cartCount,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Cart updated successfully.');
    }

    /**
     * Remove a product from the cart.
     */
    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        if ($request->expectsJson() || $request->ajax()) {
            $cartCount = array_sum(array_column($cart, 'qty'));
            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart.',
                'cartCount' => $cartCount,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Item removed from cart.');
    }

    /**
     * Clear all products from the cart.
     */
    public function clear(Request $request)
    {
        session()->forget('cart');

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Cart cleared.',
                'cartCount' => 0,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Your cart has been cleared.');
    }
}
