<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data['email'] = $request->email;
        $data['password'] = $request->password;

        if (Auth::attempt($data)) {
            $user = User::where('email', $request->email)->first()->role;
            $request->session()->regenerate();
            if ($user == 'Admin') {
                return redirect()->route('home');
            } elseif ($user == 'Biasa') {
                return redirect()->route('home.biasa');
            }
        } else {
            return redirect()->back()->with('gagal', 'Email / Password yang anda masukkan salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
