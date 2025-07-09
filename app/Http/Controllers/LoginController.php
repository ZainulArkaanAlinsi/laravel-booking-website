<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index');
    }

    public function register()
    {
        return view('login.register');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->has('remember') ? true : false;
        $minutes = 1440;

        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $remember)) {
            if ($request->has('remember')) {
                Cookie::queue('username', $request->username, $minutes);
                Cookie::queue('password', $request->password, $minutes);
            }
            // Flash pesan sukses ke session
            return redirect()->intended('/')->with('success', 'Login berhasil');
        }

        // Flash pesan error ke session
        return redirect('/login')->with('loginError', 'Username atau password salah!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' =>  'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => ['min:3', 'max:255', 'required'],
        ]);

        // Validasi konfirmasi password (jika ada)
        if ($request->confirmation_password != $request->password) {
            return redirect('/register')->with('loginError', 'Konfirmasi password tidak cocok!');
        }

        $p = Customer::create([
            'name' => $request->name
        ]);
        User::create([
            'username' => $request->username,
            'c_id' => $p->id,
            'password' => bcrypt($request->password)
        ]);
        // Flash pesan sukses ke session
        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        // Flash pesan sukses ke session
        return redirect('/login')->with('success', 'Berhasil logout!');
    }
}
