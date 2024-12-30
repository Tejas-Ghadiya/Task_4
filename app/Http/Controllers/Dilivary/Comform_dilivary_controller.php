<?php

namespace App\Http\Controllers\Dilivary;

use App\Http\Controllers\Controller;
use App\Models\bill;
use App\Models\Take_delivary;
use Illuminate\Http\Request;

class Comform_dilivary_controller extends Controller
{
    public function index($id)
    {
        $find = new Take_delivary();
        $find = Take_delivary::find($id);

        return view('Dilivary.comform_dilivary', ['find' => $find]);
    }
    public function comform(Request $request)
    {
        $bid = $request->bid;
        $id = $request->id;
        $find = new bill();

        $find = bill::find($bid);
        // return $find->cdon;
        if ($find->cdon == $request->codn) {

            if ($find) {
                // Update bill_condition
                $find->bill_condition = 0;

                // return $id;

                if ($find->save()) {
                    $take = new Take_delivary();
                    $take = Take_delivary::find($id);
                    if ($take) {
                        $take->bill_condition = 1;

                        if ($take->save()) {
                            return redirect()->route('send_pdf', ['bid' => $bid]);
                            // If redirecting to the route

                        } else {
                            // Handle the save failure
                            return back()->with('error', 'Failed to update the bill condition.');
                        }
                    }
                }
            } else {
                // Handle the case where the bill is not found
                return back()->with('error', 'Bill not found.');
            }
        } else {
            // Handle the case where the cdon doesn't match
            return back()->with('error', 'Invalid CODN provided.');
        }
    }
}
