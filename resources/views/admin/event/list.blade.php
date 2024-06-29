@extends('admin.layout.master')

@section('title')
Event
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
                        <div class = "alert alert-success"> {{session ('success')}}</div>       
                    @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover " >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Hình ảnh</th>
                                <th>Danh mục sự kiện</th>
                                <th>Nội dung</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr class="odd gradeX" align="center">
                                <td>{{$event ->id}}</td>
                                <td>{{$event ->title}}</td>
                                <td>
                                    <img src="{{ $event->imageUrl() }}" alt=" " width="50px" height="auto">
                                </td>
                                <td>{{$event ->categoryevent->name}}</td>
                                <td>{!!$event->description !!}</td></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route ('admin.event.delete', $event ->id)}}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route ('admin.event.edit', $event ->id)}}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
             {{-- phan trang --}}
                {!!$events ->links('pagination::bootstrap-4') !!}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection