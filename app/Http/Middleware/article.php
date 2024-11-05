<?php

namespace App\Http\Middleware;

use Closure;

class article
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
		
	if(!session('admin'))  {  
			
			 return  redirect('/admin_signin');
	}
		
        return $next($request);
		
    }
}
