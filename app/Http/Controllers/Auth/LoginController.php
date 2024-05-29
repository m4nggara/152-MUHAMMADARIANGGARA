<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak sesuai',
            'password.required' => 'Password harus diisi'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!isset($user)) {
            return back()->withErrors([
                'email' => 'Pengguna tidak ditemukan.',
            ])->onlyInput('email');
        }

        if(!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password pengguna tidak sesuai.',
            ])->onlyInput('password');
        }
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('admin');
        }
 
        return back()->withErrors([
            'email' => 'Pengguna tidak ditemukan.',
        ])->onlyInput('email');
    }

    public function login(Request $request) 
    {
        return view('admin.pages.login');
    }

    public function logout(Request$request)
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
