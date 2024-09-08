<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function loginAdmin() {
        // dd(bcrypt('Thien.tng1@')); biên dịch chuỗi ra mã để insert vào password

        
        if(Auth::guard('admin')->check()) { // kiểm tra xem đã đăng nhập chưa, sẽ tự độg được lưu session KHI đã đăng nhập Auth::check sẽ trả về true
            // vào .env ở phần SESSION_LIFETIME set = 80640 (tính theo phút tương đương 2 tháng)
            return redirect()->route('admin.index');
        }
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request) {

        $remember = $request->has('rememberMe') ? true : false; // phương thức has('rememberMe') kiểm tra xem them tham số truyền vào - keyname 'rememberMe' trong mảng $request có tồn tại không  
        // dd($remember);

        if(Auth::guard('admin')->attempt([ // gọi đối tượng Auth sử dụng hàm attempt để check xem 2 giá trị của $request được gọi ra có tồn tại trog bảng users không
            'email' => $request->email,
            'password' => $request->password
        ], $remember) ) {
            return redirect()->to('admin/dashboard'); // to('admin/dashboard') có chức năng tương tự route
        } else {
            return redirect()->back()->with('loginFail','Đăng nhập không thành công, hãy kiểm tra lại tài khoản hoặc mật khẩu ❤️');
        }

    }
    public function logout() {
        if(Auth::guard('admin')->check()) { // kiểm tra xem đã đăng nhập chưa
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        } 
        
    }
}
