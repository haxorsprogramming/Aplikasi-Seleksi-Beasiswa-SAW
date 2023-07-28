<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMahasiswaModel extends Model
{
    protected $table = "tbl_data_mahasiswa";
    public $timestamps = false;
    protected $fillable = [
        'kd_mahasiswa',
        'nik',
        'nim',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jurusan',
        'nomor_handphone',
        'email',
        'username',
        'alamat',
        'active'
    ];
}
