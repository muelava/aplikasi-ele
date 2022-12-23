<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Guru;
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


        if ($request->username) { //admin

            $username_email = $request->username;
            $password = $request->password;

            if (Admin::where('username',$username_email)->first()) {
                if (Auth::guard('admin')->attempt(['username'=> $username_email, 'password'=> $password])) {
                    $request->session()->regenerate();
                    return redirect()->intended('/administrator');
                }
            }elseif (Admin::where('email',$username_email)->first()) {
                if (Auth::guard('admin')->attempt(['email'=> $username_email, 'password'=> $password])) {
                    $request->session()->regenerate();
                    return redirect()->intended('/administrator');
                }
            }

        return back()->with('loginError', 'Username atau Password Salah!');

        }elseif ($request->email) { //guru atau siswa

            $nis_nip_email = $request->email;
            $password = $request->password;

            if (Guru::where('nip',$nis_nip_email)->first()) {
                if (Auth::guard('guru')->attempt(['nip'=> $nis_nip_email, 'password'=> $password])) {
                    $request->session()->regenerate();
                    return redirect()->intended('/guru');
                }
            }elseif (Guru::where('email',$nis_nip_email)->first()) {
                if (Auth::guard('guru')->attempt(['email'=> $nis_nip_email, 'password'=> $password])) {
                    $request->session()->regenerate();
                    return redirect()->intended('/guru');
                }
            }elseif (Siswa::where('nis',$nis_nip_email)->first()) {
                if (Auth::guard('siswa')->attempt(['nis'=> $nis_nip_email, 'password'=> $password])) {
                    $request->session()->regenerate();
                    return redirect()->intended('/courses');
                }
            }elseif (Siswa::where('email',$nis_nip_email)->first()) {
                if (Auth::guard('siswa')->attempt(['email'=> $nis_nip_email, 'password'=> $password])) {
                    $request->session()->regenerate();
                    return redirect()->intended('/courses');
                }
            }
            
        }



        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/courses');
        // }
        
        // $nis = $request->nis;

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
