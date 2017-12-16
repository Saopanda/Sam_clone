<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class cartMiddleware
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
        $cartid = $request->input('cartid');
        $rs = DB::table('carts')->where('id',$cartid)->count();
        if($rs > 0){
            return $next($request);
        }else{
            return redirect('/home/order');
        }
    }
}
