<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\User;

class profileController extends Controller
{
    public function showProfile(){

    $user =auth()->user();

    return view('auth.profile', compact('user'));
}


    public function updateProfile(Request $request): RedirectResponse
    {
        $user = auth()->user();
        
        $user->full_name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->username = $request->input('username');
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function updateProfileAvatar(Request $request)
    {
        
        $request->validate([
            'profile_avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as per your requirement
        ]);
    
       
        if ($request->hasFile('profile_avatar')) {
           
            $image = $request->file('profile_avatar');
    
            
            $imageName = time() . '.' . $image->getClientOriginalName();

            $path = $image->storeAs(
                'storage/avatars', $request->user()->id
            );

            Auth::user()->update(['profile_avatar' => $path]);
    
        }
            // $path = $image->store('avatars', $imageName, 'storage/avatars');
    
        //     if ($path) {
        //         $user = auth()->user();
        //         $user->profile_avatar = $path;
        //         $user->save();
        //             return redirect()->back()->with('success', 'Profile avatar uploaded successfully.');
        //     } else {
        //         return redirect()->back()->with('error', 'Failed to store profile avatar.');
        //     }
        // } else {
        //     return redirect()->back()->with('error', 'No file uploaded.');
        // }
        
    }

    

    public function updatePhoneNumber(Request $request)
    {
                
                $request->validate([
                    'phone_number' => 'required|string|max:255' 
                ]);
        
                $user = auth()->user();
                $user->phone_number = $request->input('phone_number');
                $user->save();
        
                return redirect()->route('profile')->with('success', 'Phone number updated successfully!');
        
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users' 
        ]);
    
        $user = auth()->user();
        $user->email = $request->input('email');
        $user->save();
    
        return redirect()->route('profile')->with('success', 'Email updated successfully!');
    }

    public function updateUsername(Request $request){
    $request->validate([
        'username' => 'required|string|max:255|min:3|unique:users',
    ]);
    $user = auth()->user();
    $user->username = $request->input('username');
    $user->save();

    return redirect()->route('profile')->with('success', 'Email updated successfully');

}
    
}
