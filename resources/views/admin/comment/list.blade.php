@extends('admin.layout.master')

@section('title')
    Bình luận
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bình luận
                        <small>Danh sách</small>
                    </h1>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr  align="center">
                            <th>ID</th>
                            <th>Công thức</th>
                            <th>Nội dung bình luận</th>
                            <th>Đánh giá</th>
                            <th>Người bình luận</th>
                            <th>Trạng thái</th>
                            <th>Tổng số lượng báo cáo</th>
                            <th>Số lượng báo cáo đã được duyệt</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr class="odd gradeX" align="">
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->dish->title }}</td>
                                <td>{{ $comment->comment_description }}</td>
                                <td>{{ $comment->rating }} &#9734;</td>
                                <td>{{ $comment->user->name }}</td>
                                
                                <td>
                                    @if ($comment->status)
                                        <span class="label label-success">Hiện</span>
                                    @else
                                        <span class="label label-danger">Ẩn</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.comment.reports', $comment->id) }}">{{ $comment->reports->count() }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.comment.reports', $comment->id) }}"> {{ $comment->reports->where('status', 1)->count() }}</a>
                                </td>
                                
                                <td>
                                    <form action="{{ route('admin.comment.status', $comment->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm {{ $comment->status ? 'btn-danger' : 'btn-success' }}">
                                            {{ $comment->status ? 'Ẩn' : 'Hiện' }}
                                        </button>
                                    </form>
                                </td>
                                {{-- <td>
                                    <form action="{{ route('admin.comment.delete', $comment->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
