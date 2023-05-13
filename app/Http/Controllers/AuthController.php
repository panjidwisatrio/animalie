<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'confirm_password' => 'required|string',
        ]);

        if ($request->password != $request->confirm_password) {
            return response()->json([
                'message' => 'Password does not match'
            ], 401);
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $isEmail = filter_var($request->email, FILTER_VALIDATE_EMAIL);

        if ($isEmail) {
            $user = User::where('email', $request->email)->firstOrFail();
        } else {
            $user = User::where('username', $request->email)->firstOrFail();
        }

        if(!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid login details - password'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out'
        ]);
    }

    public function user()
    {
        return response(['user' => auth()->user()]);
    }
}
