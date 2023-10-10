<?php

namespace App\Http\Controllers;

use App\Models\EventModel;
use Illuminate\Http\Request;

class AssignController extends Controller
{
    private $baseResponse;
    public function __construct()
    {
        $this->baseResponse = array("status" => null, "code" => null, "data" => null, "msg" => null);
    }
    public function assignPeserta()
    {
        $dataEvent = EventModel::where('active', '1')->get();
        $dr = ['dataEvent' => $dataEvent];
        return view('app.assign.assign', $dr);
    }
}
