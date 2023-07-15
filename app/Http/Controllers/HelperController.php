<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HelperController extends Controller
{
    public function CekSessionUser($token):bool
    {
        $dataUsers = UserModel::all();
        $status = false;
        for($x=0;$x<count($dataUsers);$x++){
            $tokenDb = $dataUsers[$x]->api_token;
            try {
                Crypt::decryptString($token);
                $status = true;
            } catch (Exception $e) {
                $status = false;
            }
        }
        return $status;
    }
}
