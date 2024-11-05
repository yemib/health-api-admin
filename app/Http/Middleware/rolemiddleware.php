<?php

namespace App\Http\Middleware;

use Closure;

class rolemiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $role)
    {
        echo "Role weldone : " . $role;
        return $next($request);
    }
}
