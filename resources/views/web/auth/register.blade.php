@extends('web.layout.master')
@section('content')
<section class="section wb mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('web.auth.register') }}" method="post">
                                @csrf
                                <div class="container">
                                    <label for="name"><b>Tên người dùng</b></label>
                                    <input type="text" placeholder="Nhập tên của bạn" name="name" id="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="error">{{ $message }}</div>
                                    @enderror

                                    <label for="email"><b>Email</b></label>
                                    <input type="text" placeholder="Nhập email của bạn" name="email" id="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                
                                    <label for="password"><b>Mật khẩu</b></label>
                                    <input type="password" placeholder="Nhập password của bạn" name="password" id="password" required>
                                    @error('password')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                
                                    <label for="password_confirmation"><b>Nhập lại mật khẩu</b></label>
                                    <input type="password" placeholder="Nhập lại mật khẩu của bạn" name="password_confirmation" id="password_confirmation" required>
                                    @error('password_confirmation')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                    <hr>
                                    <p>Bằng cách tạo tài khoản, bạn đồng ý với <a href="#" style="color: dodgerblue;">Terms & Privacy</a> của chúng tôi.</p>
                                
                                    <button type="submit" class="registerbtn">Đăng kí tài khoản</button>
                                </div>
                                
                                <div class="container signin">
                                    <p>Bạn đã có tài khoản? <a href="{{ route('web.auth.login') }}" style="color: dodgerblue;">Đăng nhập</a>.</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<style>
    input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    
    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }
    
    .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }
    
    .registerbtn:hover {
        opacity: 1;
    }

    .signin {
        background-color: white;
        text-align: center;
    }

    .error {
        color: red;
    }
</style>
@endsection
