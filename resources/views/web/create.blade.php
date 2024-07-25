@extends('web.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid single-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header food text-center">Đăng Công thức nấu ăn</h1>
                    @if (count($errors))
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                <p>{{ $err }}</p>
                            @endforeach
                        </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-8 mx-auto">
                    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="description" class="bold">Danh mục</label>
                            <select class="form-control" name="id_category" id="id_category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description" class="bold">Tiêu đề</label>
                            <input class="form-control" name="title" id="title"
                                placeholder="Bạn hãy nhập tiêu đề công thức" onkeyup="ChangeToSlug()" />
                        </div>

                        <div class="form-group">
                            <label for="description" class="bold">Tóm tắt</label>
                            <textarea class="form-control" name="summary" id="summary" placeholder="Bạn hãy nhập tóm tắt công thức"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="description" class="bold">Slug</label>
                            <input class="form-control" name="slug" id="slug" placeholder=" " readonly />
                        </div>

                        <div class="form-group">
                            <label for="description" class="bold" >Hình ảnh</label>
                            <input type="file" class="form-control-file" name="image" id="image"
                                accept="image/*" />
                        </div>

                        <div class="form-group">
                            <label for="description" class="bold" >Nội dung</label>
                            <textarea id="editor1" name="description" class="ckeditor"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary button">Đăng công thức</button>
                            {{-- <a href="{{ route('web.home') }}" class="btn btn-secondary">Hủy bỏ</a> --}}
                        </div>
                    </form>
                    <br>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <style>
        .bold{
          font-weight:bold; 
          font-size: 20px; 
          color: black
        }
    </style>
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
        document.addEventListener('DOMContentLoaded', function() {
            ChangeToSlug();
        });
    </script>
@endsection
