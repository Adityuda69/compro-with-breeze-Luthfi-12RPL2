<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Memulai Transformasi Digital dengan Langkah Terukur',
                'excerpt' => 'Cara menyusun prioritas digital yang selaras dengan kebutuhan bisnis.',
                'content' => 'Transformasi digital yang berkelanjutan dimulai dengan memahami proses dan kebutuhan pengguna. Tetapkan prioritas, uji solusi secara bertahap, lalu evaluasi hasilnya.',
                'image' => 'articles/transformasi-digital.jpg',
                'published_at' => '2026-09-01 09:00:00',
            ],
            [
                'title' => 'Mengapa Keamanan Data Perlu Direncanakan Sejak Awal',
                'excerpt' => 'Praktik dasar untuk membangun layanan digital yang lebih aman.',
                'content' => 'Perlindungan data adalah bagian dari rancangan produk. Batasi akses sesuai kebutuhan, gunakan pembaruan rutin, dan siapkan proses pencadangan serta pemulihan.',
                'image' => 'articles/keamanan-data.jpg',
                'published_at' => '2026-09-08 09:00:00',
            ],
            [
                'title' => 'Menyederhanakan Proses Kerja dengan Aplikasi Terintegrasi',
                'excerpt' => 'Integrasi sistem dapat mengurangi pekerjaan berulang dan membantu tim.',
                'content' => 'Aplikasi yang terintegrasi membantu tim berbagi informasi secara konsisten. Mulailah dari proses yang paling sering diulang dan ukur dampaknya terhadap waktu serta kualitas kerja.',
                'image' => 'articles/aplikasi-terintegrasi.jpg',
                'published_at' => '2026-09-15 09:00:00',
            ],
        ];

        foreach ($articles as $article) {
            Article::firstOrCreate(['title' => $article['title']], $article);
        }
    }
}
