@extends('admin.layout.master')

@section('title')
    Danh mục báo cáo
@endsection

<!--day view vao: dung section -->
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lí do
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    @if (session('success'))
                        <div class = "alert alert-success"> {{session ('success')}}</div>       
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>                              
                                <th>Tên danh mục</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- đổ data ra phần view -->
                          @foreach ($categories as $key => $category)

                            <tr class="odd gradeX" align="center">
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td class="center">
                                    <a href="{{ route('admin.categoryreport.edit', $category->id) }}" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i>Sửa</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.categoryreport.delete', $category->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
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