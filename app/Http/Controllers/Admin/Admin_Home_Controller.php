<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bill;
use App\Models\dilivari_boy;
use App\Models\product;
use App\Models\User;
use App\Models\sealsmen;
use Illuminate\Http\Request;

class Admin_Home_Controller extends Controller
{
    public function index()
    {
        $user = new User();
        $product = new product();
        $dilivary_boy = new dilivari_boy();
        $bill = new bill();
        $salesman = new sealsmen();

        $user = user::count();
        $product = product::count();
        $dilivary_boy = dilivari_boy::count();
        $cansel_order = bill::count();
        $salesman = sealsmen::count();

        return view('Admin.Admin_Home', [
            'user' => $user,
            'product' => $product,
            'dilivary_boy' => $dilivary_boy,
            'cansel_order' => $cansel_order,
            'salesman' => $salesman,
        ]);
    }
}
