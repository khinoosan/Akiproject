<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class AdminGoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
       
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the Google callback.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback()
    {
        try {
           
            $googleUser = Socialite::driver('google')->user();

            
            $admin = Admin::where('email', $googleUser->getEmail())->first();

            if (!$admin) {
                
                $admin = Admin::create([
                    'email' => $googleUser->getEmail(),
                    'gmail' => $googleUser->getEmail(), 
                    'password' => bcrypt(Str::random(16)), 
                ]);
            }


            Auth::guard('admin')->login($admin);

         
            return redirect()->route('/dashboard'); 

        } catch (\Exception $e) {
            
            return redirect()->route('admin.login')->withErrors([
                'error' => '認証エラー: ' . $e->getMessage()
            ]);
        }
    }
}
