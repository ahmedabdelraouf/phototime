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
        <form action="" method="POST" enctype="multipart/form-data" id="example">

            <button type="submit" class="btn btn-primary pull-right btn-lg" style="width: 25%">
                <i class="fa fa-fw mr-2 fa-plus"></i> Upload images
            </button>
        </form>
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
                    <form action="{{route("admin.albums.update_images_settings")}}" method="POST" id="updateOrder">

                        <input type="hidden" name="album_id" value="{{$album->id}}">

                        <button type="submit" class="btn btn-primary pull-right btn-lg" style="width: 25%">
                            <i class="fa fa-fw mr-2 fa-edit"></i> Update order
                        </button>

                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style='width: 25%'>Image</th>
                                <th style='width: 25%'>Is Default</th>
                                <th style='width: 25%'>Is Active</th>
                                <th style='width: 25%'>Image Order</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($images as $image)
                                <tr>
                                    <td> {{ $loop->index +1 }} </td>
                                    <td><a href="{{ images_path($image->image) }}" target="_blank"><img
                                                    src="{{ images_path($image->image) }}"
                                                    style="width: 200px;max-height: 200px"></a></td>
                                    <td>
                                        @if(empty($image->is_default))
                                            <a href="{{route("admin.albums.update_image_default", ["album_id" => $image->album_id, "id" => $image->id])}}"
                                               class="mx-2 activate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="Image Default"
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
                                    <td>
                                        <style>
                                            /* Style for the select element */
                                            select {
                                                width: 200px;
                                                padding: 10px;
                                                font-size: 16px;
                                                border: 1px solid #ccc;
                                                border-radius: 5px;
                                                appearance: none; /* Remove default arrow in some browsers */
                                                -moz-appearance: none;
                                                -webkit-appearance: none;
                                            }

                                            /* Style for the options in the dropdown */
                                            select option {
                                                background-color: #fff;
                                                color: #333;
                                            }

                                            /* Placeholder style for the select */
                                            option[disabled]:first-child {
                                                color: #999;
                                            }
                                        </style>
                                        <select class="form-group" name="images[{{$image->id}}]">
                                            @foreach($images as $index=>$im)
                                                <option @if($image->order == $index+1)  selected @endif>{{$index+1}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%"><h4 style="width: 100%;color:#ff0000;text-align: center">No
                                            Images
                                            added</h4></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </form>

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
            maxUpload: 500,
            formSelector: '#example',
        });
    </script>
@endpush




<div class="row">
    <div class="table-responsive">
        <form action="{{route("admin.albums.update_images_settings")}}" method="POST" id="updateOrder">

            <input type="hidden" name="album_id" value="{{$album->id}}">

            <button type="submit" class="btn btn-primary pull-right btn-lg" style="width: 25%">
                <i class="fa fa-fw mr-2 fa-edit"></i> Update order
            </button>

            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style='width: 25%'>Image</th>
                    <th style='width: 25%'>Image Order</th>
                </tr>
                </thead>
                <tbody>
                @forelse($images as $image)
                    <tr>
                        <td> {{ $loop->index +1 }} </td>
                        <td><a href="{{ images_path($image->image) }}" target="_blank"><img
                                        src="{{ images_path($image->image) }}"
                                        style="width: 200px;max-height: 200px"></a></td>

                        <td>
                            <style>
                                /* Style for the select element */
                                select {
                                    width: 200px;
                                    padding: 10px;
                                    font-size: 16px;
                                    border: 1px solid #ccc;
                                    border-radius: 5px;
                                    appearance: none; /* Remove default arrow in some browsers */
                                    -moz-appearance: none;
                                    -webkit-appearance: none;
                                }

                                /* Style for the options in the dropdown */
                                select option {
                                    background-color: #fff;
                                    color: #333;
                                }

                                /* Placeholder style for the select */
                                option[disabled]:first-child {
                                    color: #999;
                                }
                            </style>
                            <select class="form-group" name="images[{{$image->id}}]">
                                @foreach($images as $index=>$im)
                                    <option @if($image->order == $index+1)  selected @endif>{{$index+1}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%"><h4 style="width: 100%;color:#ff0000;text-align: center">No
                                Images
                                added</h4></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </form>

    </div>
</div>