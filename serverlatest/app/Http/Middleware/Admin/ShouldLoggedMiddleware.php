<?php

namespace App\Http\Middleware\Admin;

use App\Models\AdminSessions;
use Closure;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ShouldLoggedMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(Request $request, Closure $next) {

        $session_id = session()->getId();
        $user_agent = $request->header("user-agent");
        $token = session()->get("token");
        if (empty($token) || !system_encryption_verify(json_encode(["agent" => $user_agent, 'id' => $session_id]), $token)) {
            session()->flush();
            return redirect()->route("admin.auth.login")->with("error", __("You should login first"));
        }
        $admin_session = AdminSessions::where("token", $token)->where("is_expired", "0")->has("adminActive")->first();
        if (empty($admin_session)) {
            session()->flush();
            return redirect()->route("admin.auth.login")->with("error", __("You should login first"));
        }
        $expire_validation = strtotime("-1 Day");
        if (!empty($admin_session->will_expire) && strtotime($admin_session->created_at) <= $expire_validation) {
            $admin_session->is_expired = 1;
            session()->flush();
            return redirect()->route("admin.auth.login")->with("error", "You should login first");
        }
        $this->define_admin_const($admin_session);
        return $next($request);
    }

    private function define_admin_const(AdminSessions $admin_session): void
    {
        $admin = $admin_session->admin;
        define("ADMIN_NAME", $admin->name);
        define("ADMIN_ID", $admin->id);
        define("ADMIN_PHOTO", admin_photo_url((string)$admin->image));
        define("ADMIN_SESSION", $admin_session->id);
    }

}
