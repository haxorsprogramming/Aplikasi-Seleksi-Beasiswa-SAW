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
        $date1 = Carbon::parse('2022-01-10');
        $date2 = Carbon::parse('2022-01-01');
        $diff = $date1->diffInDays($date2);

        $statusInsert = "";

        $cekEvent = $this->CheckNamaEvent($request->nama);
        if($cekEvent){
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
            $statusInsert = "SUCCESS";
        }else{
            $statusInsert = "DOUBLE_NAME";
        }

        $dr = [
          'status' => $statusInsert
        ];
        return \Response::json($dr);
    }

    public function CheckNamaEvent(string $namaEvent):bool
    {
        $statusCek = true;
        $qCekEvent = EventModel::where('nama_event', $namaEvent)->count();
        if($qCekEvent > 0){
            $statusCek = false;
        }
        return $statusCek;
    }

}
