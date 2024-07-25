@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Người dùng
                        <small>Chỉnh sửa</small>
                    </h1>
                    @if(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                    @if (session('success'))
                        <div class = "alert alert-success"> {{session ('success')}}</div>       
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Tên người dùng</label>
                            <input class="form-control" value="{{$user->name}}" name="name" placeholder="Nhập tên người dùng" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" value="{{$user->email}}" type="email" disabled placeholder="Nhập email" />
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input class="form-control" name="password" type="password" placeholder="Nhập mật khẩu" />
                        </div>
                        <div class="form-group">
                            <label>Xác nhận mật khẩu</label>
                            <input class="form-control" name="confirm" type="password" placeholder="Xác nhận mật khẩu" />
                        </div>
                        <div class="form-group">
                            <label>Vai trò</label>
                            <label class="radio-inline">
                                <!-- nếu user là admin thì ko check, ko phải thì check -->
                                <input name="role" value="0"  @if( !$user->role) checked @endif type="radio">User
                            </label>
                            <label class="radio-inline">
                                <input name="role" value="1" @if( $user->role) checked @endif type="radio">Admin
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Cập nhật</button>
                        <button type="reset" class="btn btn-default">Hủy bỏ</button>
                        <button type="reset" class="btn btn-default"> <a href="{{ route('admin.user.index')}}">Quay lại </a></button>
                       
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>  
        <!-- /.container-fluid -->
    </div>

@endsection