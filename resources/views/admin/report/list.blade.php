@extends('admin.layout.master')

@section('title')
    Báo cáo
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Báo cáo 
                    <small>Danh sách</small>
                </h1>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Lý do</th>
                        <th>Người báo cáo</th>
                        <th>Bài viết/Comment</th>
                        <th>Trạng thái</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $key => $report)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $key }}</td>
                            <td>{{ $report->report_reason }}</td>
                            <td>{{ $report->user->email }}</td>
                            <td>
                                @if($report->id_dish && $report->dish)
                                    Bài viết: {{ $report->dish->title }}
                                @elseif($report->id_comment && $report->comment)
                                    Comment: {{ $report->comment->comment_description }}
                                @else
                                    Không xác định
                                @endif
                            </td>
                            <td>
                                @if ($report->status == 'pending')
                                    <p class="text text-danger">Chưa duyệt</p>
                                @else
                                    <p class="text text-success">Đã duyệt</p>
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-eye fa-fw"></i> <a href="#">Xem</a></td>
                            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="#"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Sửa</a></td>
                        </tr>                           
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
