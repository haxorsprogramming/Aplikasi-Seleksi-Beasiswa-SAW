<?php

namespace App\Http\Controllers;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Exception;

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
        $dataJurusan = Config::get("helper.jurusan");
        $dataMahasiswa = DataMahasiswaModel::all();
        $dr = [
            "dataJurusan" => $dataJurusan,
            "dataMahasiswa" => $dataMahasiswa
        ];
        return view('app.mahasiswa.mahasiswa', $dr);
    }
    public function addProcess(Request $request)
    {
        $cekMhs = $this->cekNim($request->nim);
        if($cekMhs){
            // fotoProfil
            $picUtama = $request->fotoProfil;
            $namaPic = $request->nim.".jpg";
            $image_array_1 = explode(";", $picUtama);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            file_put_contents('file_upload/foto_mahasiswa/'.$namaPic, $data);

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
            $mhs->username = str_replace(" ","", $request->username);;
            $mhs->alamat = $request->alamat;
            $mhs->active = "1";
            $mhs->save();
            $this->baseResponse['status'] = true;
            $this->baseResponse['code'] = 200;
            $this->baseResponse['msg'] = "Sukses menambahkan mahasiswa ...";
        }else{
            $this->baseResponse['status'] = false;
            $this->baseResponse['code'] = 400;
            $this->baseResponse['msg'] = "Duplikasi NIM (Nomor Induk Mahasiswa) !!!";
        }

        return \Response::json($this->baseResponse);
    }

    public function deleteProcess(Request $request)
    {
        $namaPic = $request->nim.".jpg";
        // hapus foto
        try {
            unlink("file_upload/foto_mahasiswa/".$namaPic);
        } finally {
            DataMahasiswaModel::where('nim', $request->nim)->delete();
        }


        $this->baseResponse['status'] = true;
        $this->baseResponse['code'] = 200;
        $this->baseResponse['msg'] = "Sukses menghapus data mahasiswa ...";
        return \Response::json($this->baseResponse);
    }

    function cekNim(string $nim):bool
    {
        $statusCek = true;
        $qCekEvent = DataMahasiswaModel::where('nim', $nim)->count();
        if($qCekEvent > 0){
            $statusCek = false;
        }
        return $statusCek;
    }

}
