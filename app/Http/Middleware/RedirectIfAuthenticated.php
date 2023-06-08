<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $usertype = auth()->user()->usertype;

                if($usertype=="King"){
                    return redirect(RouteServiceProvider::HOME);
                } else if($usertype=="Mayor" || $usertype == "Coridor"){
                    return redirect(RouteServiceProvider::HOME_MAYOR);
                } else if($usertype=="Phakbet"){
                    return redirect(RouteServiceProvider::HOME_PHAKBET);
                } else if($usertype=="Liaison"){
                    return redirect(RouteServiceProvider::HOME_LIAISON);
                } else if($usertype=="Admin"){
                    return redirect(RouteServiceProvider::HOME_ADMIN);
                }
            }
        }

        return $next($request);
    }
}
