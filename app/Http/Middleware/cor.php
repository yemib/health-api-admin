<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class cor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // In Laravel middleware or in the main API route file
         $response = $next($request);
         // Set CORS headers
         $response->headers->set('Access-Control-Allow-Origin', '*');
         $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
         $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');
 
         // Allow preflight requests (OPTIONS) for CORS
         if ($request->isMethod('OPTIONS')) {
             $response->setStatusCode(200);
         }
 
         return $response;
    }
}
