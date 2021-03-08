<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Alumne
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
        if (!$request->user()->role === 'alumne'){
            return redirect('alumne');
        }
        return $next($request);
    }
}
