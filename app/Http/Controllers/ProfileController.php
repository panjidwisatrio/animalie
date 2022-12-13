<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['string', 'max:255'],
            'username' => ['string', 'max:255'],
            'work_place' => ['string', 'max:255'],
            'job_position' => ['string', 'max:255'],
            'email' => ['email', 'max:255'],
            'avatar' => ['image', 'file', 'max:2048'],
        ]);

        if($request->file('image')){
            $request->file('avatar')->store('post-image');
        }

        Profile::where('id', $request->user()->id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        Profile::where('id', $request->user()->id)->insert([
            'work_place' => $request->work_place,
            'job_position' => $request->job_position,
            'avatar' => $request->avatar,
        ]);

        return Redirect::route('profile.show')->with('status', 'profile-updated');
    }

    public function show()
    {
        return view('profile.myProfile', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
