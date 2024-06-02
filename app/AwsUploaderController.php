<?php

namespace App;

use Google\Cloud\Storage\StorageClient;
use Illuminate\Support\Facades\Storage;

class AwsUploaderController
{
    public function upload(Request $request)
    {
        // Custom S3 client with specific credentials
        $s3Client = new S3Client([
            'version' => 'latest',
            'region'  => 'your-region',
            'credentials' => [
                'key'    => 'your-access-key-id',
                'secret' => 'your-secret-access-key',
            ],
        ]);

        // Create an adapter
        $adapter = new AwsS3Adapter($s3Client, 'your-bucket-name');

        // Create a filesystem instance
        $filesystem = new Filesystem($adapter);

        // Folder directory and file information
        $folderDirectory = 'your/folder/directory';
        $file = $request->file('your-file-input-name'); // Assuming you're getting the file from a request
        $fileName = 'your-custom-file-name';

        // Perform the upload
        $path = $filesystem->write($folderDirectory . '/' . $fileName, file_get_contents($file), [
            'visibility' => 'public',
        ]);

        return response()->json(['path' => $path]);
    }
}