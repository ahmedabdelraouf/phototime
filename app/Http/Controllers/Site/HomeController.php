<?php

namespace App\Http\Controllers\Site;

use App\Models\Album;
use App\Models\SliderBanner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends SiteBaseController
{
    /**
     * @param Request $request
     * @return View
     */
    function homePage(Request $request): View
    {
        $sliders = SliderBanner::where("language", app()->getLocale())
            ->where("is_active", 1)->orderBy("order", "ASC")->get();
        $services = Album::where("is_active", 1)->orderBy(\DB::raw('RAND()'))
            ->has("slugData")->with("slugData")->get();
        return view("site.modules.homepage", get_defined_vars());
    }
    /**
     * @param Request $request
     * @return View
     */
    function aboutUs(Request $request): View
    {
        $sliders = SliderBanner::where("language", app()->getLocale())
            ->where("is_active", 1)->orderBy("order", "ASC")->get();
        return view("site.modules.homepage", get_defined_vars());
    }
}
