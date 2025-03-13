<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

   
    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            
          
            $user = User::where('google_id', $google_user->getId())->orWhere('email', $google_user->getEmail())->first();
    
            if (!$user) {
             
                $user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'password' => Str::random(60),
                ]);
            }
    
         
            Auth::login($user);
    
       
            return redirect()->intended('/dashboard');
        } catch (\Throwable $th) {
            return redirect()->route('login')->withErrors(['error' => '認証エラー: ' . $th->getMessage()]);
        }
    }
    
}
