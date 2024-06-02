<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MeController extends AdminBaseController
{
    /**
     * @param Request $request
     * @return View
     */
    function homepage(Request $request): View
    {
        return view("admin.modules.me.homepage", get_defined_vars());
    }
    function syncDefaultImages(Request $request): View
    {
        dd("syncDefaultImages");
    }
}
