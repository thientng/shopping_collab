<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $guard
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $guard = 'admin'): Response
    {
        if(Auth::guard($guard)->check()){
            $user = Auth::guard($guard)->user();
            $roles = $user->roles;
            $isGuest = false;

            if (count($roles) == 1) {
                foreach ($roles as $role) {
                    if ($role->name == 'guest') {
                        $isGuest = true;
                        break;
                    }
                }
            }

            if ($isGuest) {
                auth()->guard($guard)->logout();
                return redirect()->route('admin.login')->with('NoAccess', 'Tài khoản không có quyền truy cập trang quản trị');
            } else if($user->status == 0){
                auth()->guard($guard)->logout();
                return redirect()->route('admin.login')->with('NoActive','Tài khoản chưa được kích hoạt');
            } else {
                return $next($request);
            }

        } else {
            return redirect()->route('admin.login')->with('NoLogin','Hãy đăng nhập để truy cập trang');
        }

    }
    
}
