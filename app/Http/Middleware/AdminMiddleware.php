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
        $user =  Auth::user()->roles()->firstOrFail();

        if (Auth::check() && ($user->name == 'admin' || $user->name == 'admin_guest' ) ) {
            if ($user->name == 'admin_guest' && $request->method() != 'GET') {
                return redirect()->back()->with('status', 'Вы недостаточно авторизованы');
            }
            return $next($request);
        }

        abort(404);
    }
}
