<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailSubscriber;

class EmailSubscribersController extends Controller
{

    public function subscribe(Request $request)
    {
        $request->validate([
            'email_subscriber' => 'required|email|unique:email_subscribers,email_subscriber'
        ]);

        EmailSubscriber::create([
            'email_subscriber' => $request->email_subscriber
        ]);

        return redirect()->back()->with('success', 'Subscribed successfully!');
    }
}
