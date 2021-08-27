<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'active' => 'register'
        ]);
    }
    public function store(Request $request)
    {
        $inputValidate =  $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required | min:3 | max:255'
        ]);

        $inputValidate['password'] = Hash::make($inputValidate['password']);

        User::create($inputValidate);
        return redirect('/login')->with('success', 'Berhasil melakukan registrasi');
    }
}
