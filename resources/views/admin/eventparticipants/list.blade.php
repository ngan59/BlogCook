@extends('admin.layout.master')

@section('title')
    Danh sách người tham gia sự kiện
@endsection
<!--day view vao: dung section -->
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Người tham gia sự kiện
                        <small>Danh sách</small>
                    </h1>
                    @if (session('success'))
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
                            <th>Title</th>
                            <th>Số người tham gia</th>
                            <th>Xem chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->users->count() }}</td>
                                {{-- <td>
                                    <a href="{{route ('admin.eventparticipants.view', $event->id)}}" class="btn btn-primary">Xem chi tiết</a>

                                </td> --}}
                                <td class="center">
                                    <i class="fa fa-eye fa-fw"></i> 
                                    <a href="{{ route('admin.eventparticipants.view', $event->id) }}">Xem chi tiết</a> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $contacts->links('pagination::bootstrap-4') }} --}}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
