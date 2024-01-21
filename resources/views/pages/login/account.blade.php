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
    <link rel='stylesheet' href='{{asset('public/frontend/css/user-style.css')}}'>

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
        

        <div id="register" class="animate form login_form">
          <section class="login_content">
            <form action="{{ route('update_info') }}" method="post">
              {{ csrf_field() }} 
              <h1>CẬP NHẬT THÔNG TIN</h1>
              @if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
              <div class="div-label">
                <label class="col-form-label account-label">Họ và tên</label>
                <input type="text" name="fullname" class="form-control" placeholder="Họ và tên" value="{{old('fullname',$info['fullname'])}}" required="required" />
              </div>
              <div class="div-label">
                <label class="col-form-label account-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email',$info['email'])}}" required="required" />
              </div>
              <div class="div-label">
                <label class="col-form-label account-label">Số điện thoại</label>
                <input type="text" id="phone-number" oninput="validatePhoneNumber()" maxlength="10" 
                name="phone" class="form-control" placeholder="Số điện thoại" value="{{old('phone',$info['phone'])}}" required="required" />
              </div>
              <div class="div-label">
                <label class="col-form-label account-label">Mật khẩu cũ</label>
                <input type="password" name="old_password" class="form-control" placeholder="Mật khẩu cũ"  />
              </div>
              <div class="div-label">
                <label class="col-form-label account-label">Mật khẩu mới</label>
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu mới"  />
              </div>
              <div class="div-label">
                <label class="col-form-label account-label">Nhập lại mật khẩu mới</label>
                <input type="password" name="re_password" class="form-control" placeholder="Mật khẩu nhập lại mật khẩu mới" />
              </div>
              <div>
                <a href="{{route('homepage')}}" class="btn btn-primary back-button">QUAY LẠI</a>
                <button class="btn btn-success submit">CẬP NHẬT</button>
              </div>

              <div class="clearfix"></div>

            </form>
          </section>
        </div>
      </div>
    </div>

  <script type="text/javascript">
    function validatePhoneNumber() {
        // Get the input element using the id
        var input = document.getElementById('phone-number');
  
        // Remove non-numeric characters from the input
        var phoneNumber = input.value.replace(/\D/g, '');
  
        // Check if the phone number has exactly 10 digits
        if (phoneNumber.length === 10) {
              // Valid phone number
              input.setCustomValidity('');
        } else {
              // Invalid phone number, set a custom validation message
              input.setCustomValidity('Số điện thoại phải đủ 10 kí tự.');
        }
    }
  </script>

  <script type="text/javascript">
    function validateUsername() {
        // Get the input element by id
        var input = document.getElementById('customer-username');

        // Get the input value
        var username = input.value;

        // Define the regex pattern
        var pattern = /^[a-z0-9]+$/i;

        // Test the input against the pattern
        if (pattern.test(username) && username.length <= 32) {
            // Valid username
            input.setCustomValidity('');
        } else {
            // Invalid username, set a custom validation message
            input.setCustomValidity('Tên đăng nhập chỉ chứa chữ cái và số');
        }
    }
  </script>

  <script src="{{asset('public/backend/vendors/jquery/dist/jquery.min.js')}}"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  </body>
</html>

