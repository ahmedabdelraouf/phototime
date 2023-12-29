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
                <h2>List Album</h2>
                <a class="btn btn-primary btn-round btn-xs pull-right" title="Add new album"
                   href="{{route("admin.albums.create")}}">
                    <i class="fa fa-plus-circle"></i>
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style='width: 25%'>defaultImage</th>
                            <th style='width: 25%'>Title</th>
                            <th style='width: 25%'>Short Description</th>
                            <th style='width: 25%'>Album Details</th>
                            <th style='width: 10%'>Views</th>
                            <th style='width: 10%'>Status</th>
                            <th style='width: 10%'></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($albums as $album)
                            <tr>
                                <td> {{ $loop->index +1 }} </td>
                                <td><img src="{{ images_path($album->defaultImage[0]->image) }}"
                                         style="width: 200px;max-height: 200px"></td>
                                <td> {{ $album->title }} </td>
                                <td>{{ $album->short_desc }}</td>
                                <td>
                                    <div><b>Date</b> {{date("D, d M Y", strtotime($album->photo_date))}}</div>
                                    <div><b>Owner name</b> {{$album->photo_owner_name}}</div>
                                </td>
                                <td>{{ $album->views_count }}</td>
                                <td>
                                    @if(empty($album->is_active))
                                        <span class="badge badge-danger">Not Active</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td class='text-center'>
                                    <div class="btn-group">
                                        @if(empty($album->is_active))
                                            <a href="{{route("admin.albums.update_status", ["type" => "activate", "id" => $album->id])}}"
                                               class="mx-2 activate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="Activate album"
                                               title="Activate album"
                                               data-title="{{$album->title}}">
                                                <i class="fa fa-check-circle text-secondary"></i>
                                            </a>
                                        @else
                                            <a href="{{route("admin.albums.update_status", ["type" => "deactivate", "id" => $album->id])}}"
                                               class="mx-2 deactivate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="De-Activate album"
                                               title="De-Activate album"
                                               data-title="{{$album->title}}">
                                                <i class="fa fa-ban text-secondary"></i>
                                            </a>
                                        @endif
                                        <a href="{{route("admin.albums.edit", ["id" => $album->id])}}" class="mx-2"
                                           data-bs-toggle="tooltip" data-bs-original-title="Edit album"
                                           title="Edit album">
                                            <i class="fa fa-pencil text-secondary"></i>
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

            <div class="tab-footer" style="padding: 2% 0 0 0;width: 100%;">
                {{$albums->links()}}
            </div>
        </div>
    </div>

@endsection
