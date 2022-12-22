<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Siswa;



class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/administrator');
        }elseif(Auth::guard('guru')->check()){
            return redirect('/guru');
        }elseif(Auth::guard('siswa')->check()){
            return redirect('/courses');
        }else{
            return view('login.index', [
                'active' => 'login'
            ]);
        }
    }

    public function login_admin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/administrator');
        }elseif(Auth::guard('guru')->check()){
            return redirect('/guru');
        }elseif(Auth::guard('siswa')->check()){
            return redirect('/courses');
        }else{
            return view('login.admin', [
                'active' => 'login'
            ]);
        }
    }

    public function authenticate(Request $request)
    {


        if ($request->email) {
            $userName_or_Email = $request->email;
            $password = $request->password;
            $user = Admin::where('username',$userName_or_Email)->first();
            if(empty($user)){
                $user = Admin::where('email',$userName_or_Email)->first();
              }
              
              if(empty($user)){
                return back()->with('loginError', 'Username atau email tidak ditemukan!');
              }
              
            // dd($user);
            if(Hash::check($password, $user->password)){
                $request->session()->regenerate();
                return redirect('/administrator');
             }else{
               dd('password tidak sesuai');
             }
        }else{
            $credentials = $request->validate([
                'nis' => ['required'],
                'password' => ['required']
            ]);
            if (Auth::guard('siswa')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/courses');
            }
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
