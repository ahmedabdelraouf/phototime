@extends("admin.layout.master")

@push('browser_title')
    Pages List ::
@endpush

@section('blog-active')
    active current-blog-page
@endsection

@section("page-title")
    Blog pages Management
@endsection

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Page</h2>
                <a class="btn btn-primary btn-round btn-xs pull-right" title="Add new page" href="{{route("admin.blog.create")}}">
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
                            <th style='width: 25%'>Title (AR)</th>
                            <th style='width: 25%'>Short Description</th>
                            <th style='width: 25%'>Slug</th>
                            <th style='width: 10%'>Status</th>
                            <th style='width: 10%'></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($blogPages as $page)
                            <tr>
                                <td> {{ $loop->index +1 }} </td>
                                <td> {{ $page->title }} </td>
                                <td>{{ $page->short_desc }}</td>
                                <td>{{$page->slugData->slug}}</td>
                                <td>
                                    @if(empty($page->is_active))
                                        <span class="badge badge-danger">Not Active</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td class='text-center'>
                                    <div class="btn-group">
                                        @if(empty($page->is_active))
                                            <a href="{{route("admin.blog.update_status", ["type" => "activate", "id" => $page->id])}}" class="mx-2 activate_item" data-bs-toggle="tooltip" data-bs-original-title="Activate page"
                                               title="Activate page"
                                               data-title="{{$page->title}}">
                                                <i class="fa fa-check-circle text-secondary"></i>
                                            </a>
                                        @else
                                            <a href="{{route("admin.blog.update_status", ["type" => "deactivate", "id" => $page->id])}}" class="mx-2 deactivate_item" data-bs-toggle="tooltip" data-bs-original-title="De-Activate page"
                                               title="De-Activate page"
                                               data-title="{{$page->title}}">
                                                <i class="fa fa-ban text-secondary"></i>
                                            </a>
                                        @endif

                                        <a href="{{route("admin.blog.edit", ["id" => $page->id])}}" class="mx-2" data-bs-toggle="tooltip" data-bs-original-title="Edit blog page"
                                           title="Edit page">
                                            <i class="fa fa-pencil text-secondary"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%"><h4 style="width: 100%;color:#ff0000;text-align: center">No Blogs added</h4></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-footer" style="padding: 2% 0 0 0;width: 100%;">
                @include('admin.layout.pagination', ['paginator' => $blogPages])
            </div>
        </div>
    </div>

@endsection
