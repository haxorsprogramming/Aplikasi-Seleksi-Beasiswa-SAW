<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    function mahasiswaPage()
    {
        $dataJurusan = Config::get('helper.jurusan');
        $dr = ['dataJurusan' => $dataJurusan];
        return view('app.mahasiswa.mahasiswa', $dr);
    }
}
