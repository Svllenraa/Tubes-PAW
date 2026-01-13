<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard yang sesuai berdasarkan mode login (Admin/User).
     * Sudah dilengkapi fitur Search dan Dynamic Cart Count.
     */
    public function index(Request $request): View
    {
        // Mengambil mode dari session
        $mode = $request->session()->get('login_as');
        
        // Mengambil kata kunci pencarian jika ada
        $search = $request->query('q');

        if ($mode === 'admin') {
            // --- DATA UNTUK DASHBOARD ADMIN ---
            $data = [
                'mode'             => $mode,
                'totalProducts'    => Product::count(),
                'totalCategories'  => Category::count(),
                'totalUsers'       => User::count(),
                'totalOrders'      => Order::count(),
                'recentProducts'   => Product::with('category')->latest()->take(5)->get(),
                'recentOrders'     => Order::with('user')->latest()->take(5)->get(),
            ];

            return view('dashboard', $data);

        } else {
            // --- DATA UNTUK DASHBOARD USER (BAJAMAS) ---
            
            // 1. Ambil semua kategori untuk filter menu
            $categories = Category::select('id', 'name', 'slug')->get();

            // 2. Query Produk Populer + Fitur Search
            $popularProducts = Product::with('category')
                ->when($search, function ($query, $search) {
                    return $query->where('name', 'like', "%{$search}%")
                                 ->orWhere('description', 'like', "%{$search}%");
                })
                ->orderBy('created_at', 'desc')
                ->take(10) // Kita ambil 10 agar tampilan lebih penuh
                ->get();

            // 3. Banner Produk (Random)
            $bannerProduct = Product::inRandomOrder()->first();

            // 4. Hitung jumlah item di keranjang dari Session (Dinamis)
            $cart = $request->session()->get('cart', []);
            $cartCount = array_sum($cart); // Menjumlahkan semua quantity di keranjang

            return view('dashboard', [
                'mode'            => $mode,
                'categories'      => $categories,
                'popularProducts' => $popularProducts,
                'bannerProduct'   => $bannerProduct,
                'cartCount'       => $cartCount,
                'search'          => $search, // Dikirim balik agar input search tidak kosong setelah enter
            ]);
        }
    }
}