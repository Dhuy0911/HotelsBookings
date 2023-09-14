<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('modules.client.reset-password');
    }
    public function forgot(Request $request)
    {
       $data =  $request->all();
       dd($data);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();

            // Đăng nhập ngay sau khi reset mật khẩu thành công
            Auth::login($user);
        });

        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->route('home')->with('success', 'Password reset successful!');
        } else {
            return back()->withErrors(['email' => trans($status)]);
        }
    }
}
