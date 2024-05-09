<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyBookingsController extends Controller
{


    public function showBookings(){
        $user = Auth::user();
        $bookings = $user->bookings;
        return view('SessionBooking.my-bookings', ['bookings' => $bookings]);
    }


    public function cancelBooking(Request $request)
    {
        $bookingId = $request->input('booking_id');
        bookings::where('id', $bookingId)->delete();

        return redirect()->back()->with('success', 'Booking canceled successfully');
    }

    public function changeDate(Request $request)
    {
        $request->validate([
            'newDate' => 'required|date|after:today'
        ],[
            'newDate.after' => 'Sorry, no backward trips allowed! Please select a date from the future.'
        ]);
        $bookingId = $request->input('booking_id');
        $newDate = $request->input('newDate');
        

        
        bookings::where('id', $bookingId)->update(['booking_date' => $newDate]);
        
        return redirect()->back()->with('success', 'Booking date changed successfully');
    }
}

