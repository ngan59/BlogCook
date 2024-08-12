@extends('web.layout.master')

@section('content')
    <div class="container"> <br><br>
        <h1 class="my-4">Danh sách các báo cáo của tôi</h1>
        @if (session('success'))
        <div class = "alert alert-success"> {{ session('success') }}</div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    
        @if ($reports->isEmpty())
            <div class="alert alert-info ">
                <strong>Bạn chưa có báo cáo nào.</strong>
            </div>
        @else
            <table class="table table-bordered table-striped" style="font-size: 23px;">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Công thức nấu ăn</th>
                        <th>Bình luận báo cáo</th>
                        <th>Lí do báo cáo</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $key => $report)
                        <tr>
                            <td>{{ $key }}</td>
                            <td> <p style=" display: -webkit-box; -webkit-line-clamp: 1;  -webkit-box-orient: vertical; overflow: hidden; font-size: 23px;">{{ $report->dish->title }}</p></td>
                            <td>
                                <p style=" display: -webkit-box; -webkit-line-clamp: 1;  -webkit-box-orient: vertical; overflow: hidden; font-size: 23px;">{{ $report->comment->comment_description }}</p>
                            </td>
                            <td>{{ $report->categoryReport->name }}</td>
                            <td >
                                @if($report->status == 1)
                                <p class="text text-success" style="font-size: 23px;">
                                    Đã xử lí
                                </p>
                            @else
                                <p class="text text-danger" style="font-size: 23px;">
                                    Đã từ chối
                                </p>
                            @endif
                            </td>
                            <td>{{ $report->created_at->format('d/m/Y') }}</td>

                            {{-- <td>                            
                                <a href="{{ route('manage.report.delete', $report->id) }}"  class="boxBox box1" onclick="return confirm('Bạn có chắc chắn muốn xóa báo cáo này?')"><i class="fa fa-trash-o fa-fw "></i> Xóa</a>  
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
