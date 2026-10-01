<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompanyProfileController extends Controller
{
    /**
     * READ publik: siapkan profil perusahaan dan konten pilihan untuk halaman utama.
     */
    public function index()
    {
        $companyProfile = CompanyProfile::first();
        $products = Product::latest()->take(3)->get();
        $articles = Article::latest()->take(3)->get();
        $galleries = Gallery::latest()->take(4)->get();

        return view('landing-page.index', compact('companyProfile', 'products', 'articles', 'galleries'));
    }




    /**
     * Tidak digunakan: profil perusahaan dikelola sebagai satu data melalui edit/update.
     */
    public function create()
    {
        //
    }

    /**
     * Tidak digunakan: profil perusahaan dibuat otomatis saat formulir edit dibuka.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Tidak digunakan: halaman profil mengambil satu profil melalui landing().
     */
    public function show(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * READ/CREATE: ambil profil tunggal atau buat record kosong, lalu tampilkan formulir edit.
     */
    public function edit()
    {
        $data = CompanyProfile::firstOrCreate([]);

        return view('company-profile.edit', compact('data'));
    }

    /**
     * UPDATE: validasi dan simpan perubahan informasi pada profil perusahaan tunggal.
     */
    public function update(Request $request)
    {
        // UPDATE: validasi kolom profil yang dikirim, lalu simpan ke record tunggal perusahaan.
        $validated = $request->validate([
            'sejarah' => 'sometimes|nullable|string',
            'visi' => 'sometimes|nullable|string',
            'misi' => 'sometimes|nullable|string',
            'nilai_perusahaan' => 'sometimes|nullable|string',
        ]);

        $companyProfile = CompanyProfile::firstOrCreate([]);
        $companyProfile->update($validated);

        return back()->with('success', 'Profil perusahaan berhasil diperbarui.');
    }







    /**
     * Tidak digunakan: profil perusahaan tidak memiliki aksi hapus pada dashboard.
     */
    public function destroy(CompanyProfile $companyProfile)
    {
        //
    }
    public function landing(){
        // READ publik: tampilkan informasi lengkap perusahaan.
        $data = CompanyProfile::first();
        return view('landing-page.company-profile', compact('data'));
    }
}
