@extends('web.layout.master')

@section('content')
    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-wrapper">
                        <div class="row">
                            @if (session('success'))
                                <div class="col-lg-12">
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-5">
                                <h4>Chúng tôi là ai ?</h4>
                                <p>Cooking tutorial blog là một blog chuyên cung cấp các hướng dẫn nấu ăn, công thức nấu ăn,
                                    mẹo và kỹ thuật nấu nướng. Blog này thường được viết bởi những người đam mê ẩm thực, đầu
                                    bếp chuyên nghiệp, hoặc những người thích chia sẻ kinh nghiệm nấu ăn của mình.
                                </p>
                                <h4>Chúng tôi có thể giúp gì?</h4>
                                <p>Với niềm đam mê nấu nướng và muốn học hỏi, nâng cao kĩ năng nấu nướng của mình. Blog có đầy đủ các món ăn và các bài viết tiện ích có thể giúp các bạn trau dồi thêm.
                                </p>

                            </div>
                            <div class="col-lg-7">
                                <form class="form-wrapper" action="{{ route('web.contact.store') }}" method="post">
                                    @csrf
                                    <input type="text" name="name" class="form-control" placeholder="Tên của bạn ... ">
                                    <input type="text" name="address" class="form-control" placeholder="Địa chỉ email ...">
                                    <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
                                    <input type="text" name="subject" class="form-control" placeholder="Tiêu đề ...">
                                    <textarea class="form-control" name="message" placeholder="Lời nhắn ..."></textarea>
                                    <button type="submit" class="btn btn-primary">Gửi <i class="fa fa-envelope-open-o"></i></button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
