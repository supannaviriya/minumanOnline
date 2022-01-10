<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    public function handle($request, Closure $next)
    {
        if( Auth::check() )
        {
            // if user is not admin take him to his dashboard
            if ( Auth::user()->isUser() ) {
                 return redirect(route('user_dashboard'));
            }

            // allow admin to proceed with request
            else if ( Auth::user()->isAdmin() ) {
                 return $next($request);
            }
        }

        abort(404);  // for other user throw 404 error
    }
}
