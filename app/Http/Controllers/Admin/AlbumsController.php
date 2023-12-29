<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Albums\CreateRequest;
use App\Http\Requests\Admin\Albums\UpdateRequest;
use App\Models\Album;
use App\Models\AlbumImages;
use App\Models\Category;
use App\Models\SlugAlias;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AlbumsController extends AdminBaseController
{
    /**
     * @param Request $request
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function listData(Request $request): Application|Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        $albums = Album::with("slugData")->paginate(50);
        return view("admin.modules.albums.list_data", get_defined_vars());
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function create(): Application|Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::pluck("title", "id");
        return view("admin.modules.albums.create", get_defined_vars());
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    function store(CreateRequest $request): RedirectResponse
    {
        $album = Album::create($request->validated());
        if (!empty($album->id)) {
            SlugAlias::create(["module_id" => $album->id, "slug" => $request->slug, "module" => Album::MODULE_NAME]);
            $album->categories()->sync($request->posts);
            return redirect()->route("admin.albums.addImages", ["id" => $album->id])->with("success", "Album Created successfully");
        }
        return redirect()->route("admin.albums.create")->with("error", "No data saved please try again")->withInput();
    }

    /**
     * @param string $type
     * @param int $id
     * @return RedirectResponse
     */
    function updateStatus(string $type, int $id): RedirectResponse
    {
        $album = Album::find($id);
        if (empty($album)) {
            return redirect()->back()->with("error", "Album not exist in system");
        }
        switch (strtolower($type)) {
            case "activate":
                if ($album->is_active == 1) {
                    return redirect()->back()->with("error", "Album Already active");
                }
                $album->is_active = 1;
                break;
            case "deactivate":
                if ($album->is_active == 0) {
                    return redirect()->back()->with("error", "Album Already no active");
                }
                $album->is_active = 0;
                break;
            default:
                return redirect()->back()->with("error", "Wrong type");
        }
        $album->save();
        return redirect()->back()->with("success", "Album Status updated successfully");
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    function addImages(int $id)
    {
        $album = Album::find($id);
        if (empty($album)) {
            return redirect()->route("admin.albums.list")->with("error", "Album not exist in system");
        }
        $images = $album->images;
        return view("admin.modules.albums.images", get_defined_vars());
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    function uploadImages(Request $request, int $id)
    {
        $album = Album::findOrFail($id);
        if ($request->hasFile("images")) {
            foreach ($request->images as $index => $image) {
                $one = store_image($image, "albums/$id");
                $album_images = new AlbumImages;
                $album_images->album_id = $id;
                $album_images->image = $one;
                $album_images->is_default = $index == 0 ? 1 : 0;
                $album_images->is_active = 1;
                $album_images->save();
            }
        }
        return redirect()->route("admin.albums.addImages", ["id" => $album->id])->with("success", "Images saved successfully");
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    function edit(int $id)
    {
        $album = Album::find($id);
        if (empty($album)) {
            return redirect()->route("admin.albums.list")->with("error", "Album not exist in system");
        }
        $posts = Album::pluck("title", "id");
        $linked_posts = $album->posts()->pluck("post_id")->toArray();
        return view("admin.modules.albums.edit", get_defined_vars());
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    function update(UpdateRequest $request, $id): RedirectResponse
    {
        $album = Album::find($id);
        if (empty($album)) {
            return redirect()->route("admin.albums.list")->with("error", "Album not exist in system");
        }
        $album_data = $request->validated();
        if (!empty($request->image)) {
            $album_data["image"] = store_image($request->image, "albums", $request->image_name);
        }
        $album->update($album_data);
        $ar_slug = $album->slugDataAr;
        if (!empty($ar_slug)) {
            $ar_slug->slug = $request->slug;
            $ar_slug->save();
        }
        $album->posts()->sync($request->posts);
        return redirect()->route("admin.albums.list")->with("success", "Album Created successfully");
    }
}
