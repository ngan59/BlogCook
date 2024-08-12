@extends('admin.layout.master')

<!--day view vao: dung section -->
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
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
                    
                    <form action="{{ route("admin.slide.update", $slide->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method ('put') 
                        <div class="form-group">
                            <label>Tên slide</label>
                            <input class="form-control" name="name" value ="{{ $slide->name }}" placeholder="Nhập tên slide" />
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh slide</label>
                            <input type="file" class="form-control" name="image" accept="image/*" />
                        </div>
                        <div class="form-group">
                            <label>Nội dung slide</label>
                            <textarea class="form-control" name="description" placeholder="Nhập nội dung slide">{{ $slide->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Số thứ tự slide</label>
                            <input class="form-control" name="sortNumber" value ="{{$slide->sortNumber}}" type="number" placeholder="Nhập số thứ tự slide" />
                        </div>
                        <button type="submit" class="btn btn-default">Cập nhật</button>
                        <button type="reset" class="btn btn-default">Hủy bỏ</button>
                        <button type="reset" class="btn btn-default"> <a href="{{ route('admin.slide.index')}}">Quay lại </a></button>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection