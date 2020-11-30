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
    public function handle($request, Closure $next)
    {
        $data = 'halo';
        if ($request->session()->has('username')) {
            /*$notifs = ['raka','dwiyogo','prakoso'];
            
            $request->merge(['data'=>$notifs]);*/
            return $next($request);
        }
        //return redirect('/');
        return redirect()->route('admin.indexlogin');

        //return $next($request);
    }
}
