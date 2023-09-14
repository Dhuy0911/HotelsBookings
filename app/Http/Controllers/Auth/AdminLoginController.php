<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function viewlogin()
    {
        return view('modules.admin.login');
    }
    public function postlogin(LoginRequest $loginRequest)
    {
        // Kiểm tra xem có tồn tại thông tin đăng nhập không
        $data = $loginRequest->only('email', 'password');

        // Thực hiện xác thực thông tin đăng nhập
        if (Auth::attempt($data)) {

            return redirect()->route('admin.index')->with('success', 'Log In Success');
        }

        return redirect()->route('admin.viewlogin')->with('error', 'Invalid email or password');
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        $request->session()->invalidate(); // Vô hiệu hóa phiên làm việc của người dùng
        $request->session()->regenerateToken(); // Tạo lại CSRF token mới để bảo vệ chống tin tặc
        return redirect()->route('admin.viewlogin'); // Chuyển hướng người dùng đến trang đăng nhập
    }
    public function viewregister()
    {
        return view('modules.admin.register');
    }
    public function postregister(RegisterRequest $storeRequest)
    {
        $dataUsers = $storeRequest->except('_token', 'password_confirmation', 'name');
        $dataInfo = $storeRequest->except('_token', 'password_confirmation', 'email', 'password');
        $dataUsers['created_at'] = new \DateTime; // cập nhật thời gian tạo mới nhất 
        $dataInfo['created_at'] = new \DateTime; // cập nhật thời gian tạo mới nhất 
        $dataUsers['password'] = bcrypt($storeRequest->password); // mã hóa mật khẩu trong database

        DB::table('users')->insert($dataUsers);
        $user = DB::table('users')->where('email', $storeRequest->email)->first();
        $dataInfo['user_id'] = $user->id;
        DB::table('user_info')->insert($dataInfo);

        $authUser = DB::table('users')->find($user->id);
        $authUser = new User((array)$authUser);
        Auth::login($authUser);

        return redirect()->intended(route('admin.index'))->with('success', 'Log In Success');
    }
}
