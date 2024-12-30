<?php

namespace App\Http\Controllers\Dilivary;

use App\Http\Controllers\Controller;
use App\Models\bill;
use App\Models\Take_delivary;
use Illuminate\Http\Request;

class Available_Delivary_Controller extends Controller
{
    public function index()
    {
        $availabel = new bill();

        $bill = bill::where('bill_condition', 1)->where('dilivary_boy_comformation', 0)->get();

        return view('Dilivary.available_delivery', ['bill' => $bill]);
    }

    public function available_bill(Request $request)
    {
        // Create a new delivery record in the `Take_delivary` table
        $add = Take_delivary::create([
            'Delivary_boy_id' => $request->input('Delivary_boy_id'),
            'bill_condition' => 0,
            'Delivary_boy_name' => $request->input('Delivary_boy_name'),
            'Delivary_boy_number' => $request->input('Delivary_boy_number'),
            'Delivary_boy_address' => $request->input('Delivary_boy_address'),
            'bid' => $request->input('bid'), // Bill ID
            'pid' => $request->input('pid'),
            'uid' => $request->input('uid'),
            'user_name' => $request->input('user_name'),
            'mobile_number' => $request->input('mobile_number'),
            'pimage' => $request->input('pimage'),
            'pname' => $request->input('pname'),
            'totel' => $request->input('totel'),
            'quantity' => $request->input('quantity'),
            'ucity' => $request->input('city'),
            'uaddress' => $request->input('address'),
            'uzip' => $request->input('Zip'),
        ]);

        if ($add) {
            // Find the bill by its ID and update its available_bill to 0
            $billId = $request->input('bid');
            $bill = bill::find($billId);

            if ($bill) {
                $bill->dilivary_boy_comformation = 1;
                $bill->save(); // Save the changes to the database

                $availabel = new bill();

                $bill = bill::where('bill_condition', 1)->get();

                return view('Dilivary.available_delivery', ['bill' => $bill]);
            }

            // Fetch updated list of bills where available_bill is still 1
            $bills = bill::where('bill_condition', 1)->get();

            return view('Dilivary.available_delivery', ['bill' => $bills]);
        } else {
            return redirect()->back()->with('error', 'Failed to add delivery');
        }
    }
}
