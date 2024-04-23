<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string|max:255',
            'username' => 'required|string|max:255|min:3|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = new User([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful. You can now login.');
    }
}
