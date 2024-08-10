@extends("admin.layout.master")

@push('browser_title')
    Add Category images ::
@endpush

@section('albums-active')
    active current-page
@endsection
<!-- Add your custom styles here -->
<style>
    .dropzone {
        border: 2px dashed #007bff;
        border-radius: 8px;
        background-color: #fafafa;
        padding: 20px;
        margin: 20px 0;
        cursor: pointer;
    }
</style>

@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Add images for Category ({{$category->title}})</h2>
            <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Add album"
               href="{{route("admin.albums.list")}}">
                <i class="fa fa-angle-double-right"></i>
            </a>
            <div class="clearfix"></div>
        </div>
        <div class="x_content" style="padding-top: 0.2rem !important;">

            <!-- Dropzone Form -->
            <form action="{{route("admin.categories.uploadDropzone")}}" method="POST" class="dropzone"
                  id="my-dropzone">
                <input type="hidden" name="albumId" value="{{$category->id}}">
                @csrf
            </form>

            @include("admin.modules.categories.images_table")
        </div>
    </div>
@endsection

@push("styles")
    <!-- Add this to your layout or view -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.css">
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2"></script>
@endpush

@push("scripts")
    <script>
        Dropzone.options.myDropzone = {
            maxFilesize: 50, // Set the maximum file size in MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif", // Specify accepted file types
            uploadMultiple: false,
            parallelUploads: 1, // Process only one file at a time
            autoProcessQueue: true, // Disable auto processing to control it manually
            success: function (file, response) {
                // Handle success
                console.log(response);
            },
            error: function (file, response) {
                // Handle error
                console.log(response);
            }
        };
    </script>
@endpush
