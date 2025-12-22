<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/products', function (Request $request) {
	$query = Product::with('category')->latest();

	if ($request->filled('q')) {
		$q = $request->q;
		$query->where('name', 'like', "%{$q}%");
	}

	if ($request->filled('category_id')) {
		$query->where('category_id', $request->category_id);
	}

	return $query->paginate(15);
});

Route::get('/products/{product}', function (Product $product) {
	return $product->load('category');
});

Route::get('/categories', function () {
	return Category::orderBy('name')->get();
});
