@extends("admin.layout.master")

@push('browser_title')
    Album List ::
@endpush

@section('albums-active')
    active current-page
@endsection

@section("page-title")
    Album Management
@endsection

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Album Total Albums: {{$albums->total()}} </h2>
                <a class="btn btn-primary btn-round btn-xs pull-right" title="Add new album"
                   href="{{route("admin.albums.create")}}">
                    <i class="fa fa-plus-circle"></i>
                </a>
                <div class="clearfix"></div>
            </div>
            {{--            @include('admin.layout.pagination', ['paginator' => $albums, 'elements' => []])--}}
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <form action="{{ route('admin.albums.list') }}" method="GET" class="row">
                    <div class="col-md-2 form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" id="title"
                               value="{{ $title ?? old('title') }}">
                    </div>


                    <div class="col-md-2 form-group">
                        <label for="album_number">Album number:</label>
                        <input type="text" class="form-control" name="album_number" id="album_number"
                               value="{{ $album_number ?? old('album_number') }}">
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" name="date" id="date"
                               value="{{ $date ?? old('date') }}">
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="is_featured">Is Featured:</label>
                        <select class="form-control" name="is_featured" id="is_featured">
                            <option value="1" {{ ($is_featured ?? old('is_featured')) == 1 ? 'selected' : '' }}>Yes
                            </option>
                            <option value="0" {{ ($is_featured ?? old('is_featured')) == 0 ? 'selected' : '' }}>No
                            </option>
                            <option value="" {{ !isset($is_featured) && old('is_featured') === null ? 'selected' : '' }}>
                                All
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2 form-group">
                        <label for="is_active">Publish:</label>
                        <select class="form-control" name="is_active" id="is_active">
                            <option value="1" {{ ($is_active ?? old('is_active')) == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ ($is_active ?? old('is_active')) == 0 ? 'selected' : '' }}>No</option>
                            <option value="" {{ !isset($is_active) && old('is_active') === null ? 'selected' : '' }}>
                                All
                            </option>
                        </select>
                    </div>

                    <div class="col-md-1 form-group">
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            {{--                            <th style="width: 5%">#</th>--}}
                            {{--                            <th style='width: 25%'>Default Image</th>--}}
                            <th style='width: 25%'>Title</th>
                            <th style='width: 10%'>Number</th>
                            <th style='width: 10%'>Share</th>
                            {{--                            <th style='width: 25%'>Short Description</th>--}}
                            <th style='width: 25%'>Album Details</th>
                            <th style='width: 10%'>Views</th>
                            <th style='width: 10%'>Images</th>
                            <th style='width: 10%'>Featured</th>
                            <th style='width: 10%'>Published</th>
                            <th style='width: 10%'>Blocked</th>
                            <th style='width: 10%'>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($albums as $album)
                            <tr>
                                {{--                                <td> {{ $loop->index +1 }} </td>--}}
                                {{--                                <td>--}}
                                {{--                                    @if(isset($album->default_image))--}}
                                {{--                                        <img src="{{ images_path($album->default_image) }}"--}}
                                {{--                                             style="width: 10rem;height: 5rem">--}}
                                {{--                                    @else--}}
                                {{--                                        --}}{{--                                        @dd($album->images)--}}
                                {{--                                        --}}{{--                                        <img src="{{ images_path($album->images[0]->image) }}"--}}
                                {{--                                        --}}{{--                                             style="width: 200px;max-height: 200px">--}}
                                {{--                                    @endif--}}
                                {{--                                </td>--}}

                                <td><a href="{{route('site.albumDetails',['id'=>$album->id])}}">{{ $album->title }}</a>
                                <td>{{ $album->id }}</td>

                                <td>
                                    <button class="share_item btn" onclick="shareViaWhatsApp('{{ route('site.albumDetails', ['id' => $album->id]) }}', '{{ $album->title }}')" data-bs-toggle="tooltip" data-bs-original-title="Share via WhatsApp">
                                        <span class="fa fa-whatsapp text-success" style="font-size: 34px;"></span>
                                    </button>
                                </td>

                                </td>
                                {{--                                <td>{{ $album->short_desc }}</td>--}}
                                <td>
                                    <div><b>Date</b> {{date("D, d M Y", strtotime($album->photo_date))}}</div>
                                    {{--                                    <div><b>Owner name</b> {{$album->photo_owner_name}}</div>--}}
                                </td>
                                <td>{{ $album->views_count }}</td>
                                <td><a class="btn btn-primary"
                                       href='{{route("admin.albums.addImages", ["id" => $album->id])}}'>Images</a></td>


                                <td style="font-size: 1rem">
                                    @if(empty($album->is_featured))
                                        <span class="badge badge-danger">Not Featured</span>
                                    @else
                                        <span class="badge badge-success">Featured</span>
                                    @endif
                                </td>
                                <td style="font-size: 1rem">
                                    @if(empty($album->is_active))
                                        <span class="badge badge-danger">Not Published</span>
                                    @else
                                        <span class="badge badge-success">Published</span>
                                    @endif
                                </td>
                                <td>
                                    @if($album->is_blocked)
                                        <span class="badge badge-danger">Blocked</span>
                                    @else
                                        <span class="badge badge-success">Not Blocked</span>
                                    @endif
                                </td>
                                <td class='text-center'>
                                    <div style="font-size: 22px" class="btn-group">
                                        @if(empty($album->is_active))
                                            <a href="{{route("admin.albums.update_status", ["type" => "activate", "id" => $album->id])}}"
                                               class="mx-2 publish_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="Publish album"
                                               title="Publish album"
                                               data-title="{{$album->title}}">
                                                <i class="fa fa-check-circle text-success"></i>
                                            </a>
                                        @else
                                            <a href="{{route("admin.albums.update_status", ["type" => "deactivate", "id" => $album->id])}}"
                                               class="mx-2 unpublish_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="Un-Publish album"
                                               title="un-publish album"
                                               data-title="{{$album->title}}">
                                                <i class="fa fa-ban text-secondary"></i>
                                            </a>
                                        @endif

                                        @if(empty($album->is_featured))
                                            <a href="{{route("admin.albums.update_featured_status", ["type" => "featured", "id" => $album->id])}}"
                                               class="mx-2 activate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="Feature album"
                                               title="Feature album"
                                               data-title="{{$album->title}}">
                                                <i class="fa fa-star  text-secondary"></i>
                                            </a>
                                        @else
                                            <a href="{{route("admin.albums.update_featured_status",["type" => "not_featured", "id" => $album->id])}}"
                                               class="mx-2 deactivate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="Disable Featured album"
                                               title="Disable Featured album"
                                               data-title="{{$album->title}}">
                                                <i class="fa fa-star text-warning"></i>
                                            </a>
                                        @endif

                                        <a href="{{route("admin.albums.edit", ["id" => $album->id])}}" class="mx-2"
                                           data-bs-toggle="tooltip" data-bs-original-title="Edit album"
                                           title="Edit album">
                                            <i class="fa fa-pencil text-primary"></i>
                                        </a>

                                        <a href="{{route("admin.albums.delete",["id" => $album->id])}}"
                                           class="mx-2 delete_item" data-bs-toggle="tooltip"
                                           data-bs-original-title="Delete album"
                                           title="Delete album"
                                           data-title="{{$album->title}}">
                                            <i class="fa fa-trash-o text-danger"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%"><h4 style="width: 100%;color:#ff0000;text-align: center">No Posts
                                        added</h4></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('admin.layout.pagination', ['paginator' => $albums])
    </div>


    <script>
        function shareViaWhatsApp(link, title) {
            var whatsappUrl = 'https://api.whatsapp.com/send?text=' + encodeURIComponent(title + ': ' + link);
            window.open(whatsappUrl);
        }
    </script>
@endsection
