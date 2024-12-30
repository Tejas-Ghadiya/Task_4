<?php

namespace App\Http\Controllers\Sealsmen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Sealsmen_Logout_Controller extends Controller
{
    public function logout()
    {
        session()->flush();
        return redirect('sealsmen/home');
    }
}
