<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * READ: tampilkan seluruh produk terbaru pada daftar produk admin.
     */
    public function index()
    {
        $data = Product::latest()->get();
        return view('product.index', compact('data'));
    }

    public function publicIndex()
    {
        // READ publik: ambil produk terbaru untuk ditampilkan kepada pengunjung.
        $products = Product::latest()->get();

        return view('product.public-index', compact('products'));
    }

    /**
     * CREATE: tampilkan formulir untuk memasukkan produk baru.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * CREATE: validasi data, simpan gambar ke storage publik, lalu buat data produk.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'image' => 'required|image'

        ]);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('Product', 'public');
            if (! $imagePath) {
                return back()->withInput()->with('failed', 'Gambar produk gagal disimpan.');
            }

            $validated['image'] = $imagePath;
        }

        Product::create($validated);

        return redirect('/dashboard/product')->with('success', 'berhasil ditambahkan');
    }

    /**
     * READ: tampilkan detail satu produk pada halaman admin.
     */
    public function show(Product $product)
    {
        $data = Product::find($product->id);
        return view('product.show', compact('data'));
    }

    public function publicShow(Product $product)
    {
        // READ publik: tampilkan detail produk yang dipilih pengunjung.
        return view('product.public-show', compact('product'));
    }

    /**
     * UPDATE: tampilkan formulir edit dengan data produk yang sudah ada.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * UPDATE: validasi perubahan, simpan gambar pengganti bila ada,
     * dan hapus gambar lama setelah data berhasil diperbarui.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'image' => 'nullable|image',
        ]);

        $oldImage = $product->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Product', 'public');
            if (! $imagePath) {
                return back()->withInput()->with('failed', 'Gambar produk gagal disimpan.');
            }

            $validated['image'] = $imagePath;
        }

        if (! $product->update($validated)) {
            if (isset($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            return back()->withInput()->with('failed', 'Produk gagal diperbarui.');
        }

        if (isset($imagePath) && $oldImage && ! Storage::disk('public')->delete($oldImage)) {
            return redirect('/dashboard/product')->with('failed', 'Produk berhasil diperbarui, tetapi gambar lama gagal dihapus.');
        }

        return redirect('/dashboard/product')->with('success', 'Produk berhasil diperbarui.');

    }

    /**
     * DELETE: hapus data produk, lalu hapus file gambarnya dari storage publik.
     */
    public function destroy(Product $product)
    {
        $image = $product->image;

        if (! $product->delete()) {
            return back()->with('failed', 'Produk gagal dihapus.');
        }

        if ($image && ! Storage::disk('public')->delete($image)) {
            return back()->with('failed', 'Produk berhasil dihapus, tetapi file gambarnya gagal dihapus.');
        }

        return back()->with('success', 'Produk berhasil dihapus.');
    }
}
