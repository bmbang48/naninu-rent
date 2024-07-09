<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    //
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('cars');
        } else {
            return redirect('naninunet')->with('error_message', 'Salah masukkan email atau password');
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('naninunet');
    }
}
