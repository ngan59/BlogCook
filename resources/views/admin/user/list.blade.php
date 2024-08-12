@extends('admin.layout.master')

@section('title')
    Người dùng
@endsection
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
                            <small>Danh sách</small>
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
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                {{-- <th>Người theo dõi</th> --}}
                                {{-- <th>Đang theo dõi</th> --}}
                                <th>Số điện thoại</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr class="even gradeC" align="center">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td> 
                                <td>{{$user->role ? "1": "0"}}</td>
                                <td>{{$user->phone}}</td>
                                <td class="center">
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i>Sửa</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn người dùng này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i> Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!!$users ->links('pagination::bootstrap-4') !!}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection