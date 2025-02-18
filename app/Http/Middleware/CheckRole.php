<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Http\RedirectResponse; //!added

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     //!Added this function
    // public function handle(Request $request, Closure $next,$userType): Response
    // {
    //     if (!auth()->check() || auth()->user()->role->name !== $userType) {
    //         abort(403, 'Unauthorized');
    //     }
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next, ...$roles): Response
{
    if (!auth()->check() || !in_array(auth()->user()->role->name, $roles)) {
        abort(403, 'Unauthorized');
    }
    return $next($request);
}


    


    
 
}
