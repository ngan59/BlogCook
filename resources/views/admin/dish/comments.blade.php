@extends('admin.layout.master')

@section('title')
    Comments for {{ $dish->title }}
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Comments for: {{ $dish->title }}
                    </h1>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người dùng</th>
                                <th>Nội dung</th>
                                <th>Đánh giá</th>
                                <th>Ngày đăng</th>
                                <th>Trạng thái</th>                               
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dish->comments as $comment)
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->comment_description }}</td>
                                    <td>{{$comment->rating }} &#9734;</td>
                                    <td>{{ $comment->created_at }}</td>
                                    <td>
                                        @if ($comment->status)
                                            <span class="label label-success">Hiện</span>
                                        @else
                                            <span class="label label-danger">Ẩn</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.comment.status', $comment->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm {{ $comment->status ? 'btn-danger' : 'btn-success' }}">
                                                {{ $comment->status ? 'Ẩn' : 'Hiện' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pull-right">
                        <a href="{{ route('admin.dish.index') }}" class="btn btn-primary">Trở lại </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection