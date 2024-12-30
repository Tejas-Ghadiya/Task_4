<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bill;
use Illuminate\Http\Request;

class Order_controllers extends Controller
{
    public function index(Request $request)
    {
        $product = new bill();
        $product = Bill::paginate(5);
        return view('Admin/orders', ["users" => $product]);
    }
}
