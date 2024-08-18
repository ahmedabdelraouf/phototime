<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Authentication\LoginRequest;
use App\Models\Admin;
use App\Models\AdminSessions;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class AuthenticationController extends AdminBaseController
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function login()
    {
        return view("admin.modules.authentication.login", get_defined_vars());
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    function doLogin(LoginRequest $request)
    {
        $admin = Admin::where("email", $request->u_email)->active()->first();
        if (!empty($admin) && system_encryption_verify($request->u_password, $admin->password)) {
            $admin_session = new AdminSessions;
            $admin_session->token = session()->get("token");
            $admin_session->admin_id = $admin->id;
            $admin_session->user_agent = $request->header("user-agent");
            $admin_session->will_expire = empty($request->u_remember_me) ? 1 : 0;
            $admin_session->save();
            return redirect()->route("admin.home")->with("success", "You are logged in successfully");
        }
        return redirect()->back()->with("error", trans("me::auth.wrong_credentials"));
    }

    /**
     * @return RedirectResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    function logout()
    {
        $admin_session = AdminSessions::find(ADMIN_SESSION);
        $admin_session->token = "";
        $admin_session->save();
        session()->remove("token");
        return redirect()->route("admin.auth.login")->with("success", "You are logged out successfully");
    }
}
