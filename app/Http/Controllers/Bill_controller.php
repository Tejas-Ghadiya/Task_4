<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use App\Models\bill;
use App\Models\product;
use Illuminate\Http\Request;

class Bill_controller extends Controller
{
    public function index(Request $request)
    {
        $num_str = sprintf("%06d", mt_rand(1, 999999));
        $pid  = $request->input('pid');
        $uid  = $request->input('uid');
        $cdon = $num_str;
        $pname  = $request->input('pname');
        $pimage  = $request->input('pimage');
        $totel  = $request->input('totel');
        $description  = $request->input('description');
        $quantity  = $request->input('quantity');
        $cardNumber  = $request->input('cardNumber');
        $expiryDate  = $request->input('expiryDate');
        $cvv  = $request->input('cvv');
        $name  = $request->input('name');
        $email  = $request->input('email');
        $mobile_number  = $request->input('number');
        $address  = $request->input('address');
        $city  = $request->input('city');
        $zip  = $request->input('zip');

        $t = $totel * $quantity;

        // return $totel;
        $bill = new bill();
        $bill->bill_condition = 1;
        $bill->pid = $pid;
        $bill->uid = $uid;
        $bill->cdon = $cdon;
        $bill->pname = $pname;
        $bill->pimage = $pimage;
        $bill->totel = $t;
        $bill->description = $description;
        $bill->quantity = $quantity;
        $bill->cardNumber = $cardNumber;
        $bill->expiryDate = $expiryDate;
        $bill->cvv = $cvv;
        $bill->name = $name;
        $bill->email = $email;
        $bill->mobile_number = $mobile_number;
        $bill->address = $address;
        $bill->city = $city;
        $bill->zip = $zip;
        if ($bill->save()) {
            $bill = Bill::where('uid', $uid)->latest('created_at')->first();
            return view('show_bill', ['bill' => $bill]);
        }
        return response()->json(['message' => 'bill not saved'], 400);
    }

    public function cancelled_orders(Request $request)
    {
        $id = $request->input('id');
        $add = bill::find($id);

        if ($add) {
            $add->bill_condition = 2;
            $add->dilivary_boy_comformation = 1;

            if ($add->save()) {
                // Retrieve bills with condition 1 for the authenticated user
                $bills = Bill::where('uid', Auth::id())->where('bill_condition', 1)->get();

                // Return the view with the retrieved bills
                return view('Show_cart', ['bill' => $bills]);
            } else {
                // If saving fails, return an error response
                return back()->with('error', 'Failed to update the bill.');
            }
        } else {
            // If no bill is found with the given ID, return an error response
            return back()->with('error', 'Bill not found.');
        }
    }
}
