<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenerateTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has("token")){
            $session_id = session()->getId();
            $user_agent = $request->header("user-agent");
            $token = system_encryption(json_encode(["agent" => $user_agent, 'id' => $session_id]));
            session()->put("token", $token);
        }
        $lang = session("lang");
        if(!in_array(strtolower($lang), ["en", "ar"])){
            $lang = "en";
        }
        session()->put("lang", $lang);
        app()->setLocale($lang);
        return $next($request);
    }
}
