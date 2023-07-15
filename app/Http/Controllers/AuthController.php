<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }
    public function loginProcess(Request $request)
    {
        $tUser = UserModel::where('username', $request->username)->count();
        $token = null;
        if($tUser < 1){
            $status = "NO_USER";
        }else{
            $dUser = UserModel::where('username', $request->username)->first();
            $cekUser = password_verify($request->password, $dUser->password);
            if($cekUser){
                $token = Str::random(40);
                UserModel::where('username', $request->username)->update(['api_token'=>$token]);
                $status = "SUCCESS";
            }else{
                $status = "WRONG_PASSWORD";
            }
        }
        $dr = ['status'=>$status, 'token'=> Crypt::encryptString($token)];
        return \Response::json($dr);
    }
    public function logOut()
    {
        return redirect('/auth/login');
    }
}
