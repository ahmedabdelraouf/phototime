$bucketName = "phototime21prod"
$totalSize = 0

$objects = aws s3api list-objects --bucket $bucketName --query 'Contents[].{Size: Size}' --output text

foreach ($object in $objects) {
    $totalSize += $object.Size
}

Write-Output "Total size of ${bucketName}: ${totalSize} bytes"
