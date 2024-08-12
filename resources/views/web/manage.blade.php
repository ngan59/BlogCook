@extends('web.layout.master')

@section('content')
    <div class="container"> <br><br>
        <h1 class="my-4">Quản lý bài viết</h1>
        @if (session('success'))
        <div class = "alert alert-success"> {{ session('success') }}</div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    
        @if ($dish->isEmpty())
            <div class="alert alert-info ">
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
                        <th>Chỉnh sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dish as $key => $dishes)
                        <tr>
                            <td>{{ $key}}</td>
                            <td>
                                @if ($dishes->status == 1)
                                    <a href="{{ route('web.dish', $dishes->slug) }}">{{ $dishes->title }}</a>
                                @else
                                    <a href="#" onclick="alert('Bài viết chưa được duyệt nên bạn không thể xem')">{{ $dishes->title }}</a>
                                @endif
                            </td>
                            {{-- <td>
                                <p style=" display: -webkit-box; -webkit-line-clamp: 1;  -webkit-box-orient: vertical; overflow: hidden;"> {{ $dishes->title }}</p>

                            </td> --}}
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
                            <td>
                                <a href="{{ route('manage.edit', $dishes->id) }}" class="box box1" ><i class="fa fa-pencil fa-fw" ></i> Sửa</a>       
                            </td>
                            <td>                            
                                <a href="{{ route('manage.delete', $dishes->id) }}"  class="boxBox box1" onclick="return confirm('Bạn có chắc chắn muốn xóa công thức này?')"><i class="fa fa-trash-o fa-fw "></i> Xóa</a>  
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
