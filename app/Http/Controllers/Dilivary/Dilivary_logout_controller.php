<?php

namespace App\Http\Controllers\Dilivary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dilivary_logout_controller extends Controller
{
    public function logout()
    {
        session()->flush();
        return redirect('/dilivary/home');
    }
}
