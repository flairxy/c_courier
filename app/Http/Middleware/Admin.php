<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::check()) {
            //           $user = $request->user();
            if (Auth::user()->is_admin || Auth::user()->is_manager) {

                return $next($request);
            }
            return abort(404);
        }
        return redirect()->route('login');
    }
}
