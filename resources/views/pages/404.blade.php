@extends('layout')
@section('404')
<!-- page wrapper starts -->
<div id="page-wrapper">
    <!-- ==== Page Content ==== -->
    <div class="page">
       <div class="container" id="not-found">
          <div class="row text-lg-left text-center">
             <!-- content -->
             <div class="col-lg-5 offset-lg-2" data-aos="zoom-in">
                <!-- image -->
                <img src="img/404.png" class="img-fluid" alt="">
             </div>
             <!-- /col-lg -->
             <div class="col-lg-5" data-aos="fade-down">
                <h1>404</h1>
                <span>Rất tiếc, không tìm thấy gì ..</span>
                <div class="text-lg-left">
                   <!-- button -->
                   <a href="" class="btn btn-secondary btn-sm mt-4">Quay lại trang chủ</a>
                </div>
             </div>
             <!-- /col-lg -->
          </div>
          <!-- /.row -->
       </div>
       <!-- /.container -->
    </div>
    <!-- /page -->
 </div>
       <!--/ page-wrapper -->
@endsection