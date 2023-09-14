<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\RegisterOwnerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register(RegisterRequest $storeRequest)
    {
        try {
            $dataUsers = $storeRequest->except('_token', 'password_confirmation', 'name');
            $dataInfo = $storeRequest->except('_token', 'password_confirmation', 'email', 'password');
            $dataUsers['created_at'] = new \DateTime; // cập nhật thời gian tạo mới nhất 
            $dataInfo['created_at'] = new \DateTime; // cập nhật thời gian tạo mới nhất 
            $dataUsers['password'] = bcrypt($storeRequest->password); // mã hóa mật khẩu trong database

            DB::table('users')->insert($dataUsers); // thêm dữ liệu vào bảng users trong db
            $user = DB::table('users')->where('email', $storeRequest->email)->first();
            $dataInfo['user_id'] = $user->id;
            DB::table('user_info')->insert($dataInfo); // thêm dữ liệu vào bảng user_info trong db

            return back()->with('success', 'User created successfully');
        } catch (\Throwable $th) {
            if ($th instanceof \PDOException) {

                return back()->with('error', 'A database error occurred. Please try again.');
            } else {
                return back()->with('error', 'An unknown error occurred. Please try again.');
            }
        }
    }
    public function registerOwner(RegisterOwnerRequest $storeRequest)
    {
        $data = $storeRequest->except('_token');
        $data['created_at'] = new \DateTime; // cập nhật thời gian tạo mới nhất
        $data['user_id'] = Auth::user()->id;

        $file1 = $storeRequest->file('image_idcard_front');
        $file2 = $storeRequest->file('image_idcard_back');
        $file3 = $storeRequest->file('image_business_license');
        $file4 = $storeRequest->file('image_hotels');
        $filename1 = time() . '_' . $file1->getClientOriginalName();
        $filename2 = time() . '_' . $file2->getClientOriginalName();
        $filename3 = time() . '_' . $file3->getClientOriginalName();
        $filename4 = time() . '_' . $file4->getClientOriginalName();
        $file1->move(public_path('image/reg-owner'), $filename1);
        $file2->move(public_path('image/reg-owner'), $filename2);
        $file3->move(public_path('image/reg-owner'), $filename3);
        $file4->move(public_path('image/reg-owner'), $filename4);
        $data['image_idcard_front'] = $filename1;
        $data['image_idcard_back'] = $filename2;
        $data['image_business_license'] = $filename3;
        $data['image_hotels'] = $filename4;


        if (DB::table('reg_owner')->insert($data)) {
            return redirect()->route('hotels.index')->with('success', 'successfully');
        }
    }
}
