@extends('layout')
@section('content')

<style>
   .page_dichvu-view h1 {
      color: #151515;
      font-size: 2.8em;
      font-weight: 800;
      font-family: Nunito;
      line-height: 1.2;
      text-transform: initial;
   }

   .page_dichvu-view .page-with-sidebar h2 {
      color: #404044;
      font-size: 1.8em;
      margin-bottom: 20px;
      font-weight: 600;
      font-family: inherit;
   }

   .page_dichvu-view h3 {
      color: #414242;
      font-size: 1.5em;
      font-weight: 600;
      margin-bottom: 20px;
   }

   .page_dichvu-view .serviceBox2 h3 {
      color: #404044;
      font-size: 1.8em;
      margin-bottom: 20px;
      font-weight: 600;
      font-family: inherit;
   }

   .page_dichvu-view .sidebar-header {
      text-align: center;
      margin-top: 30px;
      font-size: 20px;
      font-weight: 600;
      padding: 8px 10px 11px;
      color: #fff;
   }

   .page_dichvu-view .blog-box a:hover h3 {
      color: #e4a40f;
   }
</style>

<!-- page wrapper starts -->
<div id="page-wrapper">
   <!-- Jumbotron -->
   <div class="jumbotron jumbotron-fluid">
      <div class="container">
         <!-- jumbo-heading -->
         <div class="jumbo-heading" data-aos="fade-down">
            <p>Sản phẩm</p>
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Danh mục sản phẩm</a></li>
                  <li class="breadcrumb-item"><a href="?page=dichvu">Sản phẩm</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
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
   <div class="page page_dichvu-view">
      <div class="container">
         <div class="row">
            {{-- @foreach($product_detail as $key => $product) --}}
            <!-- page with sidebar starts -->
            <div class="col-lg-9 page-with-sidebar">
               <div class="col-md-12">
                  <h1 class="mb-2">{{$product_detail->name}}</h1>
                  <!-- Image -->
                  <!-- <p class="h7">Giá: {{$product_detail->price_sale}} đ</p> -->
                  <p>{!!$product_detail->desc!!}
                  </p>
                  <!-- row -->
                  <div class="row content">
                     <div class="col-md-5">
                        <div class="col-md-12 carousel-1item owl-carousel owl-theme " data-aos="fade-in">
                           <img src="{{URL::to('public/backend/uploads/products/'.$product_detail->image)}}" class="img-fluid rounded-circle" alt="">
                           <!-- <img src="img/services/service-single2.jpg" class="img-fluid rounded-circle" alt="">
                           <img src="img/services/service3.jpg" class="img-fluid rounded-circle" alt=""> -->
                        </div>
                        <!-- /col-md- -->
                     </div>
                     <!-- /col-md -->
                     <div class="col-md-7">
                        <h2 style="color: #e7373d">Giá: {{$product_detail->price_sale}} đ</h2>
                        <!-- Image -->
                        <!-- <p>Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall Maecenas at arcu risus scelerisque laoree.
                           Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.
                        </p> -->
                        
                        <!-- Button -->
                        <a href="{{URL::to('/lien-he')}}" class="btn btn-secondary mt-3">Liên hệ ngay</a>
                     </div>
                     <!-- /col-md -->

                     <div class="col-md-12 mt-5" style="margin-top: 0 !important;">
                        <div class="tag-socical container">
                           <div class="tag">
                              <ul style="padding: 0; margin: 0;">
                                 <li class="text1"><span>Tags :</span></li>
                                 <li class="text2"><a href="#">{{$product_detail->tags}}</a></li>
                              </ul>
                           </div>
                           <div class="socical">
                              <ul>
                                 <li class="text1"><span>Share :</span></li>
                                 <li class="topbar-socials">
                                    <span class="icons">
                                       <a href="#"><i class="fab fa-facebook-f"></i></a>
                                       <a href="#"><i class="fab fa-twitter"></i></a>
                                       <a href="#"><i class="fab fa-instagram"></i></a>
                                    </span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <h2>Thông tin chi tiết</h2>
                        <div class="accordion mt-3">
                           <!-- collapsible accordion 1 -->
                           {!!$product_detail->content!!}
                           <!-- /card -->
                        </div>
                        <!-- /accordion -->
                     </div>
                     <!-- /col-md-12-->
                     <div class="col-md-12 mt-5">
                        <!-- <h3>Lợi ích của chúng tôi</h3> -->
                        <!-- custom-list -->
                        <!-- <ul class="custom pl-0">
                           <li>Orci eget, viverra elit liquam erat volut pat phas ellus ac Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dol</li>
                           <li>Ipuset phas ellus ac sodales Lorem ipsum dolor Phas ell lorem</li>
                           <li>Ipuset phas ellus ac sodales Lorem ipsum dolor Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dol</li>
                           <li>Ipuset phas ellus ac sodales Lorem ipsum dolor Phas ell lorem , scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus</li>
                           <li>Aliquam erat volut pat phas ellu</li>
                        </ul> -->
                        <!-- /ul -->
                     </div>
                     <!-- /col-md -->
                     <!-- custom link -->
                     <a class="custom-link float-right mt-5" href="{{URL::previous()}}">Quay lại</a>
                  </div>
                  <!-- /row -->
               </div>
               <!-- /col-md-12 -->
            </div>
            <!-- /col-lg-9 -->
            <!-- ==== Sidebar ==== -->
            <div id="sidebar" class="col-lg-3 h-50 sticky-top">
               <!--widget area-->
               <div class="widget-area notepad">
                  <h3 class="sidebar-header">Sản phẩm cùng danh mục</h3>
                  @foreach($related_product as $key => $related_name)
                  <div class="list-group">
                     <a href="{{URL::to('/'.$related_name->seo_name)}}" class="list-group-item list-group-item-action active">{{$related_name->name}}</a>
                  </div>
                  @endforeach
                  <!-- /list-group -->
               </div>
               <!-- /widget-area -->
            </div>
            <!-- /sidebar -->
            {{-- @endforeach --}}
         </div>
         <!-- /row-->
      </div>
      <div class="box-page magnific-popup1 box-news">
         <div class="container">
            <div class="col-lg-6 text-center offset-lg-3">
               <h2>Sản phẩm liên quan</h2>
               <!-- <p>In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p> -->
            </div>
            <div class="carousel-3items owl-carousel owl-theme mt-0">
               <!-- blog-box -->
               @foreach($related_product as $key => $related)
               <div class="serviceBox2">
                  <!-- service icon -->
                  <div class="service-icon">
                     <a href="{{URL::to('/'.$related->seo_name)}}">
                        <img src="{{URL::to('public/backend/uploads/products/'.$related->image)}}" alt="" class="blob2 img-fluid">
                     </a>
                  </div>
                  <!-- service content -->
                  <div class="service-content">
                     <a href="">
                        <h3 class="service-head">{{$related->name}}</h3>
                     </a>
                     <p>
                     {!!$related->desc!!}
                     </p>
                     <!-- Button -->
                     <a href="{{URL::to('/'.$related->seo_name)}}" class="btn btn-quaternary btn-sm mt-2 ml-1">Xem thêm</a>
                  </div>
               </div>
               @endforeach
               <!-- service 3  -->
               
               <!-- service 4  -->
               
               <!-- service 5 -->
               
               <!-- /blog-box -->
            </div>
            
            <!-- /owl-carousel -->
         </div>
      </div>
      <!-- /container-->
   </div>
   <!-- /page -->
</div>
<!--/ page-wrapper -->
@endsection