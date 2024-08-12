@extends('admin.layout.master')
@section('title')
    Danh mục công thức
@endsection
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh mục công thức nấu ăn
                            <small>Thêm</small>
                        </h1>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                <p>{{ $err }}</p>
                            @endforeach
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
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
                                <th>Slug</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- đổ data ra phần view -->
                          @foreach ($categories as $key => $category)

                            <tr class="odd gradeX" align="center">
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{$key}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td class="center">
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i>Sửa</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
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