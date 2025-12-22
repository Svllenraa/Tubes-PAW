<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function create(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->withErrors('Cart is empty');
        }

        $items = [];
        $total = 0;
        foreach ($cart as $productId => $qty) {
            $product = Product::find($productId);
            if (! $product) continue;
            $items[] = ['product' => $product, 'qty' => $qty];
            $total += ($product->price ?? 0) * $qty;
        }

        return view('checkout.create', compact('items', 'total'));
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $cart = $request->session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->withErrors('Cart is empty');
        }

        $request->validate([
            'recipient_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:50',
        ]);

        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => $user->id,
                'number' => Str::upper(Str::random(10)),
                'total' => 0,
                'status' => 'pending',
                'recipient_name' => $request->recipient_name,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

            $total = 0;
            foreach ($cart as $productId => $qty) {
                $product = Product::find($productId);
                if (! $product) continue;
                $price = $product->price ?? 0;
                $subtotal = $price * $qty;
                $total += $subtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'price' => $price,
                ]);
            }

            $order->update(['total' => $total]);
            DB::commit();

            $request->session()->forget('cart');
            return redirect()->route('orders.show', ['order' => $order->id])->with('success', 'Order placed successfully');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->withErrors('Failed to place order');
        }
    }
}
