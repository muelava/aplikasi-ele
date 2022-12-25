<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }elseif(Auth::guard('guru')->check()){
            return redirect('/guru');
        }elseif(Auth::guard('siswa')->check()){
            return redirect('/courses');
        }else{
            return view('register.index', [
                'active' => 'register'
            ]);
        }
    }
    public function store(Request $request)
    {
        $inputValidate =  $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'email' => 'required',
            'password' => 'required | min:3 | max:255',
            'confirm-password' => 'required | required_with:password | same:password'
        ]);
        $inputValidate['kelas'] = 'X';        
        $inputValidate['role'] = 'siswa';        
        $inputValidate['password'] = Hash::make($inputValidate['password']);

        Siswa::create($inputValidate);
        return redirect('/login')->with('success', 'Berhasil melakukan registrasi');
    }
}
