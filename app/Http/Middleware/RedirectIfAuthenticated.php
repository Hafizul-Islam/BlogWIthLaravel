<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect('/backend');
                }
                break;
            
            default:
               if (Auth::guard($guard)->check()) {
                    return redirect('admin.logins');
               }
            break;
        }

        return $next($request);
    }
}
