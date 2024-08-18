<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Admin\Admins\CreateRequest;
use App\Http\Requests\Admin\Admins\UpdateRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Hash;
class AdminsController extends Controller
{
       /**
     * @param Request $request
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function listData()
    {
        $admins = Admin::paginate(20);
        return view("admin.modules.admins.list_data", get_defined_vars());

    }

      /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function create()
    {
        $roles = Role::all();

        return view("admin.modules.admins.create", get_defined_vars());
    }


      /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(createRequest $request)
    {
       $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $admin->assignRole(Role::findOrFail($request->role_id));

        return redirect()->route("admin.admins.list")->with("success", "Admin Created successfully");

    }


    
    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    function edit(int $id)
    {
        $roles = Role::all();
        $admin = Admin::find($id);
        if (empty($admin)) {
            return redirect()->route("admin.admins.list")->with("error", "Admin not exist in system");
        }
        return view("admin.modules.admins.edit", get_defined_vars());
    }

   /**
     * @param UpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(updateRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $admin->syncRoles(Role::findOrFail($request->role_id));

        return redirect()->route("admin.admins.list")->with("success", "Admin Created successfully");

    }

       /**
     * @param string $type
     * @param int $id
     * @return RedirectResponse
     */
    function updateStatus(string $type, int $id): RedirectResponse
    {
        $admin = Admin::find($id);
        if (empty($admin)) {
            return redirect()->back()->with("error", "Admin not exist in system");
        }
        switch (strtolower($type)) {
            case "activate":
                if ($admin->is_active == 1) {
                    return redirect()->back()->with("error", "Admin Already active");
                }
                $admin->is_active = 1;
                break;
            case "deactivate":
                if ($admin->is_active == 0) {
                    return redirect()->back()->with("error", "Admin Already no active");
                }
                $admin->is_active = 0;
                break;
            default:
                return redirect()->back()->with("error", "Wrong type");
        }
        $admin->save();
        return redirect()->back()->with("success", "Admin Status updated successfully");
    }
}
