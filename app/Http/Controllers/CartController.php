<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $items = [];
        $total = 0;

        foreach ($cart as $productId => $qty) {
            $product = Product::find($productId);
            if (! $product) continue;
            $items[] = ['product' => $product, 'qty' => $qty];
            $total += ($product->price ?? 0) * $qty;
        }

        return view('cart.index', compact('items', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate(["product_id" => "required|integer|exists:products,id", "qty" => "integer|min:1"]);
        $productId = $request->product_id;
        $qty = max(1, (int) $request->qty ?: 1);

        $cart = $request->session()->get('cart', []);
        $cart[$productId] = ($cart[$productId] ?? 0) + $qty;
        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function update(Request $request)
    {
        $request->validate(["product_id" => "required|integer|exists:products,id", "qty" => "required|integer|min:0"]);
        $productId = $request->product_id;
        $qty = (int) $request->qty;

        $cart = $request->session()->get('cart', []);
        if ($qty <= 0) {
            unset($cart[$productId]);
        } else {
            $cart[$productId] = $qty;
        }
        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Cart updated');
    }

    public function remove(Request $request)
    {
        $request->validate(["product_id" => "required|integer|exists:products,id"]);
        $productId = $request->product_id;
        $cart = $request->session()->get('cart', []);
        unset($cart[$productId]);
        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Item removed');
    }
}
