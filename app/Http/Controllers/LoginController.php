<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::firstWhere('username', $request->username);

        if (is_null($user) || !Hash::check($request->password, $user->password)) {
            return redirect()->route('login')->withErrors(['login' => 'Username atau Passoword Tidak Valid']);
        }

        Auth::login($user);

        return redirect()->route('cashier');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
