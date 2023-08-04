<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use App\Models\DataMahasiswaModel;

class MahasiswaController extends Controller
{
    private $baseResponse;
    public function __construct()
    {
        $this->baseResponse = array("status" => null, "code" => null, "data" => null, "msg" => null);
    }
    function mahasiswaPage()
    {
        $dataJurusan = Config::get('helper.jurusan');
        $dr = ['dataJurusan' => $dataJurusan];
        return view('app.mahasiswa.mahasiswa', $dr);
    }
    public function addProcess(Request $request)
    {
        $mhs = new DataMahasiswaModel();
        $mhs->kd_mahasiswa = Str::uuid();
        $mhs->nik = $request->nik;
        $mhs->nim = $request->nim;
        $mhs->nama_lengkap = $request->nama;
        $mhs->tempat_lahir = $request->tempatLahir;
        $mhs->tanggal_lahir = Carbon::parse($request->tanggalLahir)->format("Y-m-d");
        $mhs->jurusan = $request->jurusan;
        $mhs->nomor_handphone = $request->hp;
        $mhs->email = $request->email;
        $mhs->username = $request->username;
        $mhs->alamat = $request->alamat;
        $mhs->active = "1";
        $mhs->save();
        return \Response::json($this->baseResponse);
    }
}
