<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Categories\CreateRequest;
use App\Http\Requests\Admin\Categories\UpdateRequest;
use App\Models\Category;
use App\Models\SlugAlias;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriesController extends AdminBaseController
{
    /**
     * @param Request $request
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function listData(Request $request): Application|Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::with("slugData")->with("albums")->cursorPaginate(20,
            ["title", "short_desc", "is_active", "id"], "categories");
        return view("admin.modules.categories.list_data", get_defined_vars());
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function create(): Application|Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view("admin.modules.categories.create", get_defined_vars());
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    function store(CreateRequest $request): RedirectResponse
    {
        $category_data = $request->validated();
        $category_data["image"] = store_image($request->image, "categories", $request->image_name);
        $category = Category::create($category_data);
        if (!empty($category->id)) {
            SlugAlias::create(["module_id" => $category->id, "slug" => $request->slug, "module" => Category::MODULE_NAME]);
            return redirect()->route("admin.categories.list")->with("success", "Category Created successfully");
        }
        return redirect()->route("admin.categories.create")->with("error", "No data saved please try again")->withInput();
    }

    /**
     * @param string $type
     * @param int $id
     * @return RedirectResponse
     */
    function updateStatus(string $type, int $id): RedirectResponse
    {
        $post = Category::find($id);
        if (empty($post)) {
            return redirect()->back()->with("error", "Post not exist in system");
        }
        switch (strtolower($type)) {
            case "activate":
                if ($post->is_active == 1) {
                    return redirect()->back()->with("error", "Post Already active");
                }
                $post->is_active = 1;
                break;
            case "deactivate":
                if ($post->is_active == 0) {
                    return redirect()->back()->with("error", "Post Already no active");
                }
                $post->is_active = 0;
                break;
            default:
                return redirect()->back()->with("error", "Wrong type");
        }
        $post->save();
        return redirect()->back()->with("success", "Post Status updated successfully");
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    function edit(int $id): Application|View|Factory|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $category = Category::find($id);
        if (empty($category)) {
            return redirect()->route("admin.categories.list")->with("error", "Category not exist in system");
        }
        return view("admin.modules.categories.edit", get_defined_vars());
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    function update(UpdateRequest $request, $id): RedirectResponse
    {
        $category = Category::find($id);
        if(empty($category)){
            return redirect()->route("admin.categories.list")->with("error", "Category not exist in system");
        }
        $category_data = $request->validated();
        if(!empty($request->image)){
            $category_data["image"] = store_image($request->image, "categories", $request->image_name);
        }
        $category->update($category_data);
        $slug = $category->slugData;
        if(!empty($slug)){
            $slug->slug = $request->slug;
            $slug->save();
        }

        return redirect()->route("admin.categories.list")->with("success", "Category Created successfully");
    }
}
