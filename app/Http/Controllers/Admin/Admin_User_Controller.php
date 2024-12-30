<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Admin_User_Controller extends Controller
{
    public function index()
    {
        $find = new User();

        $find = User::all();

        return view('Admin/Admin_user', ['find' => $find]);
    }
}
