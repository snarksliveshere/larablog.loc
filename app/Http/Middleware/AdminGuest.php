<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //        dd(Auth::user()->roles());
            $user =  Auth::user()->roles()->firstOrFail();
//        dd($user->name);
//            dump($request->method());
            dump('check');
            if(Auth::check && $user->name == 'admin_guest') {
                if ($request->method() != 'GET') {
                    return redirect()->back()->with('status', 'вы недостаточно авторизированы');
                } else {
                    return $next($request);
                }
            }



//        if (Auth::check() && ($user->name == 'admin' || $user->name == 'admin_guest' ) ) {
//
//
//        }
//        return $next($request);
    }
}
