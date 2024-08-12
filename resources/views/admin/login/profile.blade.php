@extends('admin.layout.master')
@section('title')
    Hồ sơ người dùng
@endsection
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Hồ sơ người dùng
                    <small></small>
                </h1>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7">
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Tên người dùng</label>
                        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" class="form-control" placeholder="Nhập tên người dùng">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="form-control" disabled placeholder="Nhập email người dùng">
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                    </div>

                    <div class="form-group">
                        <label for="confirm">Xác nhận mật khẩu</label>
                        <input type="password" id="confirm" name="confirm" class="form-control" placeholder="Nhập mật khẩu lần nữa">
                    </div>

                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                </form>
            </div>
            <!-- /.col-lg-7 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
