@extends('admin.layout.master')

@section('title')
    Lời nhắn
@endsection
<!--day view vao: dung section -->
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lời nhắn
                            <small>Danh sách</small>
                        </h1>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên người dùng</th>
                                <th>Địa chỉ </th>
                                <th>Số điện thoại</th>
                                <th>Tiêu đề</th>
                                <th>Lời nhắn</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr class="odd gradeX" align="center">             
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->address}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{$contact->message}}</td>
                                <td>
                                    <form action="{{ route('admin.contact.delete', $contact->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa lời nhắn này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i> Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach   
                        </tbody>
                    </table>
                    {{ $contacts->links('pagination::bootstrap-4') }}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection