<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products for public view.
     */
    public function index(Request $request)
    {
        $query = Product::with('category')->latest();

        if ($request->filled('q')) {
            $query->where('name', 'like', '%'.$request->q.'%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(12)->appends($request->only('q', 'category_id'));
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Display a single product.
     */
    public function show(Product $product)
    {
        $product->load('category');

        return view('products.show', compact('product'));
    }
}
