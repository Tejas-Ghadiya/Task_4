<?php

namespace App\Http\Controllers\Dilivary;

use App\Http\Controllers\Controller;
use App\Models\Take_delivary;
use Illuminate\Http\Request;

class Your_Dilivayr_controller extends Controller
{
    public function index()
    {
        $find = new Take_delivary();
        $data = $find->where('Delivary_boy_id', session('id'))->get();
        return view('dilivary.your_dilivary', ['data' => $data]);
    }
}
