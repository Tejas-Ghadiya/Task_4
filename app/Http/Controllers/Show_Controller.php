<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\like;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Show_Controller extends Controller
{
    public function index1($uid)
    {
        $products = DB::table('product')
            ->leftJoin('like', function ($join) use ($uid) {
                $join->on('product.id', '=', 'like.pid')
                    ->where('like.uid', '=', $uid);
            })
            ->select('product.*', DB::raw('IF(like.id IS NULL, 0, 1) as is_liked')) // Correct table name
            ->get();
        // return $products;
        return view('Show_save', ['product' => $products]);
    }

    public function index2($uid)
    {
        $bill = new bill();
        $bill = Bill::where('uid', $uid)->where('bill_condition', 1)->get();
        return view('Show_cart', ['bill' => $bill]);
    }
    public function cart($id)
    {
        $bill = new bill();
        $bill = bill::find($id);
        return view('cart', ['bill' => $bill]);
    }
}
