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
                            <input class="form-control" name="title" id="title" placeholder="Nhập tiêu đề sự kiện"  onkeyup="ChangeToSlug()" />
                        </div>
                        {{-- <div class="form-group">
                            <label for="start_date">Ngày bắt đầu</label>
                            <input type="date" class="form-control" name="create_date" value="{{ old('create_date') }}" required>
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