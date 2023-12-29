@extends("admin.layout.master")

@push('browser_title')
    Social Media Links ::
@endpush

@section('socialMediaLinks-active')
    active current-page
@endsection

@section("page-title")
    Social Media Links Management
@endsection

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Social Media Links</h2>
                <a class="btn btn-primary btn-round btn-xs pull-right" title="Add new social media link"
                   href="{{route("admin.socialMedia.create")}}">
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
                            <th style='width: 5%'>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($socialMediaLinks as $link)
                            <tr>
                                <td> {{ $loop->index + 1 }} </td>
                                <td style="width: 4rem;height: 4rem;"><a href="{{images_path($link->image)}}"
                                                                         target="_blank"><img
                                                src="{{images_path($link->image)}}" alt="{{$link->name}}"
                                                width="60"></a>
                                </td>
                                <td> {{ $link->title }}</td>
                                <td><a href="{{ $link->url }}" target="_blank" rel="noopener">{{ $link->url }}</a></td>
                                <td>
                                    @if(empty($link->is_active))
                                        <span class="badge badge-danger">Not Active</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">

                                        @if(empty($link->is_active))
                                            <a href="{{route("admin.socialMedia.update_status", ["type" => "activate", "id" => $link->id])}}"
                                               class="mx-2 activate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="Activate Social media link"
                                               title="Activate Social media link"
                                               data-title="{{$link->title}}">
                                                <i class="fa fa-check-circle text-secondary"></i>
                                            </a>
                                        @else
                                            <a href="{{route("admin.socialMedia.update_status", ["type" => "deactivate", "id" => $link->id])}}"
                                               class="mx-2 deactivate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="De-Activate Social media link"
                                               title="De-Activate  Social media link"
                                               data-title="{{$link->title}}">
                                                <i class="fa fa-ban text-secondary"></i>
                                            </a>
                                        @endif
                                        <a href="{{route("admin.socialMedia.edit", ["id" => $link->id])}}"
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
                                <td colspan="100%"><h4 style="width: 100%;color:#ff0000;text-align: center">No Social
                                        Media Links Added Yet</h4></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-footer" style="padding: 2% 0 0 0;width: 100%;">
                {{$socialMediaLinks->links()}}
            </div>
        </div>
    </div>

@endsection

