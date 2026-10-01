<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $photos = [
            'Diskusi kebutuhan pelanggan' => 'galleries/diskusi-pelanggan.jpg',
            'Perencanaan solusi digital' => 'galleries/perencanaan-solusi.jpg',
            'Kolaborasi tim proyek' => 'galleries/kolaborasi-tim.jpg',
            'Pengembangan aplikasi' => 'galleries/pengembangan-aplikasi.jpg',
            'Pengujian layanan' => 'galleries/pengujian-layanan.jpg',
            'Pendampingan implementasi' => 'galleries/pendampingan-implementasi.jpg',
        ];

        foreach ($photos as $title => $photo) {
            Gallery::firstOrCreate(['title' => $title], ['photo' => $photo]);
        }
    }
}
