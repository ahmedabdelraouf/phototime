<?php

namespace App\Http\Controllers\Site;

use App\Models\Album;
use App\Models\Category;
use App\Models\Page;
use App\Models\SlugAlias;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WebsiteController extends SiteBaseController
{
    /**
     * @param Request $request
     * @param string $slug
     * @return View
     */
    function view(Request $request, string $slug): View
    {
        $slug_data = SlugAlias::where("slug", $slug)->firstOrFail();
        switch ($slug_data->module) {
            case Page::MODULE_NAME:
                return $this->staticPages($request, $slug_data);

            case Category::MODULE_NAME:
                return $this->category($request, $slug_data);

            case Album::MODULE_NAME:
                return $this->albums($request, $slug_data);

            default:
                return view("site.modules.static_page", get_defined_vars());
        }
    }

    /**
     * @param Request $request
     * @param SlugAlias $slug_data
     * @return View
     */
    private function staticPages(Request $request, SlugAlias $slug_data): View
    {
        $page = Page::where("is_active", 1)->find($slug_data->module_id);
        if (is_null($page)) {
            abort(404);
        }
        return view("site.modules.static_page", ['page' => $page]);
    }

    /**
     * @param Request $request
     * @param SlugAlias $slug_data
     * @return View
     */
    private function albums(Request $request, SlugAlias $slug_data): View
    {
        $page = Album::where("is_active", 1)->find($slug_data->module_id);
        return view("site.modules.album", get_defined_vars());
    }

    /**
     * @param Request $request
     * @param SlugAlias $slug_data
     * @return View
     */
    private function category(Request $request, SlugAlias $slug_data): View
    {
        $category = Category::where("is_active", 1)->findOrFail($slug_data->module_id);
        $albums = $category->albums;
        return view("site.modules.show_category", get_defined_vars());
    }

    /**
     * @param Request $request
     * @param SlugAlias $slug_data
     * @return View
     */
    private function categoryDetails(Category $category): View
    {
        dd('web categoryDetails');
        return view("site.modules.show_category", get_defined_vars());
    }
}
