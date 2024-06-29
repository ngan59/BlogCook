@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sự kiện
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
                    <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label>Danh mục</label>
                            
                            <select class="form-control" name="eventcategories_id" >
                                @foreach ($categoriesevent as $categoryevent)
                                {{-- id category de luu len csdl  --}}
                                <option value="{{$categoryevent->id}} ">{{$categoryevent->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="title" placeholder="Nhập tiêu đề sự kiện" />
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="image" accept="image/*" />
                        </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="description" name="description" class="ckeditor" ></textarea>
                            </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default"><a href="{{route('admin.event.index')}}">Hủy bỏ</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection