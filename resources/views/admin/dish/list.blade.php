@extends('admin.layout.master')

@section('title')
    Dish
@endsection
<!--day view vao: dung section -->
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dish
                            <small>List</small>
                        </h1>
                        @if (session('success'))
                        <div class = "alert alert-success"> {{session ('success')}}</div>       
                    @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Highlight</th>
                                <th>New Post</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dishs as $dish)
                            <tr class="odd gradeX" align="center">
                                <td>{{$dish ->id}}</td>
                                <td>{{$dish ->title}}</td>
                                <td>{{$dish ->slug}}</td>
                                {{-- truyen duong dan cua no/image/dish --}}
                                <td><img src="{{ $dish->imageUrl() }}" alt="" width="50px" height="auto"></td>
                                <td>{{$dish ->category->name}}</td>
                                <td>{{$dish ->highlight_post == 1 ? "x" : ""}}</td>
                                <td>{{$dish ->new_post == 1 ? "x" : ""}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route ('admin.dish.delete', $dish ->id)}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route ('admin.dish.edit', $dish ->id)}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
             {{-- phan trang --}}
                {!!$dishs ->links('pagination::bootstrap-4') !!}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection