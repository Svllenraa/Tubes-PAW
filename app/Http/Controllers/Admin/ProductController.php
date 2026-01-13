<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // Pastikan ini ada

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(\App\Http\Middleware\AdminMiddleware::class);
    }

    public function index(Request $request)
    {
        $query = Product::with('category')->latest();

        if ($request->filled('q')) {
            $query->where('name', 'like', '%'.$request->q.'%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(15)->appends($request->only('q', 'category_id'));
        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            // Menyimpan ke storage/app/public/products
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        
        $data['slug'] = Str::slug($data['name']).'-'.Str::random(6);
        Product::create($data);
        
        return redirect()->route('admin.products.index')->with('success', 'Product created');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            // Hapus foto lama dari folder storage jika ada foto baru yang diupload
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // Simpan foto baru
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        
        $product->update($data);
        
        return redirect()->route('admin.products.index')->with('success', 'Product updated');
    }

    public function destroy(Product $product)
    {
        // Hapus file fisik dari storage sebelum menghapus data di database
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();
        
        return redirect()->route('admin.products.index')->with('success', 'Product deleted');
    }
}