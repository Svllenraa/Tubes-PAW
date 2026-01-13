<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'order_id' => 'nullable|exists:orders,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $user = $request->user();

        // if order_id provided, ensure order belongs to user and contains product
        if (! empty($data['order_id'])) {
            $order = Order::where('id', $data['order_id'])->where('user_id', $user->id)->first();
            if (! $order) {
                return back()->withErrors('Order tidak ditemukan atau bukan milik Anda.');
            }

            $hasProduct = $order->items()->where('product_id', $data['product_id'])->exists();
            if (! $hasProduct) {
                return back()->withErrors('Produk tidak ada pada order tersebut.');
            }
        }

        // prevent duplicate rating for same user/product/order
        $exists = Rating::where('user_id', $user->id)
            ->where('product_id', $data['product_id'])
            ->where('order_id', $data['order_id'] ?? null)
            ->exists();

        if ($exists) {
            return back()->with('status', 'Anda sudah memberikan rating untuk produk ini pada pesanan tersebut.');
        }

        Rating::create([
            'user_id' => $user->id,
            'product_id' => $data['product_id'],
            'order_id' => $data['order_id'] ?? null,
            'rating' => $data['rating'],
            'comment' => $data['comment'] ?? null,
        ]);

        return back()->with('status', 'Terima kasih! Rating Anda telah disimpan.');
    }
}
