<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        // READ admin: tampilkan semua foto galeri, dimulai dari yang terbaru.
        $data = Gallery::latest()->get();

        return view('gallery.index', compact('data'));
    }

    public function create()
    {
        // CREATE: tampilkan formulir untuk menambahkan foto galeri.
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        // CREATE: validasi judul dan format/ukuran foto sebelum menyimpannya.
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('gallery', 'public');
        if (! $photoPath) {
            // Jangan buat record bila file foto gagal masuk ke storage.
            return back()->withInput()->with('failed', 'Foto gagal disimpan.');
        }

        $validated['photo'] = $photoPath;
        if (! Gallery::create($validated)) {
            // Bersihkan file baru bila penyimpanan record galeri gagal.
            Storage::disk('public')->delete($photoPath);

            return back()->withInput()->with('failed', 'Data galeri gagal disimpan.');
        }

        return redirect()->route('dashboard.galleries.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        // UPDATE: tampilkan formulir edit dengan data foto galeri terpilih.
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        // UPDATE: foto bersifat opsional agar judul dapat diubah tanpa mengganti foto.
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $oldPhoto = $gallery->photo;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('gallery', 'public');
            if (! $photoPath) {
                return back()->withInput()->with('failed', 'Foto gagal disimpan.');
            }

            $validated['photo'] = $photoPath;
        }

        if (! $gallery->update($validated)) {
            // Jika update record gagal, hapus foto pengganti agar tidak menjadi file yatim.
            if (isset($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }

            return back()->withInput()->with('failed', 'Data galeri gagal diperbarui.');
        }

        if (isset($photoPath) && $oldPhoto && ! Storage::disk('public')->delete($oldPhoto)) {
            // Data sudah diperbarui; laporkan terpisah jika file lama gagal dibersihkan.
            return redirect()->route('dashboard.galleries.index')
                ->with('failed', 'Data berhasil diperbarui, tetapi foto lama gagal dihapus.');
        }

        return redirect()->route('dashboard.galleries.index')->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        // DELETE: hapus record galeri terlebih dahulu, kemudian bersihkan file fotonya.
        $photo = $gallery->photo;

        if (! $gallery->delete()) {
            return back()->with('failed', 'Data galeri gagal dihapus.');
        }

        if ($photo && ! Storage::disk('public')->delete($photo)) {
            return back()->with('failed', 'Data berhasil dihapus, tetapi file foto gagal dihapus.');
        }

        return back()->with('success', 'Foto berhasil dihapus.');
    }

    public function publicIndex()
    {
        // READ publik: tampilkan koleksi foto galeri kepada pengunjung.
        $galleries = Gallery::latest()->get();

        return view('gallery.public-index', compact('galleries'));
    }
}
