<?php

namespace App\Http\Middleware\Site;

use App\Models\TopMenu;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SetLocaleMiddleware
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
        $lang = "ar";
        session()->put("lang", $lang);
        app()->setLocale($lang);
        view()->share('menu_data', TopMenu::getFullMenuStructure());
        return $next($request);
    }
}
