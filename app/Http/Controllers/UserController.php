<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $users = User::find(auth()->user()->id);
        return view('user.index', compact('users'));
    }

    public function show()
    {
        return view('profile.myProfile', [
            'user' => Auth::user(),
        ]);
    }

    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['string', 'max:255', 'required'],
            'username' => ['string', 'max:255', 'required'],
            'work_place' => ['string', 'max:255'],
            'job_position' => ['string', 'max:255'],
            'email' => ['email', 'max:255', 'required'],
            'avatar' => ['image', 'file', 'max:2048'],  
        ]);

        if ($request->file('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('post-images');
        }

        User::where('id', $request->user()->id)->update($validated);

        return Redirect::route('profile.show')->with('status', 'profile-updated');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current-password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password),
        ]);

        return Redirect::route('profile.show')->with('status', 'password-updated');
    }

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
