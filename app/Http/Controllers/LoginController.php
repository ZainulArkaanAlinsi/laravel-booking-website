<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $remember = $request->has('remember');
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember)) {
            $request->session()->regenerate();

            // Redirect sesuai role user
            if (Auth::user()->is_admin) {
                return redirect()->intended('/dashboard')->with('success', 'Login admin berhasil');
            }
            return redirect()->intended('/')->with('success', 'Login berhasil');
        }

        return back()->with('loginError', 'Username atau password salah!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' =>  'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => ['required', 'min:3', 'max:255', 'confirmed'],
        ]);

        // Membuat customer baru
        $customer = Customer::create([
            'name' => $request->name
        ]);

        // Membuat user baru, default is_admin = 0 (user biasa)
        User::create([
            'username' => $request->username,
            'c_id' => $customer->id,
            'password' => bcrypt($request->password),
            'is_admin' => 0
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login')->with('success', 'Berhasil logout!');
    }
}
