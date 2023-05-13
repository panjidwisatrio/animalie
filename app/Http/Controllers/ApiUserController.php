<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApiUserController extends Controller
{
    public function index()
    {
        $users = User::find(auth()->user()->id);
        return response()->json([
            'message' => 'success',
            'data' => $users
        ]);
    }

    public function show()
    {
        $posts = Post::with(['user', 'category'])->where('user_id', auth()->user()->id)->latest()->paginate(5);

        return response()->json([
            'user' => Auth::user(),
            'posts' => $posts,
        ]);
    }

    public function showSpecific(User $user)
    {
        $posts = Post::with(['user', 'category'])->where('user_id', $user->id)->latest()->paginate(5);

        return response()->json([
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function edit()
    {
        return response()->json([
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        // TODO: fix avatar
        $validated = $request->validate([
            'name' => ['string', 'max:255', 'required'],
            'username' => ['string', 'max:255', 'required'],
            'work_place' => ['string', 'max:255'],
            'job_position' => ['string', 'max:255'],
            'email' => ['email', 'max:255', 'required'],
            'avatar' => ['image', 'file', 'max:2048'],
        ]);

        if ($request->file('avatar')) {
            Storage::delete($request->user()->avatar);
            $validated['avatar'] = $request->file('avatar')->store('post-images');
        }

        User::where('id', $request->user()->id)->update($validated);

        return response()->json([
            'message' => 'profile-updated'
        ]);
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

        return response()->json([
            'message' => 'password-updated',
        ]);
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

        return response()->json([
            'message' => 'user-deleted',
        ]);
    }
}
