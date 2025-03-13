<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $param = 'user'): Response
    {

        $params = explode("|", $param);

        $user = Auth::guard('web')->user() ?? Auth::guard('admin')->user();

    
        if(!$user) {
            return redirect('/login');
        }  

        $role = '';


        if(Auth::guard('web')->check()) {
            $role = 'user';
        }

        if(Auth::guard('admin')->check()) {
            $role = 'admin';
        }

        
        if($user && !in_array($role, $params)  ) {
            return redirect( "/dashboard" );
        }

         
        


        return $next($request);
    }
}