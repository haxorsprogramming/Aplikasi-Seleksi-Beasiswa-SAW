<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

use App\Http\Controllers\HelperController;
use App\Models\UserModel;
class DashboardController extends Controller
{
    protected $h;
    public function __construct(HelperController $h)
    {
        $this->h = $h;
    }
    public function dashboardPage(Request $request, $token)
    {
        $sLogin = $this->h->CekSessionUser($token);
        if(!$sLogin){
            return redirect('auth/login');
        }
        return view('app.dashboard');
    }
}
