<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Blog\CreateRequest;
use App\Http\Requests\Admin\Blog\UpdateRequest;
use App\Models\Blog;
use App\Models\SlugAlias;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;


class BlogController extends Controller
{
     /**
     * @param Request $request
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function listData(Request $request)
    {
        $blogPages = Blog::with("slugData")->cursorPaginate(20,
            ["type", "url", "title", "short_desc", "is_active", "id"], "blogPages");
        return view("admin.modules.blog.list_data", get_defined_vars());
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function create()
    {
        return view("admin.modules.blog.create", get_defined_vars());
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    function store(CreateRequest $request): RedirectResponse
    {
        $blogPage = $request->validated();
        $image_name = store_image($request->image, "blog");
        $blogPage["image"] = $image_name;

        $blog = Blog::create($blogPage);
        if (!empty($blog->id)) {
            SlugAlias::create(["module_id" => $blog->id, "slug" => $request->slug, "module" => Blog::MODULE_NAME]);
            return redirect()->route("admin.blog.list")->with("success", "Blog Page Created successfully");
        }
        return redirect()->route("admin.blog.create")->with("error", "No data saved please try again")->withInput();
    }

    /**
     * @param string $type
     * @param int $id
     * @return RedirectResponse
     */
    function updateStatus(string $type, int $id): RedirectResponse
    {
        $blog = Blog::find($id);
        if (empty($blog)) {
            return redirect()->back()->with("error", "Blog Page not exist in system");
        }
        switch (strtolower($type)) {
            case "activate":
                if ($blog->is_active == 1) {
                    return redirect()->back()->with("error", "Blog Page Already active");
                }
                $blog->is_active = 1;
                break;
            case "deactivate":
                if ($blog->is_active == 0) {
                    return redirect()->back()->with("error", "Blog Page Already no active");
                }
                $blog->is_active = 0;
                break;
            default:
                return redirect()->back()->with("error", "Wrong type");
        }
        $blog->save();
        return redirect()->back()->with("success", "Blog Page Status updated successfully");
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    function edit(int $id)
    {
        $blogPage = Blog::find($id);

        if (empty($blogPage)) {
            return redirect()->route("admin.blog.list")->with("error", "Blog not exist in system");
        }
        return view("admin.modules.blog.edit", get_defined_vars());
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    function update(UpdateRequest $request, $id): RedirectResponse
    {
        $blog = Blog::find($id);
        if(empty($blog)){
            return redirect()->route("admin.blog.list")->with("error", "blog page not exist in system");
        }
        $blogPage =$request->validated();

        if (isset($request->image)&&is_file($request->image)){
            $image_name = store_image($request->image, "blog" );
            $blogPage["image"] = $image_name;
        }
        $blog->update($blogPage);
        $slug = $blog->slugData;
        if(!empty($slug)){
            $slug->slug = $request->slug;
            $slug->save();
        }
        return redirect()->route("admin.blog.list")->with("success", "Blog page Created successfully");
    }
}
