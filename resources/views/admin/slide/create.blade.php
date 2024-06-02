@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>Add</small>
                    </h1>
                    @if(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{ $err }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('admin.slide.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Name" />
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*" />
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="description" placeholder="Please Enter Description" />
                        </div>
                        <div class="form-group">
                            <label>SortNumber</label>
                            <input class="form-control" name="sortNumber" type="number" placeholder="Please Enter SortNumber" />
                        </div>
                        {{-- <div class="form-group">
                            <label>Role</label>
                            <label class="radio-inline">
                                <input name="role" value="0" checked="true" type="radio">User
                            </label>
                            <label class="radio-inline">
                                <input name="role" value="1" type="radio">Admin
                            </label>
                        </div> --}}
                        <button type="submit" class="btn btn-default">Add</button>
                        <button type="reset" class="btn btn-default"><a href="{{route('admin.slide.index')}}">Hủy bỏ</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection