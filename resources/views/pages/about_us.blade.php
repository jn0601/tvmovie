@extends('layout')
@section('content')

<style>
   .page_gioithieu h2 {
      font-family: 'Nunito', sans-serif;
      font-size: 2.2em;
      color: #151515;
      font-weight: 600;
      margin-bottom: 20px;
      line-height: 1.1;
   }
   .page_gioithieu h3 {
      color: #404044;
      font-size: 1.8em;
      margin-bottom: 20px;
      font-weight: 600;
   }
</style>

<!-- page wrapper starts -->
<div id="page-wrapper">
   <h1 class="tieu-de-trang" style="display:none">Giới thiệu</h1>
   <!-- Jumbotron -->
   <div class="jumbotron jumbotron-fluid">
      <div class="container" >
         <!-- jumbo-heading -->
         <div class="jumbo-heading" data-aos="fade-down">
            <p>Về chúng tôi</p>
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
               </ol>
            </nav>
            <!-- /breadcrumb -->
         </div>
         <!-- /jumbo-heading -->
      </div>
      <!-- /container -->
   </div>
   <!-- /jumbotron -->
   <!-- ==== Page Content ==== -->
   <div class="page page_gioithieu">
      <div class="container block-padding">
         <!--row -->
         <div class="row">
            <div class="col-lg-8">
               <h2>Môi trường học tập hấp dẫn</h2>
               <p class="h7 mt-3 mb-4">Con bạn sẽ phát triển lòng tự trọng, tính độc lập và ngôn ngữ</p>
               <p>Etiam vestibulum sit amet nulla vel ornare. Vestibulum vitae turpis ac sapien pharetra facilisis. Curabitur non libero justo. Suspendisse at ultrices velit. Quisque aliquet quis nibh sed feugiat. Curabitur et quam felis. Nulla rhoncus laoreet dolor, et vestibulum sem consectetur a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt turpis ut sagittis tempor.
               </p>
               <ul class="custom pl-0">
                  <li> Hơn 30 chuyên gia đủ điều kiện </li>
                  <li> Chúng tôi cung cấp cho bạn các dịch vụ chất lượng từ năm 2002 </li>
                  <li> Các hoạt động vui chơi và giáo dục trong kế hoạch hàng ngày của chúng tôi </li>
               </ul>
               <!-- /custom-ul-->          
            </div>
            <!-- /col-lg-->
            <div class="col-lg-4">
               <img src="img/about/about1.jpg" class="img-fluid blob" alt="">
               <!-- ornament starts-->
               <div class="ornament-bubbles" data-aos="fade-right"></div>
            </div>
            <!-- /col-lg-->
            <!-- notepad -->
            <div class="col-lg-12">
               <div class="notepad mt-5"  data-aos="zoom-out">
                  <div class="row">
                     <div class="col-lg-4">
                        <img src="img/about/about3.jpg" class="img-fluid rounded rotate1" alt="">
                        <!-- ornament starts-->
                        <div class="ornament-rainbow"  data-aos="zoom-out"></div>
                     </div>
                     <!-- /col-lg-->
                     <div class="col-lg-8">
                        <h3 class="mt-3">Kế hoạch giáo dục của chúng tôi</h3>
                        <p class="res-margin">Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                        <p>Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall Maecenas at arcu risus scelerisque laoree. arcu risus onec comm nec elementum ipsum convall.</p>
                        <a href="{{URL::to('/lien-he')}}"  class="btn btn-tertiary">Liên hệ chúng tôi</a>
                     </div>
                     <!-- /col-lg-->
                  </div>
                  <!-- /row -->
               </div>
               <!-- /notepad -->
            </div>
            <!-- /col-lg-->
         </div>
         <!-- /row -->		 
      </div>
      <!-- /container -->
      <!-- counter Section  -->
      <section id="counter-section" class="container-fluid counter-calltoaction overlay bg-fixed"  data-100-bottom="background-position: 50% 100px;"
      data-top-bottom="background-position: 50% -100px;" >
      <div id="counter" class="container">
         <div  class="row col-lg-10 offset-lg-1">
            <!-- Counter -->
            <div class="col-xl-4 col-md-4">
               <div class="counter">
                  <div class="counter-wrapper bg-primary">
                     <i class="counter-icon flaticon-teacher"></i>
                     <!-- insert your final value on data-count= -->
                     <div class="counter-value" data-count="30">0</div>
                     <h3 class="title">Chuyên gia</h3>
                  </div>
               </div>
               <!-- /counter -->
            </div>
            <!-- /col-lg -->
            <!-- Counter -->
            <div class="col-xl-4 col-md-4">
               <div class="counter">
                  <div class="counter-wrapper bg-secondary">
                     <i class="counter-icon  flaticon-family"></i>
                     <!-- insert your final value on data-count= -->
                     <div class="counter-value" data-count="74">0</div>
                     <h3 class="title">Bố mẹ hạnh phúc</h3>
                  </div>
               </div>
               <!-- /counter -->
            </div>
            <!-- /col-lg -->
            <!-- Counter -->
            <div class="col-xl-4 col-md-4">
               <div class="counter">
                  <div class="counter-wrapper bg-tertiary">
                     <i class="counter-icon flaticon-children"></i>
                     <!-- insert your final value on data-count= -->
                     <div class="counter-value" data-count="104">0</div>
                     <h3 class="title">Học sinh</h3>
                  </div>
               </div>
               <!-- /counter -->
            </div>
            <!-- /col-lg -->		 
         </div>
         <!-- /row -->
      </div>
      <!-- /container -->
   </section>
   <!-- /section ends-->   
   <div class="container block-padding">
      <!-- row-->
      <div class="row">
         <div class="col-lg-6">
            <!-- accordion -->
            <div class="accordion">
               <!-- collapsible accordion 1 -->
               <div class="card">
                  <div class="card-header">
                     <a class="card-link" data-toggle="collapse" href="#collapseOne">
                        Triết lý của chúng tôi
                     </a>
                  </div>
                  <!-- /card-header -->
                  <div id="collapseOne" class="collapse show" data-parent=".accordion">
                     <div class="card-body">
                        <p>Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                     </div>
                  </div>
               </div>
               <!-- /card -->
               <!-- collapsible accordion 2 -->
               <div class="card">
                  <div class="card-header">
                     <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                        Tổ chức của chúng tôi
                     </a>
                  </div>
                  <div id="collapseTwo" class="collapse" data-parent=".accordion">
                     <div class="card-body">
                        <p>Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall Maecenas at arcu risus scelerisque laoree.</p>
                     </div>
                  </div>
               </div>
               <!-- /card -->
               <!-- collapsible accordion 3 -->
               <div class="card">
                  <div class="card-header">
                     <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        Hợp tác với nhóm của chúng tôi
                     </a>
                  </div>
                  <div id="collapseThree" class="collapse" data-parent=".accordion">
                     <div class="card-body">
                        <p>Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                        <p>Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall Maecenas at arcu risus scelerisque laoree.</p>
                     </div>
                  </div>
               </div>
               <!-- /card -->
            </div>
            <!-- /accordion -->
         </div>
         <!-- /col-lg-->
         <div class="col-lg-6">
            <h3 class="res-margin">Nhân viên có trình độ</h3>
            <p class="h7 mt-3 mb-3">Consectetur adipiscing elit. Quisque tincidunt turpis ut sagittis tempor.</p>
            <p>Etiam vestibulum sit amet nulla vel ornare. Vestibulum vitae turpis ac sapien pharetra facilisis. Curabitur non libero justo. Suspendisse at ultrices velit. Quisque aliquet quis nibh sed feugiat. Curabitur et quam felis. Nulla rhoncus laoreet dolor, et vestibulum sem consectetur a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt turpis ut sagittis tempor.
            </p>
            <!-- buttons -->
            <a href="{{URL::to('/lien-he')}}"  class="btn btn-tertiary">Liên hệ chúng tôi</a>
            <a href="?page=doingu" class="btn-margin btn btn-quaternary ml-1" >Đội ngũ</a>
         </div>
         <!-- /col-lg-->
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</div>
<!-- /page -->
</div>
      <!--/ page-wrapper -->
@endsection