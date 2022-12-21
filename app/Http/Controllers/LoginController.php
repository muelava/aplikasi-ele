<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;



class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('user')->check()) {
            return redirect('/administrator');
        }elseif(Auth::guard('siswa')->check()){
            return redirect('/courses');
        }else{
            return view('login.index', [
                'active' => 'login'
            ]);
        }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nis' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/administrator');
        }elseif (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/courses');
        }


        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/courses');
        // }
        
        // $nis = $request->nis;

        // if (Siswa::where('nis', $nis)->first() != null) {
        //     $request->session()->put('nama', 'muhammad elang');
        //     return redirect('/courses');
        //     dd(session()->all());
        // } 

        return back()->with('loginError', 'Username atau Password Salah!');
    }

    public function logout(Request $request)
    {
        // if (Auth::guard('user')->check()) {
        //     Auth::guard('user')->logout()
        // }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
