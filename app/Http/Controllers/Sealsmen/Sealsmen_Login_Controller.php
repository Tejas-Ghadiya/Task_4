<?php

namespace App\Http\Controllers\Sealsmen;

use App\Http\Controllers\Controller;
use App\Models\sealsmen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Sealsmen_Login_Controller extends Controller
{
    public function index()
    {
        return view('sealsmen.login');
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = sealsmen::where('email', $email)->first();

        if ($user) {
            // Check if the hashed password matches the plain password
            if (Hash::check($password, $user->password)) {
                $request->session()->put('id', $user->id);
                $request->session()->put('user', $user->name);
                $request->session()->put('ditels', $user->ditels);
                $request->session()->put('address', $user->address);
                $request->session()->put('mobile_number', $user->mobile_number);
                $request->session()->put('email', $user->email);
                return redirect(url('sealsmen/home'));
            } else {
                return response()->json(['message' => 'Invalid Password'], 401);
            }
        } else {
            return response()->json(['message' => 'Invalid Email'], 404);
        }
    }
}
