@extends('admin.layout.master')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- User Statistics -->
                    <div class="col-lg-4 col-md-6">
                        <div class="stat-box" style="background-color: #ffcccb; height: 200px; display: flex; justify-content: center; align-items: center;">
                            <div style="text-align: center;">
                                <a href="{{ route('admin.user.index') }}" style="text-decoration: none; color: #000000;">
                                    <i class="fa fa-users fa-5x"></i>
                                <h2 id="user-count" style="color: #000000;">{{ $userCount }}</h2>
                                <p style="color: #000000;">Người dùng</p>
                            </div>
                        </div>
                    </div>
                    <!-- Post Statistics -->
                    <div class="col-lg-4 col-md-6">
                        <div class="stat-box" style="background-color: #5bc0de; height: 200px; display: flex; justify-content: center; align-items: center;">
                            <div style="text-align: center;" >
                                <a href="{{ route('admin.dish.index') }}" style="text-decoration: none; color: #000000;">
                                <i class="fa fa-file-text fa-5x"></i>
                                <h2 id="post-count" style="color: #000000;">{{ $postCount }}</h2>
                                <p style="color: #000000;">Công thức nấu ăn</p>
                            </div>
                        </div>
                    </div>
                <!-- /.row -->
                <div class="col-lg-4 col-md-6">
                    <div class="stat-box" style="background-color: #d7d162; height: 200px; display: flex; justify-content: center; align-items: center;">
                        <div style="text-align: center;" >
                            <a href="{{ route('admin.event.index') }}" style="text-decoration: none; color: #000000;">
                                <i class="fa fa-file-text fa-5x"></i>
                            <h2 id="post-count" style="color: #000000;">{{ $eventCount }}</h2>
                            <p style="color: #000000;">Sự kiện</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="row"> --}}
                    <div class="col-lg-12">
                        <h2 class="page-header">Thống kê chi tiết</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Dữ liệu người dùng
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên người dùng</th>
                                                <th>Email</th>
                                                <th>Vai trò</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr class="even gradeC" align="center">
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->role ? "1": "0"}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection

