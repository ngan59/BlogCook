@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Người Dùng
                        <small>Thêm</small>
                    </h1>
                    @if(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('admin.user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên người dùng</label>
                            <input class="form-control" name="name" placeholder="Nhập tên người dùng" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" type="email" placeholder="Nhập email" />
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input class="form-control" name="password" type="password" placeholder="Nhập mật khẩu" />
                        </div>
                        <div class="form-group">
                            <label>Xác nhận mật khẩu</label>
                            <input class="form-control" name="confirm" type="password" placeholder="Nhập lại mật khẩu" />
                        </div>
                        <div class="form-group">
                            <label>Vai trò</label>
                            <label class="radio-inline">
                                <input name="role" value="0" checked="true" type="radio">User
                            </label>
                            <label class="radio-inline">
                                <input name="role" value="1" type="radio">Admin
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default"><a href="{{route('admin.user.index')}}">Hủy bỏ</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection