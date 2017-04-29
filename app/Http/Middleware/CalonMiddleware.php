<?php

namespace App\Http\Middleware;

use Closure;

class CalonMiddleware
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
        if(\Auth::user()->role_id != ROLE_CALON)
        {
            \Alert::warning('Anda Tidak Punya Akses', 'Peringatan');
            return back();
        }else{
        
            return $next($request);
        }
    }
}
