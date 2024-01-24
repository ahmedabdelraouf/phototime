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
        $albums = Album::with("slugData")->latest()->paginate(100);
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
    function store(CreateRequest $request)
    {
        $validatedInputs = $request->validated();
        unset($validatedInputs["default_image"]);
        $album = Album::create($validatedInputs);
        if (!empty($album->id)) {
            SlugAlias::create(["module_id" => $album->id, "slug" => $request->slug, "module" => Album::MODULE_NAME]);
            if (isset($request->categories) && is_array($request->categories) && count($request->categories) > 0) {
                $album->categories()->sync($request->categories);
            }
            if (is_file($request->default_image)) {
                $default_image_path = store_image($request->default_image, "albums/$album->id");
                $album->default_image = $default_image_path;
                $album->save();
            }
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

    function updateFeaturedStatus(string $type, int $id): RedirectResponse
    {
        $album = Album::find($id);
        if (empty($album)) {
            return redirect()->back()->with("error", "Album not exist in system");
        }
        switch (strtolower($type)) {
            case "featured":
                if ($album->is_featured == 1) {
                    return redirect()->back()->with("error", "Album Already Featured");
                }
                $album->is_featured = 1;
                break;
            case "not_featured":
                if ($album->is_featured == 0) {
                    return redirect()->back()->with("error", "Album Already not Featured");
                }
                $album->is_featured = 0;
                break;
            default:
                return redirect()->back()->with("error", "Wrong type");
        }
        $album->save();
        return redirect()->back()->with("success", "Album Featured Status updated successfully");
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
            $countAlbumImages = count($album->images);

            foreach ($request->images as $index => $image) {
                $one = store_image($image, "albums/$id");
                $album_images = new AlbumImages;
                $album_images->album_id = $id;
                $album_images->image = $one;
                $album_images->is_default = $index == 0 ? 1 : 0;
                $album_images->is_active = 1;
                $album_images->order = $index + 1 + $countAlbumImages;
                $album_images->save();
            }
        }
        return redirect()->route("admin.albums.addImages", ["id" => $album->id])->with("success", "Images saved successfully");
    }


    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    function updateImagesOrder(Request $request)
    {
        $album = Album::findOrFail($request->album_id);
        if (isset($request->images) && is_array($request->images) && count($request->images) > 0) {
            foreach ($request->images as $imageId => $imageOrder) {
                AlbumImages::where('id', $imageId)->update(['order' => $imageOrder]);
            }
        }
        return redirect()->route("admin.albums.addImages", ["id" => $album->id])->with("success", "Images Order Updated successfully");
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
        $selectedCategories = $album->categories()->pluck('category_id')->toArray();
        $categories = Category::pluck("title", "id");
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
        if (!empty($album_data['is_featured']) && $album_data['is_featured'] == "on") {
            $album_data['is_featured'] = 1;
        } else {
            $album_data['is_featured'] = 0;
        }
        if (!empty($album_data['is_active']) && (($album_data['is_active'] == "on")||($album_data['is_active'] == "1"))) {
            $album_data['is_active'] = 1;
        } else {
            $album_data['is_active'] = 0;
        }
        if (!empty($album_data['is_blocked']) && $album_data['is_blocked'] == "on") {
            $album_data['is_blocked'] = 1;
        } else {
            $album_data['is_blocked'] = 0;
        }
        if (isset($request->default_image) && is_file($request->default_image)) {
            $default_image_path = store_image($request->default_image, "albums/$album->id");
            $album_data['default_image'] = $default_image_path;
            if (isset($default_image_path) && is_file($album->default_image)) {
                unlink($album->default_image);
            }
        }
        $album->update($album_data);
        $ar_slug = $album->slugDataAr;
        if (!empty($ar_slug)) {
            $ar_slug->slug = $request->slug;
            $ar_slug->save();
        }
        if (isset($request->categories) && is_array($request->categories) && count($request->categories) > 0) {
            $album->categories()->sync($request->categories);
        }
        return redirect()->route("admin.albums.list")->with("success", "Album Created successfully");
    }
}
