<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Menampilkan daftar artikel terbaru pada halaman landing pengunjung.
    public function landing()
    {
        $data = Article::latest()->get();

        //return 'ini di method landing class nya articlecontroller';
        return view('landing-page.article', compact('data'));;
    }


    // READ publik: menampilkan daftar artikel terbaru untuk pengunjung.
    public function publicIndex()
    {
        $data = Article::latest()->get();
        return view('public-index', compact('data'));
    }

    // READ publik: menampilkan isi artikel yang dipilih pengunjung.
    public function publicShow(Article $article)
    {
        return view('public-show', compact('article'));
    }


    // READ admin: menampilkan daftar artikel terbaru pada dashboard.
    public function index()
    {
        $data = Article::latest()->get();
        return view('Article.index', compact('data')); // Tampilan tabel admin
    }

    // CREATE: menampilkan formulir untuk menulis artikel baru.
    public function create()
    {
        return view('article.create');
    }

    // CREATE: validasi data, simpan gambar jika diunggah, lalu buat artikel.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:10',
            'image' => 'required|image',
        ]);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('article','public');
            $validated['image'] = $imagePath;
        }

        Article::create($validated);

        return redirect('/dashboard/article')->with('success','Berhasil ditambahkan');
    }

    // READ admin: menampilkan detail satu artikel.
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    // UPDATE: menampilkan formulir edit beserta data artikel yang dipilih.
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    // UPDATE: validasi perubahan dan ganti gambar hanya jika gambar baru diunggah.
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:10',
            'image' => 'nullable|image',
        ]);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('article','public');
            $validated['image'] = $imagePath;
        }

        $article->update($validated);

        return redirect('dashboard/article')->with('success', 'Data berhasil diupdate 😊');
    }

    // DELETE: menghapus artikel yang dipilih dari basis data.
    public function destroy(Article $article)
    {
        $article->delete();

        return back()->with('success', 'Berhasil dihapus');
    }
}
