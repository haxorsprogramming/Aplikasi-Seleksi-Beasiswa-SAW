<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use App\Models\EventModel;
class EventController extends Controller
{

    private $baseResponse;
    public function __construct()
    {
        $this->baseResponse = array("status" => null, "code" => null, "data" => null, "msg" => null);
    }
    public function eventPage()
    {
        $dataEvent = EventModel::where('active', '1')->get();
        $dr = ['dataEvent' => $dataEvent];
        return view('app.event.event', $dr);
    }
    public function addProcess(Request $request)
    {
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
            $this->baseResponse['status'] = true;
            $this->baseResponse['code'] = 200;
            $this->baseResponse['msg'] = "Sukses menambahkan event ...";
        }else{
            $this->baseResponse['status'] = false;
            $this->baseResponse['code'] = 401;
            $this->baseResponse['msg'] = "Nama event sudah di daftarkan ...";
        }

        return \Response::json($this->baseResponse);
    }

    public function deleteProcess(Request $request)
    {
        EventModel::where('kd_event', $request->kdEvent)->delete();
        $this->baseResponse['status'] = true;
        $this->baseResponse['code'] = 200;
        $this->baseResponse['data'] = null;
        $this->baseResponse['msg'] = "Success delete event ...";
        return \Response::json($this->baseResponse);
    }

    public function apiDetail(Request $request)
    {
        $kdEvent = $request->kdEvent;
        $dEvent = EventModel::where('kd_event', $kdEvent)->first();

        $this->baseResponse['status'] = true;
        $this->baseResponse['code'] = 200;
        $this->baseResponse['data'] = $dEvent;
        $this->baseResponse['msg'] = "Success load data event ...";
        return \Response::json($this->baseResponse);
    }

    public function updateProcess(Request $request)
    {
        EventModel::where('kd_event', $request->kdEvent)->update(
            ['nama_event' => $request->nama],
            ['keterangan' => $request->keterangan],
            ['kuota' => $request->quota]
        );

        $this->baseResponse['status'] = true;
        $this->baseResponse['code'] = 200;
        $this->baseResponse['msg'] = "Success update event ...";

        return \Response::json($this->baseResponse);
    }

    public function startEvent(Request $request)
    {
        $qUpdate = EventModel::where('kd_event', $request->kdEvent)->update(['status_event' => 'BERLANGSUNG']);
        if($qUpdate){
            $this->baseResponse['status'] = true;
            $this->baseResponse['code'] = 200;
            $this->baseResponse['msg'] = "Success start event ...";
        }

        return \Response::json($this->baseResponse);
    }

    public function assignPeserta()
    {
        
    }

    function checkNamaEvent(string $namaEvent):bool
    {
        $statusCek = true;
        $qCekEvent = EventModel::where('nama_event', $namaEvent)->where('active', '1')->count();
        if($qCekEvent > 0){
            $statusCek = false;
        }
        return $statusCek;
    }

}
