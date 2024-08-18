<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Categories\CreateRequest;
use App\Http\Requests\Admin\Categories\UpdateRequest;
use App\Models\Category;
use App\Models\CategoryImage;
use App\Models\CategoryImages;
use App\Models\SlugAlias;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriesController extends AdminBaseController
{
    function listData(Request $request)
    {
        $categories = Category::with("slugData")->with("albums")->cursorPaginate(20,
            ["title", "short_desc", "is_active", "id", "image"], "categories");
        return view("admin.modules.categories.list_data", get_defined_vars());
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function create()
    {
        return view("admin.modules.categories.create", get_defined_vars());
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    function store(CreateRequest $request)
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
    function updateStatus(string $type, int $id)
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
    function edit(int $id)
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
        if (empty($category)) {
            return redirect()->route("admin.categories.list")->with("error", "Category not exist in system");
        }
        $category_data = $request->validated();
        if (!empty($request->image)) {
            $category_data["image"] = store_image($request->image, "categories", $request->image_name);
        }
        $category->update($category_data);
        $slug = $category->slugData;
        if (!empty($slug)) {
            $slug->slug = $request->slug;
            $slug->save();
        }

        return redirect()->route("admin.categories.list")->with("success", "Category Created successfully");
    }


    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    function addImages(int $id)
    {
        $category = Category::find($id);
        if (empty($category)) {
            return redirect()->route("admin.categories.list")->with("error", "Category not exist in system");
        }
        $images = $category->images()->limit(1000)->get();
        foreach ($images as $image) {
            $image->image = asset($image->image);
        }
        return view("admin.modules.categories.images", get_defined_vars());
    }

    public function uploadDropzone(Request $request)
    {
        $id = $request->albumId;
        $category = Category::findOrFail($id);
        $folderDirectory = 'categories/' . $category->id;

        // Validate and store the file
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move($folderDirectory, $filename);
            $categoryImage = new CategoryImage();
            $categoryImage->category_id = $id;
            $categoryImage->image = $folderDirectory . "/$filename";
            $categoryImage->save();
            return response()->json(['message' => 'Image uploaded successfully.', 'image' => $categoryImage]);
        }

        return response()->json(['message' => 'File upload failed.']);
    }

    function updateImagesSettings(Request $request)
    {
        $album = Category::findOrFail($request->album_id);
        if (!empty($request->delete_images) && is_array($request->delete_images)
            && count($request->delete_images) > 0) {
            $images = CategoryImage::whereIn('id', $request->delete_images)->pluck("image");
            foreach ($images as $image) {
                $absoluteImagePath = public_path($image);
                if (\File::exists($absoluteImagePath)) {
                    \File::delete($absoluteImagePath);
                }
            }
            CategoryImage::whereIn('id', $request->delete_images)->delete();
        }
        if (isset($request->images) && is_array($request->images) && count($request->images) > 0) {
            foreach ($request->images as $imageId => $imageOrder) {
                CategoryImage::where('id', $imageId)->update(['order' => $imageOrder]);
            }
        }
        return redirect()->route("admin.categories.addImages", ["id" => $album->id])->with("success", "Images Order Updated successfully");
    }
}
