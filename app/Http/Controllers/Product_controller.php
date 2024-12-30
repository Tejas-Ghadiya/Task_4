<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\product;
use Illuminate\Http\Request;

class Product_controller extends Controller
{
    //
    public function index(Request $request)
    {
        $pid = $request->input('pid');
        $uid = $request->input('uid');

        // Validate the required inputs
        if (!$pid || !$uid) {
            return redirect()->back()->withErrors('Product ID or User ID is missing.');
        }

        // Retrieve the product by ID
        $product = Product::find($pid);

        if (!$product) {
            return redirect()->back()->withErrors('Product not found.');
        }

        // Check if a like entry exists for the given user and product
        $like = Like::where('pid', $pid)->where('uid', $uid)->first();

        // Pass data to the view
        return view('Product_View', [
            'product' => $product,
            'like' => $like, // Pass the like object (can be null if not found)
        ]);
    }
}
