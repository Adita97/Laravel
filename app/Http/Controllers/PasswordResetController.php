<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{

    public function showResetForm()
    {
        return view('auth.resetPassword');
    }


    public function showPasswordResetForm($token)
    {
        return view('auth.reset', ['token' => $token]);
    }

    
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'An email has been sent to you. Please check your inbox (and spam folder) for further instructions.');
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('success', 'Password Changed successfully')
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
