<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function registerPage(){
        return view('auth.register');
    }

    public function register(Request $request){
        // dd($request->all());



        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' =>'required|string|confirmed',
            'password_confirmation' =>'required|string',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);
        return redirect('login');

    }





    public function loginPage(){
        return view('auth.login');
    }
    public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('dashboard');
            }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');





    }
}
