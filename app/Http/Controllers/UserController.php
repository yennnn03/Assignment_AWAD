<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function login(Request $req)
    {
        $incomingFields = $req->validate([
            'email' => 'required | email',
            'password' => 'required | min:8'
        ]);

        if(Auth::attempt($incomingFields))
        {
            $req->session()->regenerate();
            return redirect('home');
        }
        return redirect()->back()->withErrors([
            'email' => 'Invalid credentials. Please try again',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('home');
    }
}