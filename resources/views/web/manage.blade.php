@extends('web.layout.master')

@section('content')
    <div class="container"> <br><br>
        <h1 class="my-4">Quản lý bài viết</h1>

        @if ($dish->isEmpty())
            <div class="alert alert-info">
                <strong>Bạn chưa đăng bài viết nào.</strong>
            </div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr  align="center">
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Hình ảnh</th>
                        <th>Danh mục</th>
                        <th>Lượt xem</th>
                        <th>Ngày đăng</th>
                        <th>Trạng thái</th>
                        {{-- <th>Hành động</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dish as $key => $dishes)
                        <tr>
                            <td>{{ $key}}</td>
                            {{-- <td>
                                @if ($dishes->status == 1)
                                    <a href="#">{{ $dishes->title }}</a>
                                @else
                                    <a href="#" onclick="alert('Bài viết chưa được duyệt nên bạn không thể xem')">{{ $dishes->title }}</a>
                                @endif
                            </td> --}}
                            <td>
                                <p style=" display: -webkit-box; -webkit-line-clamp: 1;  -webkit-box-orient: vertical; overflow: hidden;"> {{ $dishes->title }}</p>

                            </td>
                            <td>
                                <img src="{{ $dishes->imageUrl() }}" alt="Hình ảnh" width="100px" height="auto">
                            </td>
                            <td >{{ $dishes->category->name }}</a></td>
                            {{-- <td>{{ $dishes->category->name }}</td> --}}
                            <td> <i class="fa fa-eye"></i> {{ $dishes->view_count }}</td>
                            <td > {{ $dishes->created_at->format('d/m/Y') }}</td>
                            <td>
                                @if ($dishes->status == 1)
                                    <p class="text text-success">
                                        Đã duyệt
                                    </p>
                                @else
                                    <p class="text text-danger">
                                        Chưa duyệt
                                    </p>
                                @endif
                            </td>
                            {{-- <td>
                                <a href="{{ route('manage.delete', $dishes->id) }}" class="text-danger"> <i class="fa fa-eye"></i> Xóa </a>
                                &nbsp;|&nbsp;
                                <a href="#" class="text-warning"><i class="fa fa-pencil"></i>Sửa </a>
                                &nbsp;|&nbsp;
                                <form action="#" method="POST" style="display:inline;"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-danger" style="border:none; background:none;">
                                        <i class="fa fa-trash-o"></i> Xóa
                                    </button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
