<?php

namespace App;

use Google\Cloud\Storage\StorageClient;

class GoogleServicesController
{

    /**
     * @var mixed
     */
    private $projectId;
    /**
     * @var StorageClient
     */
    private $storage;
    /**
     * @var string
     */
    private $bucketName;
    /**
     * @var \Google\Cloud\Storage\Bucket
     */
    private $bucket;

    public function __construct()
    {
        // Get the bucket name from the environment variables
        $this->projectId = env('GOOGLE_CLOUD_PROJECT_ID');
        $this->storage = new StorageClient([
            'projectId' => $this->projectId,
            'keyFilePath' => base_path(env('GOOGLE_CLOUD_KEY_FILE'))
        ]);
        $this->bucketName = env('GOOGLE_CLOUD_STORAGE_BUCKET');
        $this->bucket = $this->storage->bucket($this->bucketName);
    }

    public function uploadImageToGCS($file, $folderDirectory)
    {
        $objectName = $folderDirectory . $file->getClientOriginalName();
        $fileContents = file_get_contents($file->path());
        $uploadedObject = $this->bucket->upload($fileContents, [
            'name' => $objectName,
        ]);
        return $uploadedObject->name();
//        return ['object_id' => $objectId, 'public_url' => $this->getFileByPathAndName($objectId)];
//        $bucket->upload($fileContents, [
//            'name' => $objectName,
//        ]);
//
//
//        // Optionally, you can generate a public URL for the uploaded file
//        $object = $bucket->object($objectName);
//        $object->name();
//        $publicUrl = $object->signedUrl(new \DateTime('tomorrow'));
//
//        dd($publicUrl);
//        // Return response...
    }

    public function getFileByPathAndName($fileName)
    {
        $object = $this->bucket->object($fileName);
        return $object->signedUrl(new \DateTime('tomorrow'));
    }

    public function deletePluckFiles($fileNames)
    {
        // Loop through each file name and delete the corresponding object from GCS
        foreach ($fileNames as $fileName) {
            // Delete the object from GCS
            if ($this->bucket->object($fileName)->exists()) {
                $this->bucket->object($fileName)->delete();
            }
            // You can add error handling or logging here if needed
        }
    }


    public function uploadImageFromOldPathToGCS($fileURL, $folderDirectory)
    {
        $objectName = $folderDirectory . $file->getClientOriginalName();
        $fileContents = file_get_contents($file->path());
        $uploadedObject = $this->bucket->upload($fileContents, [
            'name' => $objectName,
        ]);
        return $uploadedObject->name();
//        return ['object_id' => $objectId, 'public_url' => $this->getFileByPathAndName($objectId)];
//        $bucket->upload($fileContents, [
//            'name' => $objectName,
//        ]);
//
//
//        // Optionally, you can generate a public URL for the uploaded file
//        $object = $bucket->object($objectName);
//        $object->name();
//        $publicUrl = $object->signedUrl(new \DateTime('tomorrow'));
//
//        dd($publicUrl);
//        // Return response...
    }

    public function uploadImageToGCSFromURL($url, $fileNameWithExt, $folderDirectory)
    {
        $objectName = $folderDirectory . $fileNameWithExt;

        try {
            $fileContents = file_get_contents($url);
            $uploadedObject = $this->bucket->upload($fileContents, [
                'name' => $objectName,
            ]);
            return $uploadedObject->name();
        } catch (\Exception $e) {
            return null;
        }
//        return ['object_id' => $objectId, 'public_url' => $this->getFileByPathAndName($objectId)];
//        $bucket->upload($fileContents, [
//            'name' => $objectName,
//        ]);
//
//
//        // Optionally, you can generate a public URL for the uploaded file
//        $object = $bucket->object($objectName);
//        $object->name();
//        $publicUrl = $object->signedUrl(new \DateTime('tomorrow'));
//
//        dd($publicUrl);
//        // Return response...
    }

    public function getAlbumFolderPath($album, $column = "created_at")
    {
        // Extracting necessary information from the album object
        $createdAt = $album->$column; // Assuming the album object has a 'created_at' property
        $albumId = $album->id; // Assuming the album object has an 'id' property

        // Creating directory path
        $year = date('Y', strtotime($createdAt));
        $month = date('m', strtotime($createdAt));
        $day = date('d', strtotime($createdAt));

        // Generating the directory path
        $directoryPath = "Albums_{$year}/{$month}/{$day}/{$albumId}/";

        return $directoryPath;
    }

}