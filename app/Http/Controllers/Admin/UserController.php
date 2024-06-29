<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(3);
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
                'password' => 'required|min:3|max:32',
                'confirm' => 'required|same:password',
                'role' => 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập họ tên',
                'email.required' => 'Bạn chưa nhập email',
                'email.unique' => 'Email đã tồn tại',
                'password.min' => 'Mật khẩu phải có độ dài từ 3 kí tự',
                'password.max' => 'Mật khẩu chỉ có tối đa 32 kí tự',
                'confirm.required' => 'Bạn chưa nhập lại mật khẩu',
                'confirm.same' => 'Mật khẩu không khớp',
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // Hash::make($request -> password),
            'role' => $request->role,
            'follower' => $request->follower, // Sử dụng toán tử null coalescing để đảm bảo giá trị mặc định là 0 nếu giá trị được truyền vào là null
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
            ],
            [
                'name.required' => 'Bạn chưa nhập họ tên',
                'email.required' => 'Bạn chưa nhập email',
            ]
        );
        $user = User::find($id);

        $data = [
            'name' => $request->name,
            'role' => $request->role,
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
        return redirect()->route('admin.user.edit', $user->id)->with('success', 'Cập nhật người dùng thành công');
    }

    public function delete($id)
    {
        User :: find($id)->delete;
        return redirect()->route('admin.user.index', $id)->with('success',  'Xóa người dùng thành công');
    }
}
