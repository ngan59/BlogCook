@extends('admin.layout.master')

<!--day view vao: dung section -->
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lí do
                            <small>Chỉnh sửa</small>
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
                    <form action="{{ route("admin.categoryreport.update", $category -> id) }}" method="POST">
                        @csrf
                        @method ('put') 
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input class="form-control" name="name" value=" {{$category-> name}}" placeholder="Nhập danh mục..." />
                        </div>

                        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                        <button type="reset" class="btn btn-default">Hủy bỏ</button>
                        <button type="reset" class="btn btn-default"> <a href="{{ route('admin.category.index')}}">Quay lại </a></button>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection