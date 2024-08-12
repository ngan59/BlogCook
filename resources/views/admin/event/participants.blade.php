@extends('admin.layout.master')

@section('title')
Người tham gia sự kiện: {{ $event->title }}
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người tham gia sự kiện: {{ $event->title }}</h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participants as $participant)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $participant->id }}</td>
                        <td>{{ $participant->name }}</td>
                        <td>{{ $participant->email }}</td>
                        <td>{{ $participant->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.event.index') }}" class="btn btn-primary">Back to Event List</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
