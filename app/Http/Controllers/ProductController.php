<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Tampilan utama produk dengan fitur pencarian dan filter.
     */
    public function index(Request $request)
    {
        // Gunakan Eager Loading 'category' untuk mencegah N+1 query
        $query = Product::with('category')->latest();

        // Pencarian Nama
        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        // Filter Kategori (berdasarkan ID)
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(12)->appends($request->only('q', 'category_id'));
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Menampilkan detail produk DAN produk terkait.
     */
    public function show(Product $product)
    {
        // 1. Load data kategori produk utama
        $product->load('category');

        // 2. Logic Backend Produk Terkait:
        // Mencari produk dengan category_id yang sama, namun mengecualikan dirinya sendiri.
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }


}
