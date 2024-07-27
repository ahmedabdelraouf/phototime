@extends("admin.layout.master")

@push('browser_title')
    Categories List ::
@endpush

@section('categories-active')
    active current-page
@endsection

@section("page-title")
    Categories Management
@endsection

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Category</h2>
                <a class="btn btn-primary btn-round btn-xs pull-right" title="Add new category"
                   href="{{route("admin.categories.create")}}">
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
                            <th style='width: 20%'>Image</th>
                            <th style='width: 20%'>Title</th>
{{--                            <th style='width: 20%'>Short Description</th>--}}
                            <th style='width: 20%'>Slug</th>
                            <th style='width: 20%'>Total Albums</th>
                            <th style='width: 10%'>Status</th>
                            <th style='width: 5%'></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td> {{ $loop->index +1 }} </td>
                                <td style="width: 5rem;height: 5rem"><img style="width: 5rem;height: 5rem" src=" {{ images_path($category->image) }}"> </td>
                                <td> {{ $category->title }} </td>
{{--                                <td>{{ $category->short_desc }}</td>--}}
                                <td>{{!empty($category->slugData) ? $category->slugData->slug : ""}}</td>
                                <td>{{!empty($category->albums) ? $category->albums->count() : "0"}}</td>
                                <td>
                                    @if(empty($category->is_active))
                                        <span class="badge badge-danger">Not Active</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td class='text-center'>
                                    <div class="btn-group">
                                        @if(empty($category->is_active))
                                            <a href="{{route("admin.categories.update_status", ["type" => "activate", "id" => $category->id])}}"
                                               class="mx-2 activate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="Activate Category"
                                               title="Activate category"
                                               data-title="{{$category->title}}">
                                                <i class="fa fa-check-circle text-secondary"></i>
                                            </a>
                                        @else
                                            <a href="{{route("admin.categories.update_status", ["type" => "deactivate", "id" => $category->id])}}"
                                               class="mx-2 deactivate_item" data-bs-toggle="tooltip"
                                               data-bs-original-title="De-Activate category"
                                               title="De-Activate category"
                                               data-title="{{$category->title}}">
                                                <i class="fa fa-ban text-secondary"></i>
                                            </a>
                                        @endif
                                        <a href="{{route("admin.categories.edit", ["id" => $category->id])}}"
                                           class="mx-2" data-bs-toggle="tooltip" data-bs-original-title="Edit category"
                                           title="Edit category">
                                            <i class="fa fa-pencil text-secondary"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%"><h4 style="width: 100%;color:#ff0000;text-align: center">No
                                        Categories added</h4></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @include('admin.layout.pagination', ['paginator' => $categories])

        </div>
    </div>

@endsection
