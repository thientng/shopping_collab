<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Middleware\GuestAuthenticate;
use Auth;
use App\Models\User;
use Mail;
use Str;

class AuthController extends Controller
{
    private $user;
    public function __construct(){
        $this->user = new User();
        // $this->middleware(GuestAuthenticate::class)->only('showLoginForm');
    }


    

    public function showLoginForm()
    {
        // dd(Auth::guard('guest')->check());
        if(Auth::guard('guest')->check()){
            return redirect()->route('home');
        }
        return view('client_view.auth.login');
    }

    public function login(Request $request)
    {
        // dd($request);
        $remember = $request->has('rememberMe') ? true : false; 
        // dd($remember);

        if(Auth::guard('guest')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember) ) {

            if(Auth::guard('guest')->check()){
                $user = Auth::guard('guest')->user();
                $roles = $user->roles;
                $isGuest = false;
    
                foreach ($roles as $role) {
                    if ($role->name == 'guest') {
                        $isGuest = true;
                        break;
                    }
                }
    
                if ($isGuest === false) {
                    auth()->guard('guest')->logout();
                    return redirect()->route('login')->with('NoAccess', 'Tài khoản của bạn chưa có quyền khách');
                } else if($user->status == 0){
                    auth()->guard('guest')->logout();
                    return redirect()->route('login')->with('NoActive','Tài khoản chưa được kích hoạt');
                } else {
                    return redirect()->to('home'); 
                }
            }

        } else {
            return redirect()->back()->with('loginFail','Đăng nhập không thành công, hãy kiểm tra lại tài khoản hoặc mật khẩu ❤️');
        }

    }

    public function showRegistrationForm()
    {
        return view('client_view.auth.register');
    }


    public function register(AuthRegisterRequest $request)
    {
        $token = strtoupper(Str::random(10));
        
        $guest = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'token' => $token,
        ]);

        if($guest) {
            // Xử lí set role guest cho user
            $this->setRoleGuest($guest);
            
            // Gửi Email Xác nhận tài khoản
            $this->reSendEmailActiveAccount($guest);

            return redirect()->route('login')->with('yes','Đăng kí thành công, vui lòng kiểm tra email của bạn và xác thực tài khoản!');
        }
        return redirect()->back();
    }

    public function logout()
    {   
        if(Auth::guard('guest')->check()) {
            Auth::guard('guest')->logout();
        }
        return redirect()->route('login');
    }

    private function reSendEmailActiveAccount($user){
        Mail::send('emails.active_account',[
            'guest' => $user
        ],function ($email) use($user){
            $email->subject('Shopping Web - Xác Thực Tài Khoản');
            $email->to($user->email,$user->name);
        });
    }

    public function active($id,$token){
        $user = $this->user->find($id);
        if (!$user) {
            return redirect()->route('login')->with('no', 'Tài khoản không tồn tại!');
        }

        if($user->status==0){
            if($user->token === null) {
                return redirect()->route('login')->with('no','Tài khoản của bạn chưa được kích hoạt, hãy yêu cầu kích hoạt tài khoản!');
            }
    
            if($user->token === $token){
                $user->update([
                    'status'=>1,
                    'token'=>null
                ]);
                return redirect()->route('login')->with('yes', 'Xác nhận tài khoản email thành công, bây giờ bạn có thể đăng nhập tài khoản');
            } else {
                return redirect()->route('login')->with('no','Mã xác nhận của bạn không hợp lệ');
            }
        } else {
            return redirect()->route('login')->with('yes','Tài khoản của bạn đã được kích hoạt, bây giờ bạn có thể đăng nhập');
        }
    }

    public function setRoleGuest($user){
    /* Start add guest role for new user */
        // Find the 'guest' role
        $guestRole = Role::where('name', 'guest')->first();

        // If the 'guest' role doesn't exist, you might want to create it first
        if (!$guestRole) {
            $guestRole = Role::create(['name' => 'guest','display_name' => 'Khách hàng']);
        } 
        $user->roles()->attach($guestRole);
    /* End */
    }

    public function mail()
    {
        $emailName = 'Nguyen Tien Thien';
        Mail::send('hehe.email',[
            'name' => $emailName
        ],function ($email) use($emailName){
            $email->subject('Xác Thực Tài Khoản');
            $email->to('thien.tng04@gmail.com',$emailName);
        });
    }

}
