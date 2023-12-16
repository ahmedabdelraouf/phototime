<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Pages\CreateRequest;
use App\Http\Requests\Admin\Pages\UpdateRequest;
use App\Models\Category;
use App\Models\Page;
use App\Models\SlugAlias;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PagesController extends AdminBaseController
{
    /**
     * @param Request $request
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function listData(Request $request)
    {
        $pages = Page::with("slugData")->cursorPaginate(20,
            ["type", "url", "title", "short_desc", "is_active", "id"], "pages");
        return view("admin.modules.pages.list_data", get_defined_vars());
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function create()
    {
        return view("admin.modules.pages.create", get_defined_vars());
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    function store(CreateRequest $request): RedirectResponse
    {
        $page = Page::create($request->validated());
        if (!empty($page->id)) {
            SlugAlias::create(["module_id" => $page->id, "slug" => $request->slug, "module" => Page::MODULE_NAME]);
            return redirect()->route("admin.pages.list")->with("success", "Page Created successfully");
        }
        return redirect()->route("admin.pages.create")->with("error", "No data saved please try again")->withInput();
    }

    /**
     * @param string $type
     * @param int $id
     * @return RedirectResponse
     */
    function updateStatus(string $type, int $id): RedirectResponse
    {
        $page = Page::find($id);
        if (empty($page)) {
            return redirect()->back()->with("error", "Page not exist in system");
        }
        switch (strtolower($type)) {
            case "activate":
                if ($page->is_active == 1) {
                    return redirect()->back()->with("error", "Page Already active");
                }
                $page->is_active = 1;
                break;
            case "deactivate":
                if ($page->is_active == 0) {
                    return redirect()->back()->with("error", "Page Already no active");
                }
                $page->is_active = 0;
                break;
            default:
                return redirect()->back()->with("error", "Wrong type");
        }
        $page->save();
        return redirect()->back()->with("success", "Page Status updated successfully");
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    function edit(int $id)
    {
        $page = Page::find($id);
        if (empty($page)) {
            return redirect()->route("admin.pages.list")->with("error", "Page not exist in system");
        }
        return view("admin.modules.pages.edit", get_defined_vars());
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    function update(UpdateRequest $request, $id): RedirectResponse
    {
        $page = Page::find($id);
        if(empty($page)){
            return redirect()->route("admin.pages.list")->with("error", "Page not exist in system");
        }

        $page->update($request->validated());
        $slug = $page->slugData;
        if(!empty($slug)){
            $slug->slug = $request->slug;
            $slug->save();
        }
        return redirect()->route("admin.pages.list")->with("success", "Page Created successfully");
    }
}
