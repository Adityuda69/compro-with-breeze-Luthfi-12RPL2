<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Pengembangan Website',
                'description' => 'Website responsif untuk profil perusahaan, layanan, dan kebutuhan bisnis.',
                'image' => 'products/pengembangan-website.jpg',
            ],
            [
                'title' => 'Aplikasi Bisnis',
                'description' => 'Aplikasi web yang membantu tim mengelola proses kerja dan informasi.',
                'image' => 'products/aplikasi-bisnis.jpg',
            ],
            [
                'title' => 'Konsultasi Digital',
                'description' => 'Pendampingan untuk merencanakan solusi teknologi sesuai kebutuhan organisasi.',
                'image' => 'products/konsultasi-digital.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(['title' => $product['title']], $product);
        }
    }
}
