@extends("admin.layout.master")

@push('browser_title')
    Success partners ::
@endpush

@section('successPartners-active')
    active current-page
@endsection

@section("page-title")
    Success partners Management
@endsection

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Success partners</h2>
                <a class="btn btn-primary btn-round btn-xs pull-right" title="Add new Success partner"
                   href="{{route("admin.successPartners.create")}}">
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
                        @forelse($successPartners as $successPartner)
                            <tr>
                                <td> {{ $loop->index + 1 }} </td>
                                <td style="width: 4rem;height: 4rem;"><a href="{{images_path($successPartner->image)}}"
                                                                         target="_blank"><img
                                                src="{{images_path($successPartner->image)}}"
                                                alt="{{$successPartner->name}}"
                                                width="60"></a>
                                </td>
                                <td> {{ $successPartner->title }}</td>
                                <td><a href="{{ $successPartner->url }}" target="_blank"
                                       rel="noopener">{{ $successPartner->url }}</a></td>
                                <td>
                                    @if(empty($successPartner->is_active))
                                        <span class="badge badge-danger">Not Active</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">

                                        @if(empty($successPartner->is_active))
                                            <a href="{{route("admin.successPartners.update_status", ["type" => "activate", "id" => $successPartner->id])}}"
                                               class="mx-2 activate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="Activate Success Partner"
                                               title="Activate Success Partner"
                                               data-title="{{$successPartner->title}}">
                                                <i class="fa fa-check-circle text-secondary"></i>
                                            </a>
                                        @else
                                            <a href="{{route("admin.successPartners.update_status", ["type" => "deactivate", "id" => $successPartner->id])}}"
                                               class="mx-2 deactivate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="De-Activate Success Partner"
                                               title="De-Activate Success Partner"
                                               data-title="{{$successPartner->title}}">
                                                <i class="fa fa-ban text-secondary"></i>
                                            </a>
                                        @endif
                                        <a href="{{route("admin.successPartners.edit", ["id" => $successPartner->id])}}"
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

            <div class="tab-footer" style="padding: 2% 0 0 0;width: 100%;">
                {{$successPartners->links()}}
            </div>
        </div>
    </div>

@endsection

