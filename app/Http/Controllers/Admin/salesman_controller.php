<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sealsmen;
use Illuminate\Http\Request;

class salesman_controller extends Controller
{
    public function index()
    {
        $find = new sealsmen();

        $find = sealsmen::all();

        return view('Admin/salesman', ['find' => $find]);
    }
}
