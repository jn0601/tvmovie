<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
	<link rel="icon" href="{{asset('public/backend/images/favicon.ico')}}" type="image/ico" />

    <title>Trang quản lý Admin</title>


    <link href="{{asset('public/backend/css/select2.min.css')}}" rel="stylesheet"/>
    
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Bootstrap -->
    <link href="{{asset('public/backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public/backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public/backend/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('public/backend/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{asset('public/backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('public/backend/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet')}}"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('public/backend/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('public/backend/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link href="{{asset('public/backend/css/admin-style.css')}}" rel="stylesheet"/>
  </head>
  
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            {{-- <div class="navbar nav_title" style="border: 0;">
              <a href="{{URL::to('admin')}}" class="site_title"><i class="fa fa-paw"></i> <span></span></a>
            </div>

            <div class="clearfix"></div> --}}

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('public/backend/images/pfp.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin chào,</span>
                <h2>@php
                    use Illuminate\Support\Facades\Session;
                    $name = Session::get('fullname');
                    $admin_level = Session::get('admin_level');
                    if ($name) {
                        echo $name ;
                    } 
                    @endphp
                    </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">
                  <li><a href="{{URL::to('admin')}}"><i class="fa fa-home"></i> Trang chủ 
                </a>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Quản lý website <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('admin/menus')}}">Quản lý menu</a></li>
                      <li><a href="{{URL::to('admin/contacts')}}">Quản lý khách hàng liên hệ</a></li>
                    </ul>
                  </li>
                  @if ($admin_level != 2)
                  {{-- <li><a><i class="fa fa-cogs"></i> Chức năng admin <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('admin/features')}}">Quản lý menu chức năng</a></li>
                    </ul>
                  </li> --}}
                  @endif
                  {{-- <li><a><i class="fa fa-desktop"></i> Chức năng chính <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    
                    </ul>
                  </li> --}}
                  {{-- <li><a><i class="fa fa-gamepad"></i> Quản lý sản phẩm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('admin/products')}}">Danh sách sản phẩm</a></li>
                      <li><a href="{{URL::to('admin/product-categories')}}">Danh sách danh mục</a></li>
                    </ul>
                  </li> --}}
                  <li><a><i class="fa fa-newspaper-o"></i> Quản lý tin tức <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('admin/news')}}">Danh sách tin tức</a></li>
                      <li><a href="{{URL::to('admin/news-categories')}}">Danh sách danh mục</a></li>
                    </ul>
                  </li>
                  {{-- <li><a><i class="fa fa-sliders"></i> Quản lý banner<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('admin/banners')}}">Danh sách banner</a></li>
                      <li><a href="{{URL::to('admin/banner-categories')}}">Danh sách danh mục</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-image"></i> Quản lý thư viện ảnh <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('admin/albums')}}">Danh sách ảnh</a></li>
                      <li><a href="{{URL::to('admin/list-albums-cate')}}">Danh sách danh mục</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-video-camera"></i> Quản lý thư viện video <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('admin/videos')}}">Danh sách video</a></li>
                      <li><a href="{{URL::to('admin/list-videos-cate')}}">Danh sách danh mục</a></li>
                    </ul>
                  </li> --}}
                  @if ($admin_level != 2)
                  {{-- <li><a><i class="fa fa-user"></i> Quản lý users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @if ($admin_level == 99)
                      <li><a href="{{URL::to('admin/list-adminpa-users')}}">Danh sách admin PA</a></li>
                      @endif
                      <li><a href="{{URL::to('admin/users')}}">Danh sách người dùng</a></li>
                      <li><a href="{{URL::to('admin/roles')}}">Quản lý vai trò</a></li>
                    </ul>
                  </li> --}}
                  @endif
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            {{-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{URL::to('admin/logout')}}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> --}}
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('public/backend/images/pfp.jpg')}}" alt="">
                    <?php if ($name) {
                        echo $name ;
                     } ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Thông tin cá nhân</a>
                      <!-- <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a> -->
                    <a class="dropdown-item"  href="{{URL::to('admin/logout')}}"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a>
                  </div>
                </li>

                <!-- <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="{{asset('public/backend/images/pfp.jpg')}}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="{{asset('public/backend/images/pfp.jpg')}}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="{{asset('public/backend/images/pfp.jpg')}}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="{{asset('public/backend/images/pfp.jpg')}}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        @yield('admin_content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            {{-- Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> --}}
            <p>
              <a href="" 
              title="" 
              target="_blank">Sản phẩm của</a>
              <a href="" target="_blank">
                <img style="height: 30px; width:50px" 
                src="{{asset('public/frontend/img/251684864.png')}}">
              </a>
              <a href="https://pavietnam.vn/" 
              title="Thiết kế website" 
              target="_blank">Cung cấp bởi .....</a>
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('public/backend/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('public/backend/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('public/backend/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('public/backend/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('public/backend/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('public/backend/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('public/backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('public/backend/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('public/backend/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('public/backend/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('public/backend/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('public/backend/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('public/backend/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('public/backend/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('public/backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('public/backend/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('public/backend/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('public/backend/vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('public/backend/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('public/backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('public/backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('public/backend/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('public/backend/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('public/backend/js/custom.min.js')}}"></script>
    <script src="{{asset('public/backend/ckeditor4/ckeditor.js')}}"></script>
    <script src="{{asset('public/backend/js/bootstrap-tagsinput.js')}}"></script>
    <!-- <script src="{{asset('public/backend/js/datatables.js')}}"> </script> -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- <script src="{{asset('public/backend/ckeditor5/ckeditor.js')}}"></script> -->
    <script type="text/javascript">
      CKEDITOR.replace('ckeditor1');
      CKEDITOR.replace('ckeditor2');
      CKEDITOR.replace('ckeditor3');

      // ClassicEditor.create(document.getElementById('ckeditor1'));
      // ClassicEditor.create(document.getElementById('ckeditor2'));
      // ClassicEditor
      //   .create( document.querySelector( '#ckeditor1' ), document.querySelector( '#ckeditor2' ) )
      //   .catch( error => {
      //       console.error( error );
      //   } );
    </script>

    <script type="text/javascript">
      let table = new DataTable('#myTable');
    </script>
<script src="{{asset('public/backend/js/select2.min.js')}}"></script>
<script src="{{asset('public/backend/js/admin_page.js')}}" type="text/javascript"></script>

<script type="text/javascript">
  function ChangeToSlug()
  {
      var slug;
   
      //Lấy text từ thẻ input title 
      slug = document.getElementById("slug").value;
      slug = slug.toLowerCase();
      //Đổi ký tự có dấu thành không dấu
          slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
          slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
          slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
          slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
          slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
          slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
          slug = slug.replace(/đ/gi, 'd');
          //Xóa các ký tự đặt biệt
          slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
          //Đổi khoảng trắng thành ký tự gạch ngang
          slug = slug.replace(/ /gi, "-");
          //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
          //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
          slug = slug.replace(/\-\-\-\-\-/gi, '-');
          slug = slug.replace(/\-\-\-\-/gi, '-');
          slug = slug.replace(/\-\-\-/gi, '-');
          slug = slug.replace(/\-\-/gi, '-');
          //Xóa các ký tự gạch ngang ở đầu và cuối
          slug = '@' + slug + '@';
          slug = slug.replace(/\@\-|\-\@|\@/gi, '');
          //In slug ra textbox có id “slug”
      document.getElementById('convert_slug').value = slug;

      var slug2;
   
      //Lấy text từ thẻ input title 
      slug2 = document.getElementById("slug2").value;
      slug2 = slug2.toLowerCase();
      //Đổi ký tự có dấu thành không dấu
          slug2 = slug2.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
          slug2 = slug2.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
          slug2 = slug2.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
          slug2 = slug2.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
          slug2 = slug2.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
          slug2 = slug2.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
          slug2 = slug2.replace(/đ/gi, 'd');
          //Xóa các ký tự đặt biệt
          slug2 = slug2.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
          //Đổi khoảng trắng thành ký tự gạch ngang
          slug2 = slug2.replace(/ /gi, "-");
          //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
          //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
          slug2 = slug2.replace(/\-\-\-\-\-/gi, '-');
          slug2 = slug2.replace(/\-\-\-\-/gi, '-');
          slug2 = slug2.replace(/\-\-\-/gi, '-');
          slug2 = slug2.replace(/\-\-/gi, '-');
          //Xóa các ký tự gạch ngang ở đầu và cuối
          slug2 = '@' + slug2 + '@';
          slug2 = slug2.replace(/\@\-|\-\@|\@/gi, '');
          //In slug ra textbox có id “slug”
      document.getElementById('convert_slug2').value = slug2;
  }
  
</script>
<script type="text/javascript">
  let table = new DataTable('#myTable');
</script>

<script type="text/javascript">
  $('#tags-input').tagsinput({
    confirmKeys: [13, 44]
  });

  $('.bootstrap-tagsinput input').keydown(function(event) {
    if (event.which == 13) {
      $(this).blur();
      $(this).focus();
      return false;
    }
  })
</script>

<script>
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
  });
  $(document).on('click', 'a.jquery-postback', function(e) {
      e.preventDefault(); // does not go through with the link.
  
      var $this = $(this);
  
      $.post({
          type: $this.data('method'),
          url: $this.attr('href')
      }).done(function (data) {
          alert('success');
          console.log(data);
      });
  });
  </script>

<script type="text/javascript">
  $(document).ready(function(){
    load_photo();

    function load_photo(){
      var album_id = $('.album_id').val();
      var _token = $('input[name="_token"]').val();
      // alert(album_id);
      $.ajax({
          url:"{{url('admin/select-photos')}}",
          method:"POST",
          data:{album_id:album_id,_token:_token},
          success:function(data){
              $('#photo_load').html(data);
          }
      });
      }

      $('#file').change(function(){
        var error = '';
        var files = $('#file')[0].files;
        if(files.length>20){
          error += '<p>Bạn chỉ chọn tối đa được 20 ảnh</p>';
        } else if(files.length == '') {
          error += '<p>Bạn không được bỏ trống ảnh</p>';
        } else if(files.size >10000000){

          error += '<p>File ảnh không được quá 10MB</p>';
        }

        if(error == ''){

        }
        else{
          $('#file').val('');
          $('#error_photo').html('<span class="text-danger">'+error+'</span>');
          return false;
        }
      });


      // $(document).on('blur','.edit_gal_name' ,function(){
      //     var gal_id = $(this).data('gal_id');
      //     var gal_text = $(this).text();
      //     var _token = $('input[name="_token"]').val();

      //     $.ajax({
      //     url:"{{url('admin/update-photo-name')}}",
      //     method:"POST",
      //     data:{gal_id:gal_id,gal_text:gal_text,_token:_token},
      //     success:function(data){
      //         load_photo();
      //         $('#error_photo').html('<span class="text-danger">Cập nhật tên hình ảnh thành công</span>');
      //     }
      // });
      // });

      $(document).on('click','.delete-photo' ,function(){
          var gal_id = $(this).data('gal_id');
          var _token = $('input[name="_token"]').val();
        if(confirm('Bạn muốn xóa hình ảnh này không?'))
        {
          $.ajax({
          url:"{{url('admin/delete-photos')}}",
          method:"POST",
          data:{gal_id:gal_id,_token:_token},
          success:function(data){
              load_photo();
              $('#error_photo').html('<span class="text-danger">Xóa hình ảnh thành công</span>');
          }
      });
        };
      });
  
  
      $(document).on('change','.file_image' ,function(){
          var gal_id = $(this).data('gal_id');
          var image= document.getElementById('file-'+gal_id).files[0];
         
          var form_data = new FormData();

          form_data.append("file",document.getElementById('file-'+gal_id).files[0]);
          form_data.append("gal_id",gal_id);
      
          $.ajax({
          url:"{{url('admin/update-photos')}}",
          method:"POST",
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          data:form_data,
          contentType:false,
          cache:false,
          processData:false,
          success:function(data){
              load_photo();
              $('#error_photo').html('<span class="text-danger">Cập nhật hình ảnh thành công</span>');
          }
      });
    
    });


      
});
</script>

  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
	
  </body>
</html>
