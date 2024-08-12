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
                                    <input type="text" placeholder="Nhập tên người dùng của bạn" name="name" id="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="error">{{ $message }}</div>
                                    @enderror

                                    <label for="email"><b>Email</b></label>
                                    <input type="text" placeholder="Nhập email của bạn" name="email" id="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="error">{{ $message }}</div>
                                    @enderror

                                    <label for="phone"><b>Số điện thoại</b></label>
                                    <input type="text" placeholder="Nhập số điện thoại của bạn" name="phone" id="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                    
                                    <label for="password"><b>Mật khẩu</b></label>
                                    <div class="password-container">
                                        <input type="password" placeholder="Nhập mật khẩu của bạn" name="password" id="password" required>
                                        <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                    </div>                                   
                                    @error('password')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                
                                    <label for="password_confirmation"><b>Nhập lại mật khẩu</b></label>
                                    <div class="password-container">
                                        <input type="password" placeholder="Nhập lại mật khẩu của bạn" name="password_confirmation" id="password_confirmation" required>
                                        <i class="fa fa-eye" id="togglePasswordConfirmation" style="cursor: pointer;"></i>
                                    </div>
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
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});

document.getElementById('togglePasswordConfirmation').addEventListener('click', function () {
    const passwordField = document.getElementById('password_confirmation');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});

</script>
@endsection
