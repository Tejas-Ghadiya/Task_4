<?php

namespace App\Http\Controllers\Sealsmen;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\sealsmen;
use Illuminate\Http\Request;

class Sealsmen_Register_Controller extends Controller
{
    public function index()
    {
        return view('sealsmen.register');
    }

    public function register(Request $request)
    {
        // return $request->ditels;
        $request->validate([
            'name' => 'required|string',
            'ditels' => 'required',
            'mobile_number' => 'required|min:10|max:10',
            'address' => 'required',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'password_confirm' => 'required|same:password',
        ]);

        $newUser = sealsmen::create([
            'name' => $request->input('name'),
            'address' => $request->input('ditels'),
            'shop_name' => $request->input('shop_name'),
            'mobile_number' => $request->input('mobile_number'),
            'ditels' => $request->input('ditels'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' =>  Hash::make($request->input('password')), // Securely hash the password
            'is_dilivary_boy' => $request->input('is_dilivary_boy'),
        ]);
        if ($newUser) {
            $request->session()->put('id', $newUser->id);
            $request->session()->put('user', $newUser->name);
            $request->session()->put('shop_name', $newUser->shop_name);
            $request->session()->put('ditels', $newUser->ditels);
            $request->session()->put('address', $newUser->address);
            $request->session()->put('mobile_number', $newUser->mobile_number);
            $request->session()->put('email', $newUser->email);
            return redirect(url('sealsmen/home'));
        }
    }
}
