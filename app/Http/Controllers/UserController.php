<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::find(auth()->user()->id);
        return view('user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }
}
