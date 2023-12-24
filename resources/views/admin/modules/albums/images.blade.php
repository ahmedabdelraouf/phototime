@extends("admin.layout.master")

@push('browser_title')
    Add Album images ::
@endpush

@section('albums-active')
    active current-page
@endsection


@section('content')
    <form action="" method="POST" enctype="multipart/form-data" id="example">
        <input type="submit" value="save"/>
    </form>
        <div class="x_panel">
            <div class="x_title">
                <h2>Add images for Album ({{$album->title}})</h2>
                <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Add album" href="{{route("admin.albums.list")}}">
                    <i class="fa fa-angle-double-right"></i>
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <div class="row" style="margin-top: 2%">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="multiple-uploader" id="multiple-uploader">
                            <div class="mup-msg">
                                <span class="mup-main-msg">click to upload images.</span>
                                <span class="mup-msg" id="max-upload-number">Upload up to 10 images per time</span>
                                <span class="mup-msg">Only images are allowed for upload</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table  class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style='width: 25%'>Image</th>
                                <th style='width: 25%'>Is Default</th>
                                <th style='width: 25%'>Is Active</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($images as $image)
                                <tr>
                                    <td> {{ $loop->index +1 }} </td>
                                    <td> <a href="{{ images_path($image->image) }}" target="_blank"><img src="{{ images_path($image->image) }}" style="width: 200px;max-height: 200px"></a> </td>
                                    <td>
                                        @if(empty($image->is_default))
                                            <a href="{{route("admin.albums.update_image_default", ["album_id" => $image->album_id, "id" => $image->id])}}" class="mx-2 activate_item" data-bs-toggle="tooltip" data-bs-original-title="Image Default"
                                               title="Make image default"
                                               data-title="{{$image->album->title}}">
                                                <i class="fa fa-check-circle text-secondary"></i>
                                            </a>
                                        @else
                                            Yes
                                        @endif
                                    </td>
                                    <td>
                                        @if(empty($image->is_active))
                                            <span class="badge badge-danger">Not Active</span>
                                        @else
                                            <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%"><h4 style="width: 100%;color:#ff0000;text-align: center">No Posts added</h4></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push("styles")
    <link href="{{url("resources/dashboard/uploader/css/main.css")}}" rel="stylesheet" />
@endpush

@push("scripts")
    <script src="{{url("resources/dashboard/uploader/js/multiple-uploader.js")}}"></script>
    <script type="text/javascript">
        let multipleUploader = new MultipleUploader('#multiple-uploader').init({
            filesInpName:'images',
            maxUpload: 10,
            formSelector: '#example',
        });
    </script>
@endpush
