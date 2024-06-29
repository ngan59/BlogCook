@extends('admin.layout.master')

@section('title')
    Category
@endsection

<!--day view vao: dung section -->
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category Event
                            <small>List</small>
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
                                {{-- <th>Title</th> --}}
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- đổ data ra phần view -->
                          @foreach ($categoriesevent as $categoryevent)

                            <tr class="odd gradeX" align="center">
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{$category->id}}</td> --}}
                                <td>{{$categoryevent->name}}</td>
                                {{-- <td>{{$categoryevent->title}}</td> --}}
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.categoryevent.delete',$categoryevent->id)}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.categoryevent.edit',$categoryevent->id)}}">Sửa</a></td>
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