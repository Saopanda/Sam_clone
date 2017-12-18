<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class useryzMiddleware
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
        $ids = session('user_id');
        $rs = DB::table('user')->where('id',$ids)->value('ztid');
        if($rs == 0){
            return redirect('/signup/send/'.$ids);
        }else{
            return $next($request);
        }
        
    }
}
