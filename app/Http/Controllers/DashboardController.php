<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the appropriate dashboard based on session or user role.
     */
    public function index(Request $request): View
    {
        $mode = $request->session()->get('login_as');

        // Kategori (kemasan makanan, minuman, dll) - adjusted for eco-friendly packaged goods
        $categories = Category::select('id', 'name')->get();

        // Produk populer (contoh: paling banyak dibeli) - using created_at as proxy since sold_count not available
        $popularProducts = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Banner / produk random for recycled product image
        $bannerProduct = Product::inRandomOrder()->first();

        // Cart count - set to 0 since cart not implemented
        $cartCount = 0;

        return view('dashboard', [
            'mode' => $mode,
            'categories' => $categories,
            'popularProducts' => $popularProducts,
            'bannerProduct' => $bannerProduct,
            'cartCount' => $cartCount,
        ]);
    }
}
