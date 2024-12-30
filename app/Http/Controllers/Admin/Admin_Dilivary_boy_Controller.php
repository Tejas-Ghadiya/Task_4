<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dilivari_boy;
use Illuminate\Http\Request;

class Admin_Dilivary_boy_Controller extends Controller
{
    public function index()
    {
        $find = new dilivari_boy();
        $find = dilivari_boy::all();
        return view('Admin/Admin_dilivary_boy', ['find' => $find]);
    }
}
