<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trang đăng nhập</title>

    
    <!-- Bootstrap -->
    <link href="{{asset('public/backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public/backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public/backend/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('public/backend/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('public/backend/css/custom.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>


      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{URL::to('/login')}}" method="post">
                <!-- tạo token để chống sql injection -->
                {{ csrf_field() }} 
              <h1>ĐĂNG NHẬP</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" required="required" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required="required" />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">ĐĂNG NHẬP</button>
                <a href="{{route('view_signup')}}" class="btn btn-default submit" style="margin-top: -5px !important; font-size: 16px !important">ĐĂNG KÝ</a>
                {{-- <a class="reset_pass" href="#">Quên mật khẩu?</a> --}}
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                {{-- <p class="change_link">Chưa có tài khỏan?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p> --}}

                <div class="clearfix"></div>
                <br />

                <div>
                  <div class="row">
                    <div class="credits col-sm-12">
                      <p>
                        <a href="" 
                        title="Thiết kế website" 
                        target="_blank">Sản phẩm của....</a>
                        <a href="#" target="_blank">
                          {{-- <img style="height: 30px; width:50px" 
                          src="{{asset('public/frontend/image/dfghfdh.png')}}"> --}}
                        </a>
                        <a href="#" 
                        title="Thiết kế website" 
                        target="_blank">Cung cấp bởi....</a>
                      </p>
                   </div>
                </div>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  {{-- <div class="row">
                    <div class="credits col-sm-12">
                       <p>
                         <a href="https://web30s.vn/" title="Thiết kế website" target="_blank">Sản phẩm của</a>
                         <a href="https://web30s.vn/" target="_blank"><img src="{{asset('public/frontend/img/web30s.png')}}"></a>
                         <a href="https://pavietnam.vn/" title="Thiết kế website" target="_blank">Cung cấp bởi P.A Việt Nam</a>
                      </p>
                   </div> --}}
                </div>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    

  <!-- @if (Session::has('message')) {
    $message = Session::get('message');
    if ($message == "Đăng nhập thành công") {
    <script>
      toastr.success('Đăng nhập thành công', 'Thành công');
    </script>
    } else if ($message == "Mật khẩu không đúng, vui lòng thử lại"){
      <script>
      toastr.success('Mật khẩu không đúng, vui lòng thử lại', 'Thất bại');
      </script>
    }
    else {
      <script>
      toastr.success('Đăng xuất thành công', 'Thành công');
      </script>
    }
  }

  @endif -->
  <script src="{{asset('public/backend/vendors/jquery/dist/jquery.min.js')}}"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  </body>
</html>
