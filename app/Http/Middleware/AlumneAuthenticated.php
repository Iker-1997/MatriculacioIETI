<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlumneAuthenticated
{
    public function handle($request, Closure $next)
    {
        if( Auth::check() )
        {
            // if user admin take him to his dashboard
            if ( Auth::user()->isAdmin() ) {
                 return redirect(route('admin_dashboard'));
            }

            // allow user to proceed with request
            else if ( Auth::user()->isAlumne() ) {
                 return $next($request);
            }
        }

        abort(404);  // for other user throw 404 error
    }
}