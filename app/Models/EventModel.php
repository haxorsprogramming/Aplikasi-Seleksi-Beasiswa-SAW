<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $table = "tbl_event_seleksi";
    public $timestamps = false;
    protected $fillable = [
        'kd_event',
        'nama_event',
        'keterangan',
        'kuota',
        'tanggal_mulai',
        'tanggal_selesai',
        'status_event',
        'active'
    ];
}
