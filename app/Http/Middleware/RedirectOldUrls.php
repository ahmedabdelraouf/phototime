<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectOldUrls
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentUrl = url()->current();
        if (str_contains($currentUrl, "/index.php/welcome/view_news/")) {
            $arr = explode("/", $currentUrl);
//            dd(end($arr));
//            dd("here we are",$id);
            return redirect()->route('site.albumDetails', ['id' => end($arr)]);
        }

        return $next($request);
    }
}
