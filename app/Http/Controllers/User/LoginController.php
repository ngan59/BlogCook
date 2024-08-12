<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function formLogin()
    {
        return view("web.auth.login");
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/')->with('success', 'Đăng nhập thành công');
        }
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
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                // 'password' => ['required', 'string', 'min:8', 'max:32','regex:/[A-Z]/','regex:/[@$!%*?&#]/','confirmed'],
                'phone' => ['required', 'numeric', 'digits:10'],
            ],
            [
                'name.required' => 'Bạn chưa nhập họ tên',
                'name.string' => 'Tên phải là chuỗi ký tự.',
                'name.max' => 'Tên không được dài quá 255 ký tự.',
                'email.required' => 'Email là bắt buộc.',
                'email.string' => 'Email phải là chuỗi ký tự.',
                'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
                'email.max' => 'Email không được dài quá 255 ký tự.',
                'email.unique' => 'Email này đã được sử dụng.',
                // 'password.required' => 'Mật khẩu là bắt buộc.',
                // 'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
                // 'password.min' => 'Mật khẩu phải có độ dài ít nhất là 8 ký tự.',
                // 'password.max' => 'Mật khẩu chỉ có tối đa 32 kí tự',
                // 'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
                // 'password.regex' => 'Mật khẩu phải chứa ít nhất 1 ký tự in hoa và 1 ký tự đặc biệt.',
                'phone.required' => 'Số điện thoại là bắt buộc.',
                'phone.numeric' => 'Số điện thoại phải là số.',
                'phone.digits' => 'Số điện thoại phải có 10 chữ số.',
            ]
        );
        $user = Auth::user();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

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
    public function forgotPassword()
    {
        return view('web.auth.forgot-password');
    }
    public function sendMail(Request $request)
    {
        if ($user = User::where('email', $request->email)->first()) {
            $mail = new ForgotPassword($user->email);
            Mail::to($user->email)->send($mail);
            return redirect()->back()->with('success', 'Kiểm tra email!');
        }

        return redirect()->back()->with('error', 'Email không hợp lệ!');
    }

    public function formReset(Request $request)
    {
        $email = Crypt::decryptString($request->token);
        if (!User::where('email', $email)->first()) {
            return view('web.auth.reset-password')->with('error', 'Error');
        }
        return view('web.auth.reset-password', compact('email'));
    }

    public function resetPassword(Request $request)
    {
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
        $email = Crypt::decryptString($request->token);
        if (!User::where('email', $email)->first()) {
            return redirect()->route('form-reset')->with('error', 'Error');
        }
        User::where('email', $email)
            ->update([
                'password' => bcrypt($request->password)
            ]);
        return redirect('/login')->with('success', 'Reset password successfully');
    }
}
