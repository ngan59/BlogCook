<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login.index');
    }

    public function checkLogin(Request $request)
    {

        if (Auth::attempt(["email" => $request->email, 'password' =>  $request->password])) {
            return redirect()->route('admin.dish.index');
        }
        return redirect('/')->with('error', 'Failed');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.auth.login');
    }

    public function profile()
    {
        return view('admin.login.profile');
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
        return redirect()->route('admin.profile.index')->with('success', 'Update Successfully');
    }
}
