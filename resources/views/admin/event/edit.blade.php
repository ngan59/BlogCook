@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sự kiện
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
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('admin.event.update', $events->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Danh mục sự kiện</label>
                            <select class="form-control" name="eventcategories_id" >
                                @foreach ($categoriesevent as $categoryevent)
                                {{-- kiem tra neu danh muc cua san pham nay ma bang thi minh se lay thang do   --}}
                                <option value="{{$categoryevent->id}}" @if ($events->eventcategories_id == $categoryevent->id) selected @endif >{{ $categoryevent->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="title" id="title" value="{{ $events->title }}" placeholder="Nhập tiêu đề sự kiện..."  onkeyup="ChangeToSlug()" />
                        </div>
                        {{-- <div class="form-group">
                            <label for="start_date">Ngày bắt đầu</label>
                            <input type="date" class="form-control" name="start_date" value="{{ $events->start_date ? $events->start_date->format('Y-m-d') : '' }}" required>
                        </div> --}}
                        <div class="form-group">
                            <label>Slug</label>
                            <input class="form-control" name="slug" id="slug" placeholder=" " readonly />
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="image" accept="image/*" />
                        </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                {{-- se lay tat ca du lieu --}}
                                <textarea id="description" name="description" class="ckeditor">{!!$events->description!!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                            <button type="reset" class="btn btn-default">Hủy bỏ</button>
                            <button type="reset" class="btn btn-default"> <a href="{{ route('admin.event.index')}}">Quay lại </a></button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
@section('script')
<script>
    function ChangeToSlug() {
        var title, slug;

        // Lấy text từ thẻ input title
        title = document.getElementById("title").value;

        // Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        // Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        // Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        // Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        // Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        // Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        // Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        // In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }

    // Gọi hàm ChangeToSlug khi tài liệu được tải lại (document ready)
    document.addEventListener('DOMContentLoaded', function () {
        ChangeToSlug();
    });
</script>
@endsection