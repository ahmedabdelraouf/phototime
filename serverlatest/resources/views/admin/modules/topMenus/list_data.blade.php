@extends("admin.layout.master")

@push('browser_title')
    Menus List ::
@endpush

@section('menus-active')
    active current-page
@endsection

@section("page-title")
    Menus Management
@endsection

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Menu</h2>
                <a class="btn btn-primary btn-round btn-xs pull-right" title="Add new menu" href="{{route("admin.menus.create")}}">
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
                            <th style='width: 35%'>Title</th>
                            <th style='width: 15%'>Parent</th>
                            <th style='width: 25%'>Url tag title</th>
                            <th style='width: 10%'>Status</th>
                            <th style='width: 10%'></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($menus as $menu)
                            <tr>
                                <td> {{ $loop->index +1 }} </td>
                                <td> {{ $menu->title }} <br />{{ $menu->url }}</td>
                                <td> {{ $menu->parent_id > 0 ? $menu->parent->title : "Is Parent" }} </td>
                                <td>{{ $menu->a_title }}</td>
                                <td>
                                    @if(empty($menu->is_active))
                                        <span class="badge badge-danger">Not Active</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td class='text-center'>
                                    <div class="btn-group">
                                        @if(empty($menu->is_active))
                                            <a href="{{route("admin.menus.update_status", ["type" => "activate", "id" => $menu->id])}}" class="mx-2 activate_item" data-bs-toggle="tooltip" data-bs-original-title="Activate menu"
                                               title="Activate menu"
                                               data-title="{{$menu->title}}">
                                                <i class="fa fa-check-circle text-secondary"></i>
                                            </a>
                                        @else
                                            <a href="{{route("admin.menus.update_status", ["type" => "deactivate", "id" => $menu->id])}}" class="mx-2 deactivate_item" data-bs-toggle="tooltip" data-bs-original-title="De-Activate menu"
                                               title="De-Activate menu"
                                               data-title="{{$menu->title}}">
                                                <i class="fa fa-ban text-secondary"></i>
                                            </a>
                                        @endif
                                        <a href="{{route("admin.menus.edit", ["id" => $menu->id])}}" class="mx-2" data-bs-toggle="tooltip" data-bs-original-title="Edit menu"
                                           title="Edit menu">
                                            <i class="fa fa-pencil text-secondary"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%"><h4 style="width: 100%;color:#ff0000;text-align: center">No Menus added</h4></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @include('admin.layout.pagination', ['paginator' => $menus])

        </div>
    </div>

@endsection
