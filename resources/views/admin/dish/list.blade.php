@extends('admin.layout.master')

@section('title')
    Món ăn
@endsection
<!--day view vao: dung section -->
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Công thức món ăn
                        <small>Danh sách</small>
                        <div class="pull-right">
                            <span class="badge badge-info">Số công thức là {{ count($dishs) }}</span>
                        </div>
                    </h1>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu đề</th>                                
                                <th>Slug</th>
                                <th>Hình ảnh</th>
                                <th>Danh mục</th>
                                <th>Bài viết nổi bật</th>
                                <th>Bài viết mới</th>
                                <th>Bình luận</th>
                                <th>Trạng thái</th>
                                <th>Xem</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dishs as $dish)
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $dish->id}}</td>
                                    <td>{{ $dish->title }}</td>
                                    <td>{{ $dish->slug }}</td>
                                    <td><img src="{{ $dish->imageUrl() }}" alt="" width="50px" height="auto"></td>
                                    <td>{{ $dish->category->name }}</td>
                                    <td>{{ $dish->highlight_post == 1 ? 'x' : '' }}</td>
                                    <td>{{ $dish->new_post == 1 ? 'x' : '' }}</td>
                                    <td class="center">
                                        <i class="fa fa-comments fa-fw"></i>
                                        <a href="{{ route('admin.dish.comments', $dish->id) }}">Bình luận</a>
                                    </td>
                                    <td>
                                        @if ($dish->status == 1)
                                            <p class="text text-success">
                                                Đã duyệt
                                            </p>
                                        @else
                                            <p class="text text-danger">
                                                Chưa duyệt
                                            </p>
                                        @endif
                                    </td>
                                    <td class="center">
                                        <a href="{{ route('admin.dish.view', $dish->id) }}" class="btn btn-info"><i class="fa fa-pencil fa-fw"></i>Xem</a>
                                    </td>
                                    <td class="center">
                                        <a href="{{ route('admin.dish.edit', $dish->id) }}" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i>Sửa</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.dish.delete', $dish->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa công thức này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash-o fa-fw"></i> Xóa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    {{-- {!! $dishs->links('pagination::bootstrap-4') !!} --}}
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
