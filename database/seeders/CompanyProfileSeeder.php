<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyProfile::firstOrCreate([], [
            'sejarah' => 'PT Digital Solusi Nusantara membantu organisasi berkembang melalui solusi digital yang praktis dan tepercaya.',
            'visi' => 'Menjadi mitra teknologi yang mendorong kemajuan bisnis Indonesia.',
            'misi' => 'Menghadirkan layanan digital yang andal, mudah digunakan, dan sesuai kebutuhan pelanggan.',
            'nilai_perusahaan' => 'Integritas, kolaborasi, inovasi, dan fokus pada pelanggan.',
        ]);
    }
}
