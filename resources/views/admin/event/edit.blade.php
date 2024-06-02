@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Event
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
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('admin.event.update', $events->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Event Category</label>
                            <select class="form-control" name="eventcategories_id" >
                                @foreach ($categoriesevent as $categoryevent)
                                {{-- kiem tra neu danh muc cua san pham nay ma bang thi minh se lay thang do   --}}
                                <option value="{{$categoryevent->id}}" @if ($events->eventcategories_id == $categoryevent->id) selected @endif >{{ $categoryevent->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" value="{{ $events->title }}" placeholder="Please Enter Title" />
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*" />
                        </div>
                            <div class="form-group">
                                <label>Description</label>
                                {{-- se lay tat ca du lieu --}}
                                <textarea id="description" name="description" class="ckeditor">{!!$events->description!!}</textarea>
                            </div>
                        <button type="submit" class="btn btn-default">Update</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection