<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    
    public function showRegister()
    {
        return view('auth.register');
    }

    
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:100',
            'email'=> 'required|email|unique:users',
            'password'=>'required|string|min:6|confirmed',
        ]);
        $user = User::create([
            'name'  =>$request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/');
    }

  
    public function showLogin()
    {
        return view('auth.login');
    }

   
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect('/');
        }
        return back()->withErrors(['message'=>'Invalid credentials']);
    }

  
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
