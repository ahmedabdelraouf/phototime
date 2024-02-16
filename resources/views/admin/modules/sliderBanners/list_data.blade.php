@extends("admin.layout.master")

@push('browser_title')
    Sliders List ::
@endpush

@section('sliders-active')
    active current-page
@endsection

@section("page-title")
    Sliders Management
@endsection

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Banners</h2>
                <a class="btn btn-primary btn-round btn-xs pull-right" title="Add new banner" href="{{route("admin.sliders.create")}}">
                    <i class="fa fa-plus-circle"></i>
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <div class="table-responsive">
                    <table  class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 5%">Language</th>
                            <th style='width: 25%'>Image</th>
                            <th style='width: 25%'>Title</th>
                            <th style='width: 25%'>Url</th>
                            <th style='width: 5%'>Status</th>
                            <th style='width: 10%'></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sliders as $slider)
                            <tr>
                                <td> {{ $loop->index +1 }} </td>
                                <td> {{ strtoupper($slider->language) }}</td>
                                <td> <a href="{{images_path($slider->image)}}" target="_blank"><img src="{{images_path($slider->image)}}" alt="{{$slider->title}}" width="60"></a> </td>
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->url}}</td>
                                <td>
                                    @if(empty($slider->is_active))
                                        <span class="badge badge-danger">Not Active</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td class='text-center'>
                                    <div class="btn-group">
                                        @if(empty($slider->is_active))
                                            <a href="{{route("admin.sliders.update_status", ["type" => "activate", "id" => $slider->id])}}" class="mx-2 activate_item" data-bs-toggle="tooltip" data-bs-original-title="Activate slider"
                                               title="Activate slider"
                                               data-title="{{$slider->title_ar}}">
                                                <i class="fa fa-check-circle text-secondary"></i>
                                            </a>
                                        @else
                                            <a href="{{route("admin.sliders.update_status", ["type" => "deactivate", "id" => $slider->id])}}" class="mx-2 deactivate_item" data-bs-toggle="tooltip" data-bs-original-title="De-Activate slider"
                                               title="De-Activate slider"
                                               data-title="{{$slider->title_ar}}">
                                                <i class="fa fa-ban text-secondary"></i>
                                            </a>
                                        @endif
                                        <a href="{{route("admin.sliders.edit", ["id" => $slider->id])}}" class="mx-2" data-bs-toggle="tooltip" data-bs-original-title="Edit slider"
                                           title="Edit slider">
                                            <i class="fa fa-pencil text-secondary"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%"><h4 style="width: 100%;color:#ff0000;text-align: center">No Sliders added</h4></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @include('admin.layout.pagination', ['paginator' => $sliders])

        </div>
    </div>

@endsection
