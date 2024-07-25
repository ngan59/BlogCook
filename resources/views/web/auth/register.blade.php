@extends('web.layout.master')
@section('content')
    <section class="section wb mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                {{-- <form>

                                    <div class="form-group row" action="{{route ('web.auth.register') }} "  method="post">
                                        @csrf
                                        
                                      <label for="inputEmail3" class="col-sm-6 col-form-label">Email</label>
                                      <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Nhập email của bạn">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-6 col-form-label">Tên người dùng</label>
                                        <div class="col-sm-10">
                                          <input type="name" class="form-control" id="inputPassword3" placeholder="Nhập tên của bạn">
                                        </div>
                                      </div>
                                    <div class="form-group row">
                                      <label for="inputPassword3" class="col-sm-6 col-form-label">Mật khẩu</label>
                                      <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Nhập mật khẩu của bạn">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-6 col-form-label">Nhập lại mật khẩu</label>
                                        <div class="col-sm-10">
                                          <input type="password" class="form-control" id="inputPassword3" placeholder="Nhập lại mật khẩu của bạn">
                                        </div>
                                      </div>

                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-6 col-form-label">Địa chỉ</label>
                                        <div class="col-sm-10">
                                          <input type="password" class="form-control" id="inputPassword3" placeholder="Nhập địa chỉ của bạn">
                                        </div>
                                      </div>  
                                    <div class="form-group row">
                                      <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary">Đăng kí</button>
                                      </div>
                                    </div>
                                  </form> --}}

                                  <form action="{{route ('web.auth.register') }} "  method="post">
                                    @csrf
                                    <div class="container" >
                                      {{-- <h1 > Đăng kí tài khoản </h1> --}}
                                      {{-- <hr> --}}
                                      <label for="email"><b>Tên người dùng</b></label>
                                      <input type="text" placeholder="Nhập tên của bạn" name="name" id="email" required>

                                      <label for="email"><b>Email</b></label>
                                      <input type="text" placeholder="Nhập email của bạn" name="email" id="email" required>
                                  
                                      <label for="psw"><b>Mật khẩu</b></label>
                                      <input type="password" placeholder="Nhập password của bạn" name="password" id="password" required>
                                  
                                      <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
                                      <input type="password" placeholder="Nhập lại mật khẩu của bạn" name="confirm" id="confirm" required>
                                      <hr>
                                      <p>Bằng cách tạo tài khoản, bạn đồng ý với <a href="#" style=" color: dodgerblue;">Terms & Privacy</a> của chúng tôi .</p>
                                  
                                      <button type="submit" class="registerbtn">Đăng kí tài khoản</button>
                                    </div>
                                    
                                    <div class="container signin">
                                      <p>Bạn đã có tài khoản? <a href="#"  style=" color: dodgerblue;"> Đăng nhập</a>.</p>
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
      
      /* Overwrite default styles of hr */
      /* hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
      }
       */
      /* Set a style for the submit button */
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
      
      .registerbtn  :hover {
        opacity: 1;
      }

      /* Set a grey background color and center the text of the "sign in" section */
      .signin {
        background-color: white;
        text-align: center;
      }
      </style>
@endsection
