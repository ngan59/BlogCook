@extends('admin.layout.master')
@section('title')
    Trang chủ
@endsection
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" >Trang chủ  </h1>
                    <h3>Xin chào, {{ $admin->name }}!</h3>
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
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Post Statistics -->
                <div class="col-lg-4 col-md-6">
                    <div class="stat-box" style="background-color: #5bc0de; height: 200px; display: flex; justify-content: center; align-items: center;">
                        <div style="text-align: center;">
                            <a href="{{ route('admin.dish.index') }}" style="text-decoration: none; color: #000000;">
                                <i class="fa fa-file-text fa-5x"></i>
                                <h2 id="post-count" style="color: #000000;">{{ $postCount }}</h2>
                                <p style="color: #000000;">Công thức nấu ăn</p>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Event Statistics -->
                <div class="col-lg-4 col-md-6">
                    <div class="stat-box" style="background-color: #d7d162; height: 200px; display: flex; justify-content: center; align-items: center;">
                        <div style="text-align: center;">
                            <a href="{{ route('admin.event.index') }}" style="text-decoration: none; color: #000000;">
                                <i class="fa fa-calendar fa-5x"></i>
                                <h2 id="event-count" style="color: #000000;">{{ $eventCount }}</h2>
                                <p style="color: #000000;">Sự kiện</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Top 5 Bài Viết Mới Nhất</h2>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bài Viết Mới Nhất
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tiêu đề</th>
                                            {{-- <th>Tóm tắt</th> --}}
                                            <th>Hình ảnh</th>
                                            <th>Ngày tạo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latestPosts as $key => $post)
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td class="text-center" ><img src="{{ $post->imageUrl() }}" alt="" width="90px" height="auto"></td>
                                                <td>{{ $post->created_at }}</td>
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

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Các Sự Kiện Đang Diễn Ra</h2>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sự Kiện Đang Diễn Ra
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tiêu đề</th>
                                            <th>Hình ảnh</th>
                                            <th>Thời gian bắt đầu</th>
                                            <th>Thời gian kết thúc</th>
                                            <th>Địa điểm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ongoingEvents as $key => $event)
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>{{ $event->title }}</td>
                                                <td class="text-center"><img src="{{ $event->imageUrl() }}" alt="" style="width: 90px; height: auto; display: block; margin: 0 auto;"></td>
                                                <td>{{ $event->start_date }}</td>
                                                <td>{{ $event->end_date }}</td>
                                                <td>{{ $event->location }}</td>
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
