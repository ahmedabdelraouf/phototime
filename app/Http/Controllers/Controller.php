<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getAlbumFolderPath($album, $column = "created_at")
    {
        // Extracting necessary information from the album object
        $createdAt = $album->$column; // Assuming the album object has a 'created_at' property
        $albumId = $album->id; // Assuming the album object has an 'id' property

        // Creating directory path
        $year = date('Y', strtotime($createdAt));
        $month = date('m', strtotime($createdAt));

//        $day = date('d', strtotime($createdAt));
        // Generating the directory path with day
//        $directoryPath = "Albums_{$year}/{$month}/{$day}/{$albumId}";

        // Generating the directory path
        $directoryPath = "Albums_{$year}/{$month}/{$albumId}";

        return $directoryPath;
    }
}
