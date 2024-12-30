<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin_Login_Controller extends Controller
{
    public function index()
    {
        return view('Admin.auth.login');
    }
    public function login(Request $request)
    {
        // return 'hello';
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->is_admin) {
                return redirect('admin/home');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'You do not have access to this page.']);
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials provided.']);
    }
}
