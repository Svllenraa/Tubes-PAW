<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Menampilkan semua kategori yang tersedia.
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Menampilkan produk berdasarkan kategori.
     */
    public function show($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        $products = $category->products()->with('category')->latest()->paginate(12);

        $categories = Category::all();
        $categoryName = $category->name;

        return view('categories.show', compact('products', 'categories', 'categoryName', 'category'));
    }
}
