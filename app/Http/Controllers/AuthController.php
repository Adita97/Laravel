<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->put('user_details', [
                'name' => $user->full_name,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'username' => $user->username,
            ]);
            return redirect()->intended('/');
        }

        return back()->withErrors(['message' => 'Invalid username or password']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
}
