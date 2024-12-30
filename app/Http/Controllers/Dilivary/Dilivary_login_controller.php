<?php

namespace App\Http\Controllers\Dilivary;

use App\Http\Controllers\Controller;
use App\Models\dilivari_boy;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Dilivary_login_controller extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = dilivari_boy::where('email', $email)->first();

        if ($user) {
            // Check if the hashed password matches the plain password
            if (Hash::check($password, $user->password)) {
                $request->session()->put('id', $user->id);
                $request->session()->put('terms_and_condition', $user->terms_and_condition);
                $request->session()->put('user', $user->name);
                $request->session()->put('address', $user->address);
                $request->session()->put('mobile_number', $user->mobile_number);
                $request->session()->put('email', $user->email);
                $request->session()->put('is_dilivary_boy', $user->is_dilivary_boy);
                return redirect(url('dilivary/home'));
            } else {
                return response()->json(['message' => 'Invalid Password'], 401);
            }
        } else {
            return response()->json(['message' => 'Invalid Email'], 404);
        }
    }
}
