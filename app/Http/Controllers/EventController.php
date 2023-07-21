<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
class EventController extends Controller
{
    public function eventPage()
    {
        return view('app.event.event');
    }
    public function addProcess(Request $request)
    {
        $kdEvent = substr(Str::upper(Str::slug($request->nama, '-')), 0, 10) ;
        $ne = new EventModel();
        $ne->kd_event = $kdEvent;
        $ne->nama_event = $request->nama;
        $ne->keterangan = $request->keterangan;
        $ne->kuota = $request->kuota;
        $ne->tanggal_mulai = Carbon::parse($request->tglMulai)->format("Y-m-d");
        $ne->tanggal_selesai = Carbon::parse($request->tglSelesai)->format("Y-m-d");
        $ne->status_event = "PENDING";
        $ne->active = "1";
        $ne->save();
        $dr = [
          'status' => $request->nama
        ];
        return \Response::json($dr);
    }
}
