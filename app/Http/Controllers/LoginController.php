<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;



class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nis' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials, ['id' => 2])) {
            $request->session()->regenerate();
            return redirect()->intended('/courses');
        }



        // $nis = $request->nis;

        // if (Siswa::where('nis', $nis)->first() != null) {
        //     $request->session()->put('nama', 'elang hardifal');
        //     return redirect('/courses');
        // } 


        return back()->with('loginError', 'Username atau Password Salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
