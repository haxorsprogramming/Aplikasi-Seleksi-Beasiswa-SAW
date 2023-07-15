<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function eventPage()
    {
        return view('app.event.event');
    }
    public function addProcess(Request $request)
    {
        $dr = [
          'status' => $request->nama
        ];
        return \Response::json($dr);
    }
}
