<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'email harus diisi!',
            'password.required' => 'password harus diisi!',
        ]);

        $user = $request->only('email', 'password');

        if (Auth::attempt($user)) {
            $authenticatedUser = Auth::user();

            if ($authenticatedUser->role === 'admin') {
                return redirect('/dashboard');
            } else if ($authenticatedUser->role === 'user') {
                return redirect('/');
            }
        }

        return redirect()->back()->with('error', 'Gagal login, silahkan cek dan coba lagi!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
