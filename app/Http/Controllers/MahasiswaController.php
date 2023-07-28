<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    function mahasiswaPage()
    {
        return view('app.mahasiswa.mahasiswa');
    }
}
