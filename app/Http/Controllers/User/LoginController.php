<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function formLogin()
    {
        return view("web.auth.login");
    }

    public function login(Request $request)
    {
        // Validate the request data
        // $validatedData = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ]);

        // Attempt to login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/')->with('success', 'Đăng nhập thành công');
        }

        // Redirect back with an error message
        return redirect()->route('web.auth.login')->with('error', 'Email hoặc mật khẩu không hợp lệ');
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");

    }

    public function profile()
    {
        return view('web.auth.profile');
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',

            ],
            [
                'name.required' => 'Bạn chưa nhập họ tên',
                'email.required' => 'Bạn chưa nhập email',
            ]
        );
        $user = Auth::user();

        $data = [
            'name' => $request->name,
        ];

        // 
        if ($request->password) {
            $data = $request->validate(
                [
                    'password' => 'required|min:3|max:32',
                    'confirm' => 'required|same:password',
                ],
                [
                    'password.min' => 'Mật khẩu phải có độ dài từ 3 kí tự',
                    'password.max' => 'Mật khẩu chỉ có tối đa 32 kí tự',
                    'confirm.required' => 'Bạn chưa nhập lại mật khẩu',
                    'confirm.same' => 'Mật khẩu không khớp',
                ]
            );
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        return redirect()->route('web.profile.index')->with('success', 'Cập nhật tài khoản thành công');
    }
}
