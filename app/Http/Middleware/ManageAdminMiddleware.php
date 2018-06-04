<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Toastr;
class ManageAdminMiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->roles==1)
                return $next($request);
            else
                Toastr::error('You can not access this function', $title = null, $options = []);
                return redirect('/login-admin');
        }
        else{
            Toastr::error('You can not access this function', $title = null, $options = []);
            return redirect('/login-admin');
        }
    }
}
