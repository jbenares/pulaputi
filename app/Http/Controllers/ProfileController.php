<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function profile($id)
    {
        $userdetails = User::where('id', $id)->get();
        $stat = 'view';
        return view('profile.view', compact('userdetails','stat')); 
    }

    public function viewprofile()
    {
        $userid=auth()->user()->id;
        $userdetails = User::where('id', $userid)->get();
        $stat = 'myprofile';
        return view('profile.view', compact('userdetails','stat')); 
    }

    public function editprofile()
    {
        $userid=auth()->user()->id;
        $userdetails = User::where('id', $userid)->get();
        return view('profile.editprofile', compact('userdetails')); 
       
    }

    public function changemypassword()
    {
     
        return view('profile.changepassword');   
    }

    public function changemypassword_process(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string', 'min:8', new MatchOldPassword],
            'new_password' => 'max:8|different:old_password',
        ]);

        $newpw=  $request->input('new_password');
        $userid=auth()->user()->id;
        $update=User::find($userid);
        $update->password = Hash::make($newpw);
        $update->save();

        return Redirect::route('changemypassword')->with('status', 'Password changed successfully!');
    }


    public function update_profile(Request $request)
    {
        $userid = auth()->user()->id;
        $validated = $request->validate([
            'user_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $update= User::find($userid);

        if(!empty($request->user_image)){
           if(!empty($update->user_image)){
            unlink("images/users/".$update->user_image);
           }

            $imageName = time().'.'.$request->user_image->extension();  
            $request->user_image->move(public_path('images/users'), $imageName);
            $update->user_image = $imageName;
        }
      
        $update->gcash =$request->input('gcash');
        $update->maya = $request->input('maya');
       
        $update->save();
        return Redirect::route('editprofile')->with('status', 'Profile successfully updated!');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // $request->validateWithBag('userDeletion', [
        //     'password' => ['required', 'current-password'],
        // ]);

       // $user = $request->user();

        Auth::logout();

       // $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
