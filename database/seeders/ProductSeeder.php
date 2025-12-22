<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // sample categories
        $categories = collect([
            ['name' => 'Clothing', 'slug' => 'clothing'],
            ['name' => 'Accessories', 'slug' => 'accessories'],
            ['name' => 'Home', 'slug' => 'home'],
        ])->map(function ($c) {
            return Category::firstOrCreate(['slug' => $c['slug']], ['name' => $c['name']]);
        });

        // sample products
        $samples = [
            [
                'name' => 'Basic T-Shirt',
                'slug' => 'basic-t-shirt',
                'description' => 'Comfortable cotton t-shirt in multiple colors.',
                'price' => 99000,
                'category' => 'clothing',
                'image' => 'products/g14UDFBrdgXZ8cRgKNziSjVfJluSEfPnp0vZbfZQ.jpg',
            ],
            [
                'name' => 'Leather Wallet',
                'slug' => 'leather-wallet',
                'description' => 'Slim leather wallet with multiple card slots.',
                'price' => 149000,
                'category' => 'accessories',
                'image' => 'products/pfZ3j3MIqtqx0RUAOxbdwxj5PBG2t6nAzTB8tu8d.jpg',
            ],
            [
                'name' => 'Ceramic Mug',
                'slug' => 'ceramic-mug',
                'description' => 'Handmade ceramic mug, dishwasher safe.',
                'price' => 65000,
                'category' => 'home',
                'image' => 'products/QAGIK5isNBEYC9YwCB66OAdjJzXaBbbsXpikNFIs.jpg',
            ],
        ];

        foreach ($samples as $s) {
            $category = Category::where('slug', $s['category'])->first();

            Product::updateOrCreate(
                ['slug' => $s['slug']],
                [
                    'name' => $s['name'],
                    'description' => $s['description'],
                    'price' => $s['price'],
                    'category_id' => $category?->id,
                    'image' => $s['image'] ?? null,
                ]
            );
        }
    }
}
