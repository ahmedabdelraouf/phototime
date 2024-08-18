<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;

class HaveAccessMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        return $next($request);
    }

}
