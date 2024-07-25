@extends('admin.layout.master')

@section('title')
    Bình luận
@endsection

<!--day view vao: dung section -->
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">BÌnh luận
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    @if (session('success'))
                        <div class = "alert alert-success"> {{session ('success')}}</div>       
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>                              
                                <th>Nội dung bình luận</th>
                                <th>Đánh giá</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- đổ data ra phần view -->
                          @foreach ($comments as $key => $comment)

                            <tr class="odd gradeX" align="center">
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{$key}}</td>
                                <td>{{$comment->comment_description}}</td>
                                <td>{{$comment->rating }}</td>
                                <td class="center">
                                    <i class="fa fa-eye fa-fw"></i> 
                                    <a href="#">Xem</a> 
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>
                                {{-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Sửa</a></td> --}}
                            </tr>

                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection