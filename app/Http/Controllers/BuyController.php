<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\product;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index(Request $request)
    {
        $pid = $request->input('pid');
        $uid = $request->input('uid');
        $price = $request->input('price');
        $name = $request->input('name');

        $buy = new Buy();

        $buy->pid = $pid;
        $buy->uid = $uid;
        $buy->price = $price;
        $buy->name = $name;

        if ($buy->save()) {
            $product = new product();
            $product = Product::find($pid);

            return view('make_bill', ['product' => $product, 'uid' => $uid]);
        }
        return "error";
    }
}
