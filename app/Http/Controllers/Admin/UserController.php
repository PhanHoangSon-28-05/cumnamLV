<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('admins.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('category.index');
        }

        return redirect('/admin/login')->with('error', 'Invalid credentials. Please try again.');
    }
    public function showRegistrationForm()
    {
        return view('admins.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/login')->with('success', 'Registration successful! Please log in.');
    }

    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect('/admin/login');
    }
}
