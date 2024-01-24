@extends("admin.layout.master")

@push('browser_title')
    Admins List ::
@endpush

@section('admins-active')
    active current-admin
@endsection

@section("admin-title")
    Admins Management
@endsection

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Admin</h2>
                <a class="btn btn-primary btn-round btn-xs pull-right" title="Add new admin" href="{{route("admin.admins.create")}}">
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
                            <th style='width: 25%'>name (AR)</th>
                            <th style='width: 25%'>email</th>
                            <th style='width: 10%'>Status</th>
                            <th style='width: 10%'></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($admins as $admin)
                            <tr>
                                <td> {{ $loop->index +1 }} </td>
                                <td> {{ $admin->name }} </td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    @if(empty($admin->is_active))
                                        <span class="badge badge-danger">Not Active</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td class='text-center'>
                                    <div class="btn-group">
                                        @if(empty($admin->is_active))
                                            <a href="{{route("admin.admins.update_status", ["type" => "activate", "id" => $admin->id])}}" class="mx-2 activate_item" data-bs-toggle="tooltip" data-bs-original-title="Activate admin"
                                               title="Activate admin"
                                               data-title="{{$admin->title}}">
                                                <i class="fa fa-check-circle text-secondary"></i>
                                            </a>
                                        @else
                                            <a href="{{route("admin.admins.update_status", ["type" => "deactivate", "id" => $admin->id])}}" class="mx-2 deactivate_item" data-bs-toggle="tooltip" data-bs-original-title="De-Activate admin"
                                               title="De-Activate admin"
                                               data-title="{{$admin->title}}">
                                                <i class="fa fa-ban text-secondary"></i>
                                            </a>
                                        @endif
                                        <a href="{{route("admin.admins.edit", ["id" => $admin->id])}}" class="mx-2" data-bs-toggle="tooltip" data-bs-original-title="Edit admin"
                                           title="Edit admin">
                                            <i class="fa fa-pencil text-secondary"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%"><h4 style="width: 100%;color:#ff0000;text-align: center">No Admins added</h4></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-footer" style="padding: 2% 0 0 0;width: 100%;">
                {{$admins->links()}}
            </div>
        </div>
    </div>

@endsection
