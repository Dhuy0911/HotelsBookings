<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        // Kiểm tra xem có tồn tại thông tin đăng nhập không
        $data = $request->only('email', 'password');

        // Thực hiện xác thực thông tin đăng nhập
        if (Auth::attempt($data)) {

            return back()->with('success', 'Login Success');
        }

        // Xác thực thất bại, hiển thị thông báo lỗi và cho phép người dùng thử lại
        return back()->with(
            'error',
            'Incorrect email or password, try again.',
        );
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        $request->session()->invalidate(); // Vô hiệu hóa phiên làm việc của người dùng
        $request->session()->regenerateToken(); // Tạo lại CSRF token mới để bảo vệ chống tin tặc
        return redirect()->route('home'); // Chuyển hướng người dùng đến trang đăng nhập
    }
}
