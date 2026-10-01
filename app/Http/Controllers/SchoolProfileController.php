<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SchoolProfile;
class SchoolProfileController extends Controller
{
    public function index()
    {
        $dataSaya = [
            'nama' => 'luthfiana',
            'kelas' => 'xiii rpl 2',
            'alamat' => 'pamotan',
            'hobi' => 'main'
        ];
        // ini ngambil data profile
        $dataProfile = SchoolProfile::find(1);

        // mengirim datanya ke tampilan
        return view('landing-page.index', compact(['dataProfile', 'dataSaya']));
    }
    public function index2()
    {
        $dataArticle = [
            'judul' => 'kekalahan kerajaan singosari',
            'deskripsi' => 'ini deskripsi tentang kekalahan raja singosari, dia gagal dalam peprangan.',
            'kategori' => 'perang',

        ];
        // ini ngambil data profile
        $dataProfile = SchoolProfile::find(1);

        // mengirim datanya ke tampilan
        return view('landing-page.index2', compact(['dataProfile', 'dataArticle']));
    }
}
