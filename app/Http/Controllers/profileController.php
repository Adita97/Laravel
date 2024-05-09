<?php

namespace App\Http\Controllers;



use App\Models\User;

use App\Models\UserLink;
use App\Models\UserSkill;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user();
        $user->load('userLinks'); // Load the userLinks relationship
        
        return view('auth.profile', compact('user'));
    }

    public function editLinks()
    {
        $userLinks = auth()->user()->userLinks ?? new UserLink();
        return view('edit-links', compact('userLinks'));
    }

    public function updateLinks(Request $request)
    {
        $user = auth()->user();
        $user->userLinks()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only(['website', 'twitter', 'instagram'])
        );

        return redirect()->back()->with('success', 'Links updated successfully');
    }
    
       
    public function updateSkills(Request $request)
    {
        $user = auth()->user();
    
        if ($request->has('skills')) {
            foreach ($request->skills as $skill) {
                $user->userSkills()->create(['skill' => $skill]);
            }
        }
    
        return redirect()->back()->with('success', 'Skills updated successfully');
    }
    

    public function deleteSkill($id)
    {
        
        $skill = UserSkill::findOrFail($id);
        $skill->delete();

        return redirect()->back()->with('success', 'Skill deleted successfully');
        
        
    }


    public function updateProfile(Request $request): RedirectResponse
    {
        $user = auth()->user();
        
        $user->full_name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->username = $request->input('username');
        $user->bio = $request->input('bio');
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'profile_avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        // Handle file upload
        if ($request->hasFile('profile_avatar')) {
            $avatar = $request->file('profile_avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('avatars', $filename, 'public');

            // Update user's profile avatar
            $user->profile_avatar = $filename;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile avatar updated successfully.');
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
    public function updateBio(Request $request){
        $request->validate([
            'bio' => 'required|string|min:5|max:255',
        ]);
             $user = auth()->user();
            $user->bio = $request->input('bio');
            $user->save();


            return redirect()->route('profile')->with('success', 'Bio updated successfully');
        
    }
    
}
