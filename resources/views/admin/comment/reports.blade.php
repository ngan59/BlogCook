    @extends('admin.layout.master')

    @section('title')
        Báo cáo
    @endsection

    @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Báo cáo cho bình luận #{{ $comment->id }}</h1>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Lý do báo cáo</th>
                                <th>Người báo cáo</th>
                                <th>Ngày báo cáo</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->categoryReport->name ?? " " }}</td>
                                    <td>{{ $report->user->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($report->created_at)->format('d-m-Y') }}</td>
                                    <td>
                                        @switch($report->status)
                                            @case(0)
                                                <span class="label label-warning">Chưa xử lý</span>
                                                @break
                                            @case(1)
                                                <span class="label label-info">Đã xử lý</span>
                                                @break
                                            @default
                                                <span class="label label-danger">Không xác định</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.reports.status', $report->id) }}" method="POST">
                                            @csrf
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="0" {{ $report->status == 0 ? 'selected' : '' }}>Chưa xử lý</option>
                                                <option value="1" {{ $report->status == 1 ? 'selected' : '' }}>Đã xử lý</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
