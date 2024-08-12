@extends('admin.layout.master')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng
                    <small>Chỉnh sửa</small>
                </h1>
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            <p>{{ $err }}</p>
                        @endforeach
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('put')
                    
                    <div class="form-group">
                        <label for="name">Tên người dùng</label>
                        <input class="form-control" id="name" value="{{ old('name', $user->name) }}" name="name" placeholder="Nhập tên người dùng" />
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" value="{{ $user->email }}" type="email" disabled placeholder="Nhập email" />
                    </div>

                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input class="form-control" id="phone" value="{{ old('phone', $user->phone) }}" name="phone" placeholder="Nhập số điện thoại" />
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Nhập mật khẩu" />
                    </div>

                    <div class="form-group">
                        <label for="confirm">Xác nhận mật khẩu</label>
                        <input class="form-control" id="confirm" name="confirm" type="password" placeholder="Xác nhận mật khẩu" />
                    </div>

                    <div class="form-group">
                        <label>Vai trò</label>
                        <div class="radio">
                            <label>
                                <input name="role" value="0" @if(!$user->role) checked @endif type="radio">User
                            </label>
                            <label>
                                <input name="role" value="1" @if($user->role) checked @endif type="radio">Admin
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-default">Cập nhật</button>
                    <button type="reset" class="btn btn-default">Hủy bỏ</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-default">Quay lại</a>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>  
    <!-- /.container-fluid -->
</div>

@endsection
