<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\product;
use Illuminate\Http\Request;

class Like_Controller extends Controller
{
    public function index(Request $request)
    {
        // return "hello";
        $like = new Like(); // Assuming your model is named `Like`
        $pid = $request->input('pid');
        $uid = $request->input('uid');

        // Use a query to find the record with both `pid` and `uid`
        $check = Like::where('pid', $pid)
            ->where('uid', $uid)
            ->first();

        if ($check) {
            $product = new product();
            $product = Product::find($pid);
            $like = Like::where('pid', $pid)->where('uid', $uid)->first();
            $is_like = $like->is_like;
            $like_id = $like->id;

            return view('Product_View', ['product' => $product, 'like' => $like]);
        } else {
            $like->pid = $pid;
            $like->uid = $uid;

            if ($like->save()) {
                $product = new product();
                $product = Product::find($pid);
                $like = Like::where('pid', $pid)->where('uid', $uid)->first();
                $is_like = $like->is_like;
                $like_id = $like->id;

                return view('Product_View', ['product' => $product, 'like' => $like]);
            }
        }
    }
    public function delete(Request $request)
    {
        $pid = $request->input('pid');
        $uid = $request->input('uid');
        $like_id = $request->input('like_id');
        // return $like_id;
        $like = Like::find($like_id);
        if ($like->delete()) {
            $product = new product();
            $product = Product::find($pid);
            $like = Like::where('pid', $pid)->where('uid', $uid)->first();
            return view('Product_View', ['product' => $product, 'like' => $like]);
        }
    }
}
