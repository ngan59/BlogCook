<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function formLogin()
    {
        return view("web.auth.login");
    }

    public function login(Request $request)
    {
        // Validate the request data
        // $validatedData = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ]);

        // Attempt to login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/')->with('success', 'Logged in successfully');
        }

        // Redirect back with an error message
        return redirect()->route('web.auth.login')->with('error', 'Invalid email or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");

    }
}
