@extends('admin.layout.master')

@section('title')
Admin Blog 
@endsection

<!--day view vao: dung section -->
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
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
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>SortNumber</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- đổ data ra phần view -->
                          @foreach ($slides as $slide)

                            <tr class="odd gradeX" align="center">
                                <td>{{$slide->id}}</td>
                                <td>{{$slide->name}}</td>
                                <td>
                                    <img src="{{ $slide->imageUrl() }}" alt=" " width="50px" height="auto">
                                </td>
                                <td>{{$slide->description}}</td>
                                <td>{{$slide->sortnumber}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.slide.delete',$slide->id)}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.slide.edit',$slide->id)}}">Edit</a></td>
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