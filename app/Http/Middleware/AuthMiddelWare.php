<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use App\Models\Account;

class AuthMiddelWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if (!Cookie::get('token')) {
            return redirect('/admin/auth/login');
        }else {
            $find = [
                'tokenacc' => Cookie::get('token')
            ];
            $user = Account::where($find)->first();
            if (!$user) {
                return redirect('/admin/auth/login');
            }else {
                view()->share('user', $user);
                return $next($request);
            }
        }
    }
}
