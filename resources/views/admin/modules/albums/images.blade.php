@extends("admin.layout.master")

@push('browser_title')
    Add Album images ::
@endpush

@section('albums-active')
    active current-page
@endsection


@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Add images for Album ({{$album->title}})</h2>

            <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Add album"
               href="{{route("admin.albums.list")}}">
                <i class="fa fa-angle-double-right"></i>
            </a>
            <div class="clearfix"></div>
        </div>

        <div class="x_content" style="padding-top: 0.2rem !important;">
            <form action="" method="POST" enctype="multipart/form-data" id="example">
                <button type="submit" class="btn btn-primary pull-left btn-lg" style="width: 25%">
                    <i class="fa fa-fw mr-2 fa-plus"></i> Upload Images
                </button>
            </form>
            <div class="row" style="margin-top: 2%">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="multiple-uploader" id="multiple-uploader">
                        <div class="mup-msg">
                            <span class="mup-main-msg">click to upload images.</span>
                            <span class="mup-msg" id="max-upload-number">Upload up to 500 images per time</span>
                            <span class="mup-msg">Only images are allowed for upload</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <div class="row">
                        @forelse($images as $image)
                            <div class="col-md-4">
                                <div class="image-item mb-3 border p-2"
                                     style="width: 100%; height: 250px; overflow: hidden;"
                                     onclick="openImageModal('{{ images_path($image->image) }}')">
                                    <div>
                                        <img src="{{ images_path($image->image) }}"
                                             style="width: 100%; height: 20%; object-fit: cover;">
                                    </div>
                                    <div class="d-flex align-items-center mt-2">

                                                        </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    @forelse($images as $image)
                                                        <div class="carousel-item">
                                                            <img src="{{ images_path($image->image) }}" class="d-block w-100" style="object-fit: cover;" alt="Image {{ $loop->index + 1 }}">
                                                        </div>
                                                    @empty
                                                        <p>No images to display</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function openImageModal(imagePath) {
                                    // Set the image source in the modal
                                    $('#carouselExample .carousel-inner').html(`<div class="carousel-item active"><img src="${imagePath}" class="d-block w-100" style="object-fit: cover;" alt="Image"></div>`);
                                    // Open the modal
                                    $('#imageModal').modal('show');
                                }

                                function removeImage(imageId) {
                                    // Implement the logic to remove the image here
                                }

                                $(document).ready(function() {
                                    $('#imageModal').on('show.bs.modal', function() {
                                        // Initialize the carousel when the modal is shown
                                        $('#carouselExample').carousel();
                                    });
                                });
                            </script>
                        @empty
                            <div class="col-md-12">
                                <h4 style="width: 100%; color:#ff0000; text-align: center">No Images added</h4>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("styles")
    <link href="{{url("resources/dashboard/uploader/css/main.css")}}" rel="stylesheet"/>
@endpush

@push("scripts")
    <script src="{{url("resources/dashboard/uploader/js/multiple-uploader.js")}}"></script>
    <script type="text/javascript">
        let multipleUploader = new MultipleUploader('#multiple-uploader').init({
            filesInpName: 'images',
            maxUpload: 100,
            formSelector: '#example',
        });
    </script>
@endpush
