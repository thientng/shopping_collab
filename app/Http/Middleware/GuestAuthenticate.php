<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class GuestAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = 'guest'): Response
    {
        if(Auth::guard($guard)->check()){
            $user = Auth::guard($guard)->user();
            $roles = $user->roles;
            $isGuest = false;

            foreach ($roles as $role) {
                if ($role->name == 'guest') {
                    $isGuest = true;
                    break;
                }
            }

            if ($isGuest === false) {
                auth()->guard($guard)->logout();
                return redirect()->route('login')->with('NoAccess', 'Tài khoản của bạn chưa có quyền khách');
            } else if($user->status == 0){
                auth()->guard($guard)->logout();
                return redirect()->route('login')->with('NoActive','Tài khoản chưa được kích hoạt');
            } else {
                return $next($request);
            }

        } else {
            return redirect()->route('login')->with('NoAccess','Hãy đăng nhập để truy cập trang');
        }
    }
}
