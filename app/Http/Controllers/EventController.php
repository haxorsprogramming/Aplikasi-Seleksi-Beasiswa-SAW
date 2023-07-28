<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use App\Models\EventModel;
class EventController extends Controller
{
    public function eventPage()
    {
        $dataEvent = EventModel::where('active', '1')->get();
        $dr = ['dataEvent' => $dataEvent];
        return view('app.event.event', $dr);
    }
    public function addProcess(Request $request)
    {
        $date1 = Carbon::parse('2022-01-10');
        $date2 = Carbon::parse('2022-01-01');
        $diff = $date1->diffInDays($date2);

        $statusInsert = "";

        $cekEvent = $this->checkNamaEvent($request->nama);
        if($cekEvent){
            $kdEvent = Str::uuid();
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

    public function deleteProcess(Request $request)
    {
        EventModel::where('kd_event', $request->kdEvent)->delete();
        $dr = [
            'status' => 'success'
        ];
        return \Response::json($dr);
    }

    public function apiDetail(Request $request)
    {
        $kdEvent = $request->kdEvent;
        $dEvent = EventModel::where('kd_event', $kdEvent)->first();

        $dr = [
            'data' => $dEvent,
            'status' => true,
            'error' => null
        ];
        return \Response::json($dr);
    }

    function checkNamaEvent(string $namaEvent):bool
    {
        $statusCek = true;
        $qCekEvent = EventModel::where('nama_event', $namaEvent)->count();
        if($qCekEvent > 0){
            $statusCek = false;
        }
        return $statusCek;
    }

}
