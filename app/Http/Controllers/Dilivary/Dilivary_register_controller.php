<?php

namespace App\Http\Controllers\Dilivary;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\dilivari_boy;
use Illuminate\Http\Request;

class Dilivary_register_controller extends Controller
{
    public function register(Request $request)
    {
        $user = new dilivari_boy();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'required',
            'mobile_number' => 'required|min:10|max:10',
        ]);

        $newUser = dilivari_boy::create([
            'name' => $request->input('name'),
            'mobile_number' => $request->input('mobile_number'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' =>  Hash::make($request->input('password')), // Securely hash the password
            'is_dilivary_boy' => $request->input('is_dilivary_boy'),
        ]);
        $request->session()->put('id', $newUser->id);
        $request->session()->put('terms_and_condition', $newUser->terms_and_condition);
        $request->session()->put('user', $newUser->name);
        $request->session()->put('address', $newUser->address);
        $request->session()->put('mobile_number', $newUser->mobile_number);
        $request->session()->put('email', $newUser->email);
        $request->session()->put('is_dilivary_boy', $newUser->is_dilivary_boy);
        return redirect(url('dilivary/home'));
    }
}
