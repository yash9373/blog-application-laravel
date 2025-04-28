<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{

    // public function login(request $request)
    // {
    //     return view('pages.login');
    // }
    // public function register(request $request)
    // {
    //     return view('pages.register');
    // }

    public function login(request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'wrong credentials']);
    }
    public function register(request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->intended('/');

    }
}
