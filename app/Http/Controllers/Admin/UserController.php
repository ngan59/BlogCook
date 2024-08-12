<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        // $users = User::all();
        return view("admin.user.list", compact("users"));
    }
    public function create()
    {
        return view("admin.user.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'required|min:8|max:32',
                'confirm' => 'required|same:password',
                'role' => 'required',
                'phone' => 'nullable|numeric|digits:10', 
            ],
            [
                'name.required' => 'Bạn chưa nhập họ tên',
                'email.required' => 'Bạn chưa nhập email',
                'email.unique' => 'Email đã tồn tại',
                'password.min' => 'Mật khẩu phải có độ dài từ 8 kí tự',
                'password.max' => 'Mật khẩu chỉ có tối đa 32 kí tự',
                'confirm.required' => 'Bạn chưa nhập lại mật khẩu',
                'confirm.same' => 'Mật khẩu không khớp',
                'phone.numeric' => 'Số điện thoại phải là số',
                'phone.digits' => 'Số điện thoại phải có 10 chữ số',
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            // Hash::make($request -> password),
            'role' => $request->role,
            'follower' => $request->follower,
            'following' => $request->following,
        ]);
        return redirect()->route('admin.user.index')->with('success', 'Thêm người dùng thành công');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {

        $data = $request->validate(
            [
                'name' => 'required',
                'role' => 'required',
                'phone' => 'nullable|numeric|digits:10', 
            ],
            [
                'name.required' => 'Bạn chưa nhập họ tên',
                'email.required' => 'Bạn chưa nhập email',
                'phone.numeric' => 'Số điện thoại phải là số',
                'phone.digits' => 'Số điện thoại phải có 10 chữ số',
            ]
        );
        $user = User::find($id);

        $data = [
            'name' => $request->name,
            'role' => $request->role,
            'phone' => $request->phone,
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
        return redirect()->route('admin.user.index', $user->id)->with('success', 'Cập nhật người dùng thành công');
    }

    public function delete($id)
    {
        User :: find($id)->delete;
        return redirect()->route('admin.user.index', $id)->with('success',  'Xóa người dùng thành công');
    }
}
