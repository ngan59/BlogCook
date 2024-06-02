@extends('admin.layout.master')

<!--day view vao: dung section -->
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category Event  
                            <small>Edit</small>
                        </h1>
                        @if(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                    @if (session('success'))
                        <div class = "alert alert-success"> {{session ('success')}}</div>       
                    @endif
                </div>
                   
                    <!-- /.col-lg-12 -->
                    <form action="{{ route("admin.categoryevent.update", $categoryevent -> id) }}" method="POST">
                        @csrf
                        @method ('put') 
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="name" value=" {{$categoryevent-> name}}" placeholder="Please Enter Category Event Name" />
                        </div>

                        <button type="submit" class="btn btn-default">Update</button>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection