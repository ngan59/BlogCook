@extends('web.layout.master')

@section('content')
<section class="section wb mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-wrapper">
                    <div class="row">
                        @if(session('error'))
                            <div class="col-lg-12">
                                <div class="alert alert-danger"> {{ session('error') }} </div>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="col-lg-12">
                                <div class="alert alert-success"> {{ session('success') }} </div>
                            </div>
                        @endif
                        <div class="col-lg-12">
                            <form class="form-wrapper" action="{{ route('web.auth.login') }}" method="post">
                                @csrf
                                <input type="text" name="email" class="form-control" placeholder="Địa chỉ email" value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="form-group row">
                                    <div class="col-sm-6 text-left">
                                        <a href="{{ route('web.auth.forgot-password') }}" class="text-primary">Quên mật khẩu?</a>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                      <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                    </div>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
