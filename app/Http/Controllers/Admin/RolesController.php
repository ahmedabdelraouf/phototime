<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Roles\CreateRequest;
use App\Http\Requests\Admin\Roles\UpdateRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
class RolesController extends Controller
{
     /**
     * @param Request $request
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function listData(Request $request)
    {
        $roles = Role::paginate(20);
        return view("admin.modules.roles.list_data", get_defined_vars());
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function create()
    {
        $permissions = Permission::all();
        return view("admin.modules.roles.create", get_defined_vars());
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    function store(CreateRequest $request): RedirectResponse
    {
        $role = Role::create(['name'=>$request->name,'guard_name'=>'web']);
        if (!empty($request->permissions)) {
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route("admin.roles.list")->with("success", "Page Created successfully");
    }

    

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    function edit(int $id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        if (empty($role)) {
            return redirect()->route("admin.roles.list")->with("error", "Role not exist in system");
        }
        return view("admin.modules.roles.edit", get_defined_vars());
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    function update(UpdateRequest $request, $id): RedirectResponse
    {
        $role = Role::find($id);
        if(empty($role)){
            return redirect()->route("admin.roles.list")->with("error", "Role not exist in system");
        }

        $role->update($request->validated());
        if (!empty($request->permissions)) {
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route("admin.roles.list")->with("success", "Role Created successfully");
    }

}
