<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Albums\CreateRequest;
use App\Http\Requests\Admin\Albums\UpdateRequest;
use App\Models\Album;
use App\Models\AlbumImages;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AlbumsController extends AdminBaseController
{

    use SyncOldAlbumImages;

    public function deleteOldImages()
    {
        $albums = Album::where("is_old", 1)->get();
        foreach ($albums as $album) {
            AlbumImages::where("album_id", $album->id)->delete();
        }
    }

    /**
     * @param Request $request
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function listData(Request $request)
    {
//        $this->deleteOldImages();
//        dd("done date updated live");
//        Album::where("is_synced",1)->update(["is_synced"=>0]);
//        $this->oldDataLogic($request);
//        $this->importOldNewsImagesToStorage("2020-01-01");
//        dd("check data");
        if (!empty($request->siodols) & $request->siodols == "siodols1199") {
            try {
//                $this->oldDataLogic($request);
            } catch (\Exception $e) {
            }
        }
        if (!empty($request->removeOldData) & $request->removeOldData) {
            Album::where("id", ">", "4")->delete();
        }
        $query = Album::query();


        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        if ($request->filled('is_featured')) {
            $query->where('is_featured', $request->input('is_featured'));
        }
        if ($request->filled('is_public')) {
            $query->where('is_public', $request->input('is_public'));
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->input('is_active'));
        }

        if ($request->filled('album_number')) {
            $query->where('album_number', $request->input('album_number'));
        }
        $query->orderBy("id", "DESC");
        $albums = $query->paginate(50);

        // Pass only necessary variables to the view
        $data = [
            'albums' => $albums,
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'is_featured' => $request->input('is_featured'),
            'is_public' => $request->input('is_public'),
            'is_active' => $request->input('is_active'),
            'album_number' => $request->input('album_number'),
        ];

        return view("admin.modules.albums.list_data", $data);
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function create()
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
        $validatedInputs["photo_date"] = date("Y-m-d");
        unset($validatedInputs["default_image"]);
        $validatedInputs["is_old"] = false;
        $validatedInputs["is_synced"] = true;
        $album = Album::create($validatedInputs);
        if (!empty($album->id)) {
//            SlugAlias::create(["module_id" => $album->id, "slug" => $request->slug, "module" => Album::MODULE_NAME]);
            if (isset($request->categories) && is_array($request->categories) && count($request->categories) > 0) {
                $album->categories()->sync($request->categories);
            }
            if (is_file($request->default_image)) {
                $default_image_path = store_image($request->default_image, "albums/$album->id", null, true);
//                dd(($default_image_path));
                $album->default_image = $default_image_path;
                $album->save();
//                dd(images_path("albums/$album->id/$album->default_image"));
//                dd(images_path($default_image_path));
            }
//            dd($album);
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

    function deleteAlbum(int $id)
    {
        $album = Album::find($id);
        if (empty($album)) {
            return redirect()->back()->with("error", "Album not exist in system");
        }
        if ($album->delete()) {
            return redirect()->back()->with("success", "Album Deleted successfully");
        }
        return redirect()->back()->with("error", "Something went wrong");
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


    function updatePublicStatus(string $type, int $id): RedirectResponse
    {
        $album = Album::find($id);
        if (empty($album)) {
            return redirect()->back()->with("error", "Album not exist in system");
        }
        switch (strtolower($type)) {
            case "public":
                if ($album->is_public == 1) {
                    return redirect()->back()->with("error", "Album Already public");
                }
                $album->is_public = 1;
                break;
            case "not_public":
                if ($album->is_public == 0) {
                    return redirect()->back()->with("error", "Album Already not public");
                }
                $album->is_public = 0;
                break;
            default:
                return redirect()->back()->with("error", "Wrong type");
        }
        $album->save();
        return redirect()->back()->with("success", "Album public Status updated successfully");
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
        $images = $album->images()->limit(1000)->get();
        foreach ($images as $image) {
            $image->image = asset($image->image);
//            $image->image = env("AWS_PATH") . $image->image;
//            $image->image = $this->GSC->getFileByPathAndName($image->image);
        }
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
    function updateImagesSettings(Request $request)
    {
        $album = Album::findOrFail($request->album_id);
        if (!empty($request->delete_images) && is_array($request->delete_images) && count($request->delete_images) > 0) {
            $images = AlbumImages::whereIn('id', $request->delete_images)->pluck("image");
            foreach ($images as $image) {
                // Convert the relative path to an absolute path
                $absoluteImagePath = public_path($image);
                // Check if the file exists
                if (\File::exists($absoluteImagePath)) {
                    \File::delete($absoluteImagePath);
                }
//                Storage::disk('s3')->delete($image);
            }
//            $this->GSC->deletePluckFiles($images);
            AlbumImages::whereIn('id', $request->delete_images)->delete();
        }
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
            $album_data["image"] = store_image($request->image, "albums", $request->image_name, true);
        }
        $this->setCheckBoxValue($album_data, "is_featured");
        $this->setCheckBoxValue($album_data, "is_active");
        $this->setCheckBoxValue($album_data, "is_blocked");
        $this->setCheckBoxValue($album_data, "is_public");
        if (isset($request->default_image) && is_file($request->default_image)) {
            $default_image_path = store_image($request->default_image, "albums/$album->id", null, true);
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

    public function uploadDropzone(Request $request)
    {
        /*
         *         $id = $request->albumId;
        $album = Album::findOrFail($id);
        $folderDirectory = $this->getAlbumFolderPath($album);
        $file = $request->file;
        $filename = $file->getClientOriginalName();
// Upload the image to AWS S3
        $path = Storage::disk('s3')->putFileAs($folderDirectory, $file, $filename, "public");
//        $gcsDUrl = $this->GSC->uploadImageToGCS($request->file, $folderDirectory);
        $countAlbumImages = count($album->images);
*/
        $id = $request->albumId;
        $album = Album::findOrFail($id);
        $folderDirectory = 'album_images/' . $this->getAlbumFolderPath($album);

        // Validate and store the file
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();

            // Store the file in the specified directory
            $file->move($folderDirectory, $filename);

            // Save image information to database
            $countAlbumImages = count($album->images);
            $album_images = new AlbumImages;
            $album_images->album_id = $id;
            $album_images->image = $folderDirectory . "/$filename";
            $album_images->is_default = 0;
            $album_images->is_active = 1;
            $album_images->order = 1 + $countAlbumImages;
            $album_images->save();

            return response()->json(['message' => 'Image uploaded successfully.', 'image' => $album_images]);
        }

        return response()->json(['message' => 'File upload failed.']);

        $id = $request->albumId;
        $album = Album::findOrFail($id);
        $folderDirectory = $this->getAlbumFolderPath($album);
        $file = $request->file;
        $filename = $file->getClientOriginalName();
        // Store the file in the specified directory
        $path = $file->storeAs($folderDirectory, $filename);

//// Upload the image to AWS S3
//        $path = Storage::disk('s3')->putFileAs($folderDirectory, $file, $filename);
//        $gcsDUrl = $this->GSC->uploadImageToGCS($request->file, $folderDirectory);
        $countAlbumImages = count($album->images);
//        $image = $request->file;
//        $one = store_image($image, "albums/$id");
        $album_images = new AlbumImages;
        $album_images->album_id = $id;
        $album_images->image = $path;
        $album_images->is_default = 0;
        $album_images->is_active = 1;
        $album_images->order = 1 + $countAlbumImages;
        $album_images->save();
        return response()->json(['message' => 'Image uploaded successfully.', "image" => $album_images]);
    }

    private function oldDataLogic($request)
    {
        if (empty($request->stop_debug)) {
//            dd(NewsCmt::count(), NewsViews::count(), News::count());
        }
//        $news = News::all();
//        foreach ($news as $newsDetails) {
//            Album::create([
//                "id" => $newsDetails->id,
//                "title" => $newsDetails->title,
//                "short_desc" => $newsDetails->body,
//                "meta_title" => "",
//                "photo_date" => $newsDetails->date,
//                "photo_owner_name" => NewsCmt::where("news_id", $newsDetails->id)->first()->name ?? null,
//                "photo_place" => "",
//                "owner_email" => NewsCmt::where("news_id", $newsDetails->id)->first()->email ?? null,
//                "meta_description" => "",
//                "meta_keywords" => "",
//                "default_image" => $newsDetails->newspic,
//                "is_active" => $newsDetails->publish,
//                "youtube_url" => null,
//                "is_featured" => 0,
//                "is_public" => 0,
//                "owner_phone" => NewsCmt::where("news_id", $newsDetails->id)->first()->phone ?? null,
//                "views_count" => NewsViews::where("newsid", $newsDetails->id)->first()->views ?? 0,
//                "is_blocked" => 0,
//                "album_number" => $newsDetails->order,
//                "created_at" => $newsDetails->date,
//                "is_old" => true,
//                "is_synced" => false,
//            ]);
//        }
//        dd("check db");
    }

    public function setCheckBoxValue(array &$arr, $index)
    {
        $arr[$index] = !empty($arr[$index]) && in_array($arr[$index], ["on", "1"]) ? 1 : 0;
    }

}
