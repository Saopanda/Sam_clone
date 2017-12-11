<?php

namespace App\Http\Middleware;

use Closure;

class Admin_LoginMiddleware
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
        if(session('admin_name')){
            return $next($request);
        }else{
            return redirect('/admin/login');
        }
    }
}
