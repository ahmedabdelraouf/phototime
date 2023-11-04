<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TopMenus\CreateRequest;
use App\Http\Requests\Admin\TopMenus\UpdateRequest;
use App\Models\TopMenu;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TopMenuController extends AdminBaseController
{
    /**
     * @param Request $request
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function listData(Request $request)
    {
        $menus = TopMenu::with("parent")->cursorPaginate(20,
            ["title_ar", "url_ar", "is_active", "id", "parent_id", "a_title_ar"], "topMenus");
        return view("admin.modules.topMenus.list_data", get_defined_vars());
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function create()
    {
        $parents = TopMenu::where("parent_id", 0)->pluck("title_ar", "id");
        return view("admin.modules.topMenus.create", get_defined_vars());
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    function store(CreateRequest $request): RedirectResponse
    {
        $topMenu = TopMenu::create($request->validated());
        if (!empty($topMenu->id)) {
            return redirect()->route("admin.menus.list")->with("success", "TopMenu Created successfully");
        }
        return redirect()->route("admin.menus.create")->with("error", "No data saved please try again")->withInput();
    }

    /**
     * @param string $type
     * @param int $id
     * @return RedirectResponse
     */
    function updateStatus(string $type, int $id): RedirectResponse
    {
        $topMenu = TopMenu::find($id);
        if (empty($topMenu)) {
            return redirect()->back()->with("error", "TopMenu not exist in system");
        }
        switch (strtolower($type)) {
            case "activate":
                if ($topMenu->is_active == 1) {
                    return redirect()->back()->with("error", "TopMenu Already active");
                }
                $topMenu->is_active = 1;
                break;
            case "deactivate":
                if ($topMenu->is_active == 0) {
                    return redirect()->back()->with("error", "TopMenu Already no active");
                }
                $topMenu->is_active = 0;
                break;
            default:
                return redirect()->back()->with("error", "Wrong type");
        }
        $topMenu->save();
        return redirect()->back()->with("success", "TopMenu Status updated successfully");
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    function edit(int $id)
    {
        $menu = TopMenu::find($id);
        if (empty($menu)) {
            return redirect()->route("admin.menus.list")->with("error", "TopMenu not exist in system");
        }
        $parents = TopMenu::where("parent_id", 0)->where("id", "!=", $id)->pluck("title_ar", "id");
        return view("admin.modules.topMenus.edit", get_defined_vars());
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    function update(UpdateRequest $request, $id): RedirectResponse
    {
        $topMenu = TopMenu::find($id);
        if(empty($topMenu)){
            return redirect()->route("admin.menus.list")->with("error", "TopMenu not exist in system");
        }
        $topMenu->update($request->validated());
        return redirect()->route("admin.menus.list")->with("success", "TopMenu Created successfully");
    }
}
