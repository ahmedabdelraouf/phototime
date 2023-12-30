@extends("admin.layout.master")

@push('browser_title')
    Roles List ::
@endpush

@section('roles-active')
    active current-role
@endsection

@section("role-title")
    Roles Management
@endsection

@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Role</h2>
                <a class="btn btn-primary btn-round btn-xs pull-right" title="Add new role" href="{{route("admin.roles.create")}}">
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
                            <th style='width: 10%'>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td> {{ $loop->index +1 }} </td>
                                <td>{{$role->name}}</td>
                                <td class='text-center'>
                                    <div class="btn-group">
                                        <a href="{{route("admin.roles.edit", ["id" => $role->id])}}" class="mx-2" data-bs-toggle="tooltip" data-bs-original-title="Edit role"
                                           title="Edit role">
                                            <i class="fa fa-pencil text-secondary"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%"><h4 style="width: 100%;color:#ff0000;text-align: center">No Posts added</h4></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-footer" style="padding: 2% 0 0 0;width: 100%;">
                {{$roles->links()}}
            </div>
        </div>
    </div>

@endsection
