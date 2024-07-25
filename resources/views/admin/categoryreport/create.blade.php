@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lí do
                        <small>Thêm</small>
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
                    <form action="{{ route("admin.categoryreport.store") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input class="form-control" name="name" placeholder="Nhập danh mục..." />
                        </div>

                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default"><a href="{{route('admin.category.index')}}">Hủy bỏ</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection