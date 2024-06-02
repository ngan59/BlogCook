@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category Event
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
                    <!-- truyền hàm xử lý việc tạo category -->
                    <form action="{{ route("admin.categoryevent.store") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Event Category Event Name" />
                        </div>

                        <button type="submit" class="btn btn-default">Create</button>
                        {{-- <button type="cancel" class="btn btn-default">Cancel</button> --}}
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection