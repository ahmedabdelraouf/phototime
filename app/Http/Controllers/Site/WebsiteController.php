<?php

namespace App\Http\Controllers\Site;

use App\Models\Album;
use App\Models\SliderBanner;
use App\Models\SlugAlias;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WebsiteController extends SiteBaseController
{
    /**
     * @param $id
     * @param $slug
     * @return View
     */
    function view($id, $slug): View
    {
        $slug = SlugAlias::where("slug", $slug)->firstOrFail();
        dd($slug);
        return view("site.modules.homepage", get_defined_vars());
    }
}
