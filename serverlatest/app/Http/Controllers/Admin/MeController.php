<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $albums = Album::take(100)->get();
        //all();
        $baseUrl = 'http://www.choemregdcdima.org/files/news/';
        foreach ($albums as $album) {
            $albumDefaultImageUrl = $baseUrl . $album->default_image;
            try {
                $albumDefaultImage = file_get_contents($albumDefaultImageUrl);
            } catch (\Exception $e) {
                continue;
            }
            if ($albumDefaultImage !== false) {
                $imageName = $album->default_image;
                $imagePath = "public/images/albums/$album->id";
                if (!Storage::exists($imagePath)) {
                    Storage::makeDirectory($imagePath);
                }
                // Store the image
                Storage::put("$imagePath/$imageName", $albumDefaultImage);
                // Update the album's default image path
                $album->default_image = $imageName;
                $album->is_default_image_synced = true;
                $album->save();
                echo "Album $album->id default image has been synced <br>";
            }

        }
    }
}
