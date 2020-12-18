<?php

namespace App\Http\Middleware;

use Closure;

class AdminRedirectNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $data = 'halo';
        if ($request->session()->has('username')) {
            return $next($request);
        }
        return redirect('admin/login');
        //return $next($request);
    }
}
