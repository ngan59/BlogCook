@extends('admin.layout.master')

@section('title')
Slide
@endsection
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    @if (session('success'))
                        <div class = "alert alert-success"> {{session ('success')}}</div>       
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên slide</th>
                                <th>Hình ảnh</th>
                                <th>Số thự tự slide</th>    
                                <th>Xem</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- đổ data ra phần view -->
                          @foreach ($slides as $key=>$slide)

                            <tr class="odd gradeX" align="center">
                                <td>{{$slide->id}}</td>
                                <td>{{$slide->name}}</td>
                                <td>
                                    <img src="{{ $slide->imageUrl() }}" alt=" " width="50px" height="auto">
                                </td>
                                <td>{{$slide->sortNumber}}</td>
                                <td class="center">
                                    <a href="{{ route('admin.slide.view', $slide->id) }}" class="btn btn-info"><i class="fa fa-pencil fa-fw"></i>Xem</a>
                                </td>
                                <td class="center">
                                    <a href="{{ route('admin.slide.edit', $slide->id) }}" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i>Sửa</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.slide.delete', $slide->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa slide này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i> Xóa</button>
                                    </form>
                                </td>
                            </tr>

                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection