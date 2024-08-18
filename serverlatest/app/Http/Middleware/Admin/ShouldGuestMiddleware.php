<?php

namespace App\Http\Middleware\Admin;

use App\Models\AdminSessions;
use Closure;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ShouldGuestMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty(AdminSessions::where("token", session()->get("token"))->count())) {
            return redirect()->route("admin.home")->with("error", __("me::auth.already_logged_in"));
        }
        return $next($request);
    }

}
