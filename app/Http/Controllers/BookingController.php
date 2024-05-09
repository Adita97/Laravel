<?php

namespace App\Http\Controllers;

use App\Models\bookings;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {

        return view('SessionBooking.booking');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullName' => 'required|string',
            'phoneNumber' => 'required|string',
            'email' => 'sometimes|required|email',
            'date' => 'required|date|after:today',
        ],[
            'date.after' => 'Sorry, no backward trips allowed! Please select a date from the future.'
        ]);
    
        // Get the authenticated user
        $user = auth()->user();
    
        // Create a new booking associated with the authenticated user
        $booking = new bookings([
            'full_name' => $request->input('fullName'),
            'phone_number' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'booking_date' => $request->input('date'),
        ]);
    
        // Associate the booking with the authenticated user
        $user->bookings()->save($booking);
    
        return redirect()->route('my-bookings')->with('success', 'Booking created successfully.');
    }
}
