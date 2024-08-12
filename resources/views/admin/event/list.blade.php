@extends('admin.layout.master')

@section('title')
    Sự kiện
@endsection
<!--day view vao: dung section -->
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Event
                        <small>List</small>
                    </h1>
                    @if (session('success'))
                        <div class = "alert alert-success"> {{ session('success') }}</div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover ">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Slug</th>
                            <th>Hình ảnh</th>
                            <th>Danh mục sự kiện</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Địa điểm</th>
                            <th>Số lượng người tham gia sự kiện </th>
                            <th>Xem</th>
                            <th>Sửa</th>
                            <th>Xóa</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->slug }}</td>
                                <td>
                                    <img src="{{ $event->imageUrl() }}" alt=" " width="50px" height="auto">
                                </td>
                                <td>{{ $event->categoryevent->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y') }}</td>
                                <td>{{ $event->location }}</td>
                                <td>
                                    <a href="{{ route('admin.event.participants', $event->id) }}">
                                        {{ $event->users->count() }}
                                    </a>
                                </td>
                                <td class="center">
                                    <a href="{{ route('admin.event.view', $event->id) }}" class="btn btn-info"><i class="fa fa-pencil fa-fw"></i>Xem</a>
                                </td>
                                <td class="center">
                                    <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i>Sửa</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.event.delete', $event->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sự kiện này?');">
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
                {{-- phan trang --}}
                {!! $events->links('pagination::bootstrap-4') !!}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
