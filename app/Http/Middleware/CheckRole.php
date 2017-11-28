<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (is_null($request->user())) {
            return redirect('auth.login');
        } else if ($request->user()->role->id === 1) {
            return redirect(route('admin.dashboard'));
        } else if ($request->user()->role->id === 2) {
            return redirect(route('user.dashboard'));
        }
        //return $next($request);
    }
}
