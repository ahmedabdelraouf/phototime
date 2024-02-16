@extends("admin.layout.master")

@push('browser_title')
    Youtube CHannel ::
@endpush

@section('successPartners-active')
    active current-page
@endsection

@section("page-title")
    Youtube Channel Management
@endsection

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Youtube CHannel</h2>
                <a class="btn btn-primary btn-round btn-xs pull-right" title="Add new Success partner"
                   href="{{route("admin.youtubeChannel.create")}}">
                    <i class="fa fa-plus-circle"></i>
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" style="text-align: center">
                        <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 25%">logo</th>
                            <th style="width: 25%">name</th>
                            <th style="width: 60%">Url</th>
                            <th style='width: 5%'>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($youtubechannelLinks as $youtubechannelLink)
                            <tr>
                                <td> {{ $loop->index + 1 }} </td>
                                <td style="width: 4rem;height: 4rem;"><a
                                            href="{{images_path($youtubechannelLink->image)}}"
                                            target="_blank"><img
                                                src="{{images_path($youtubechannelLink->image)}}"
                                                alt="{{$youtubechannelLink->name}}"
                                                width="60"></a>
                                </td>
                                <td> {{ $youtubechannelLink->title }}</td>
                                <td><a href="{{ $youtubechannelLink->url }}" target="_blank"
                                       rel="noopener">{{ $youtubechannelLink->url }}</a></td>
                                <td>
                                    @if(empty($youtubechannelLink->is_active))
                                        <span class="badge badge-danger">Not Active</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">

                                        @if(empty($youtubechannelLink->is_active))
                                            <a href="{{route("admin.youtubeChannel.update_status", ["type" => "activate", "id" => $youtubechannelLink->id])}}"
                                               class="mx-2 activate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="Activate Success Partner"
                                               title="Activate Success Partner"
                                               data-title="{{$youtubechannelLink->title}}">
                                                <i class="fa fa-check-circle text-secondary"></i>
                                            </a>
                                        @else
                                            <a href="{{route("admin.youtubeChannel.update_status", ["type" => "deactivate", "id" => $youtubechannelLink->id])}}"
                                               class="mx-2 deactivate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="De-Activate Success Partner"
                                               title="De-Activate Success Partner"
                                               data-title="{{$youtubechannelLink->title}}">
                                                <i class="fa fa-ban text-secondary"></i>
                                            </a>
                                        @endif
                                        <a href="{{route("admin.youtubeChannel.edit", ["id" => $youtubechannelLink->id])}}"
                                           class="mx-2"
                                           data-bs-toggle="tooltip" data-bs-original-title="Edit link"
                                           title="Edit link">
                                            <i class="fa fa-pencil text-secondary"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%"><h4 style="width: 100%;color:#ff0000;text-align: center">No Success
                                        Partners Added Yet</h4></td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @include('admin.layout.pagination', ['paginator' => $youtubechannelLinks])

        </div>
    </div>

@endsection

