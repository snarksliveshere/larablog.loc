<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        if (Auth::check() && ($user->name == 'admin' || $user->name == 'admin_guest' ) ) {

            return $next($request);
        }

        abort(404);
    }
}
