@extends('layout')
@section('content')

<!-- page wrapper starts -->
<div id="page-wrapper">

   <h1 class="tieu-de-trang" style="display:none">Tên công ty</h1>
   <div class="container-fluid p-0">
    <!-- Parallax Slider -->
    <div id="slider" class="parallax-slider" style="width:1200px;margin:0 auto;margin-bottom: 0px;">
       <!-- Slide 1 -->
       <div class="ls-slide" data-ls="duration:4000; transition2d:7;">
          <!-- background image  -->
          @if ($banner_top)
          <img src="{{URL::to('public/backend/uploads/banners/'.$banner_top->image)}}" class="ls-bg" alt="" />
          @else
          <img src="{{asset('public/frontend/img/slider/parallaxslider/slide1.jpg')}}" class="ls-bg" alt="" />
          @endif
          <!-- clouds  -->
          <img  src="{{asset('public/frontend/img/slider/parallaxslider/clouds.png')}}" class="ls-l" alt="" style="top:56px;left:-100px;" data-ls="parallax:true; parallaxlevel:-5;">
          <!-- butterflies  -->
          <img  src="{{asset('public/frontend/img/slider/parallaxslider/butterflies.png')}}" class="ls-l" alt="" style="top:16px;left:0px;" data-ls=" parallax:true; parallaxlevel:4;">
          <!-- sun  -->
          <img  src="{{asset('public/frontend/img/slider/parallaxslider/sun.png')}}" class="ls-l" alt="" style="top:-190px;left:650px;" data-ls="parallax:true; parallaxlevel:-3;">
          <!--child image  -->
          <img  src="{{asset('public/frontend/img/slider/parallaxslider1.png')}}" class="ls-l" alt="" style="top:166px;left:520px;" data-ls="offsetxin:10; offsetyin:120; durationin:1100; rotatein:5; transformoriginin:59.3% 80.3% 0; offsetxout:-80; durationout:400; parallax:true; parallaxlevel:10;">
          <!-- text  -->
          <div class="ls-l header-wrapper" data-ls="offsetyin:150; durationin:700; delayin:200; easingin:easeOutQuint; rotatexin:20; scalexin:1.4; offsetyout:600; durationout:400;">
             <div class="header-text">
                <span>Chào mừng bạn đến</span> 
                <h2> ABC TOTS</h2>
                <!--the div below is hidden on small screens  -->
                <div class="hidden-small">
                   <p class="header-p">Chúng tôi cung cấp Dịch vụ Nhà trẻ chất lượng cao, hãy liên hệ với chúng tôi hoặc truy cập chúng tôi ngay hôm nay để biết thêm thông tin</p>
                   <a class="btn btn-secondary" href="{{URL::to('/lien-he')}}">Liên hệ chúng tôi</a>
                </div>
                <!--/hidden-small -->
             </div>
             <!-- header-text  -->
          </div>
          <!-- ls-l  -->
       </div>
       <!-- ls-slide -->
    </div>
    <!-- /slider -->
    <svg version="1.1" id="divider"  class="slider-divider" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 1440 126" preserveAspectRatio="none slice" xml:space="preserve">
    <path class="st0" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
 </svg>
 </div>
   <!-- /container-fluid -->
   <!-- ==== Page Content ==== -->
   <div class="container">
      <!-- section -->  
      <section id="intro-cards"  class="row pb-0">
         @php
            $count = 0;
         @endphp
         @foreach($banner_top_3_tab as $key => $tab)
         <!-- card 1 --> 
         @if ($count == 0) 
         <div class="col-lg-4" data-aos="zoom-out">
            <div class="card card-flip">
               <!-- front of card  -->  
               <div class="card bg-secondary text-light ">
                  <div class="p-5">
                     <h3 class="card-title text-light">{{$tab->name}}</h3>
                     <p class="card-text">
                        {!! $tab->desc !!}
                     </p>
                     <!-- button show on mobile only,where flip is disabled -->
                     <a href="{{URL::to('/lien-he')}}" class="btn d-lg-none">Liên hệ</a>
                  </div>
                  <!-- /p-5 -->
                  <!-- image -->
                  <img class="card-img" src="{{URL::to('public/backend/uploads/banners/'.$tab->image)}}" alt="">
               </div>
               <!-- /card -->
               <!-- back of card -->  			
               <div class="card bg-secondary text-light card-back">
                  <div class="card-body d-flex justify-content-center align-items-center">
                     <div class="p-4">
                        {{-- <h3 class="card-title text-light">Từ năm 2004</h3> --}}
                        <p class="card-text">{!!$tab->content!!}
                        </p>
                        <!-- button -->
                        <a href="{{URL::to('/lien-he')}}" class="btn">Liên hệ</a>
                     </div>
                     <!-- /p-4 -->
                  </div>
                  <!-- /card-body -->
               </div>
               <!-- /card -->
            </div>
            <!--/col-lg -->
         </div>
         @php
            $count++;
         @endphp
         <!--/card 1 -->  
         <!-- card 2-->  
         @elseif($count == 1)
         <div class="col-lg-4" data-aos="zoom-out" data-aos-delay="300">
            <div class="card card-flip ">
               <!-- front of card  -->  
               <div class="card bg-primary text-light">
                  <div class="p-5">
                     <h3 class="card-title text-light">{{$tab->name}}</h3>
                     <p class="card-text">
                        {!! $tab->desc !!}
                     </p>
                     <!-- button show on mobile only,where flip is disabled -->
                     <a href="{{URL::to('/lien-he')}}" class="btn d-lg-none">Liên hệ</a>
                  </div>
                  <!-- /p-5 -->
                  <!-- image -->
                  <img class="card-img" src="{{URL::to('public/backend/uploads/banners/'.$tab->image)}}" alt="">
               </div>
               <!-- /card -->
               <!-- back of card -->  			
               <div class="card bg-primary text-light card-back">
                  <div class="card-body d-flex justify-content-center align-items-center">
                     <div class="p-4">
                        {{-- <h3 class="card-title text-light">Nhà trẻ chất lượng</h3> --}}
                        <p class="card-text">{!!$tab->content!!}
                        </p>
                        <!-- button -->
                        <a href="{{URL::to('/lien-he')}}" class="btn">Liên hệ</a>
                     </div>
                     <!-- /p-4 -->
                  </div>
                  <!-- /card-body -->
               </div>
               <!-- /card -->
            </div>
            @php
               $count++;
            @endphp
            <!--/card 2 -->
         </div>
         <!--/col-lg -->
         <!-- card 3-->  
         @else
         <div class="col-lg-4" data-aos="zoom-out" data-aos-delay="600">
            <div class="card card-flip ">
               <!-- front of card  -->  
               <div class="card bg-tertiary text-light">
                  <div class="p-5">
                     <h3 class="card-title text-light">{{$tab->name}}</h3>
                     <p class="card-text">
                        {!! $tab->desc !!}
                     </p>
                     <!-- button show on mobile only,where flip is disabled -->
                     <a href="{{URL::to('/lien-he')}}" class="btn d-lg-none">Liên hệ</a>
                  </div>
                  <!-- /p-5 -->
                  <!-- image -->
                  <img class="card-img" src="{{URL::to('public/backend/uploads/banners/'.$tab->image)}}" alt="">
               </div>
               <!-- /card -->
               <!-- back of card -->  			
               <div class="card bg-tertiary text-light card-back">
                  <div class="card-body d-flex justify-content-center align-items-center">
                     <div class="p-4">
                        {{-- <h3 class="card-title text-light">Gặp gỡ nhân viên</h3> --}}
                        <p class="card-text">{!!$tab->content!!}
                        </p>
                        <!-- button -->
                        <a href="{{URL::to('/lien-he')}}" class="btn">Liên hệ</a>
                     </div>
                     <!-- /p-4 -->
                  </div>
                  <!-- /card-body -->
               </div>
               <!-- /card -->
            </div>
            <!--/card 3 -->
         </div>
         @endif
         <!--/col-lg -->
      @endforeach
      </section>
      <!-- #intro-cards --> 
   </div>
   <!-- /container -->  
   <!-- section -->
   <section id="about-home" class="container-fluid pb-0">
      <div class="container">
         <!-- section heading -->  
         <div class="section-heading text-center">
            <h2>Về chúng tôi</h2>
            <p class="subtitle">Làm để hiểu họ</p>
         </div>
         <!-- /section-heading -->
         <div class="row">
            @if ($banner_about_us)
            <div class="col-lg-7 ">
               <h3>{{$banner_about_us->name}}</h3>
               <p class="mt-4 res-margin">{!!$banner_about_us->desc!!}</p>
               <a href="{{URL::to('/lien-he')}}" class="btn btn-secondary ">Liên hệ ngay</a>
            </div>
            <!-- /col-lg -->
            <div class="col-lg-5 res-margin">
               <!-- image -->
               <img class="img-fluid rounded" src="{{URL::to('public/backend/uploads/banners/'.$banner_about_us->image)}}" alt="">
               <!-- ornament starts-->
               <div class="ornament-rainbow" data-aos="zoom-out"></div>
            </div>
            <!-- /col-lg -->
            @else
            <div class="col-lg-7 ">
               <h3>Nhiệm vụ của chúng tôi</h3>
               <p class="mt-4 res-margin">
                  Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecena Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.
                  Nec elementum ipsum convall. Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecen Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall Maecenas at arcu risus scelerisque laoree.
               </p>
               <a href="{{URL::to('/lien-he')}}" class="btn btn-secondary ">Liên hệ ngay</a>
            </div>
            <!-- /col-lg -->
            <div class="col-lg-5 res-margin">
               <!-- image -->
               <img class="img-fluid rounded" src="{{asset('public/frontend/img/about/about2.jpg')}}" alt="">
               <!-- ornament starts-->
               <div class="ornament-rainbow" data-aos="zoom-out"></div>
            </div>
            <!-- /col-lg -->
            @endif
         </div>
         <!-- /row -->
         <h3 class="mt-5 text-center">Cha mẹ nói gì:</h3>
         <div class="row">
            <!-- testimonials -->
            <!-- testimonial carousel -->
            <div class="carousel-2items owl-carousel owl-theme col-md-12">
               @foreach($banner_review as $key => $review)
               <!-- testimonial -->
               <div class="testimonial">
                  <div class="content">
                     <p class="description">
                        {!!$review->content!!}
                     </p>
                  </div>
                  <!-- /content -->
                  <div class="testimonial-pic">
                     <img src="{{URL::to('public/backend/uploads/banners/'.$review->image)}}" class="img-fluid" alt="">
                  </div>
                  <!-- /testimonial-pic -->
                  <div class="testimonial-review">
                     <h4 class="testimonial-title">{{$review->name}}</h4>
                     <span class="post">{!!$review->desc!!}</span>
                  </div>
                  <!-- /testimonial-review -->
               </div>
               <!-- /testimonial -->
               @endforeach
               <!-- testimonial -->
               {{-- <div class="testimonial">
                  <div class="content">
                     <p class="description">
                        Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.                        
                     </p>
                  </div>
                  <!-- /content -->
                  <div class="testimonial-pic">
                     <img src="{{asset('public/frontend/img/team/team2.jpg')}}" class="img-fluid" alt="">
                  </div>
                  <!-- /testimonial-pic -->
                  <div class="testimonial-review">
                     <h4 class="testimonial-title">John Sadana</h4>
                     <span class="post">Bác sĩ</span>
                  </div>
                  <!-- /testimonial-review -->
               </div> --}}
               <!-- /testimonial -->
               <!-- testimonial -->
               {{-- <div class="testimonial">
                  <div class="content">
                     <p class="description">
                        Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.                        
                     </p>
                  </div>
                  <!-- /content -->
                  <div class="testimonial-pic">
                     <img src="{{asset('public/frontend/img/team/team3.jpg')}}" class="img-fluid" alt="">
                  </div>
                  <!-- /testimonial-pic -->
                  <div class="testimonial-review">
                     <h4 class="testimonial-title">Jane Janeth</h4>
                     <span class="post">Thủ quỹ</span>
                  </div>
                  <!-- /testimonial-review -->
               </div> --}}
               <!-- /testimonial -->
            </div>
            <!-- /owl-testimonial -->      
         </div>
         <!-- /row -->
      </div>
      <!-- /container-->
      <!-- whale in water scene -->
      <!-- whale -->
      <img src="{{asset('public/frontend/img/ornaments/whale.png')}}" class="floating-whale" alt="">
      <!-- waves -->
      <div class="waveHorizontals">
         <div id="waveHorizontal1" class="waveHorizontal"></div>
         <div id="waveHorizontal2" class="waveHorizontal"></div>
         <div id="waveHorizontal3" class="waveHorizontal"></div>
      </div>
      <!-- sea -->
      <div class="sea"></div>
      <!--/ whale in water scene ends -->
   </section>
   <!-- /section ends -->
   <!-- section --> 
   <section id="features" class="bg-secondary text-light">
      <div class="container">
         <!-- section heading -->  
         <div class="section-heading text-center">
            <h2>Đặc trưng của chúng tôi</h2>
            <p class="subtitle">Lợi ích cho bạn</p>
         </div>
         <!-- /section-heading -->
         <!-- features -->
         <div class="row ">
            <div class="col-lg-6">
               <div class="row ">
                  <div class="col-md-6 col-lg-6">
                     <!-- feature -->
                     <div class="feature-with-icon">
                        <div class="icon-features">
                           <!-- icon -->
                           <i class="flaticon-maternity text-primary"></i>
                        </div>
                        <h3>Môi trường an toàn</h3>
                        <p>Etiam rhoncus leo a dolor placerat, nec elem entum ipsum convall.</p>
                     </div>
                     <!-- /feature-with-icon-->
                     <!-- feature -->
                     <div class="feature-with-icon mt-5">
                        <div class="icon-features">
                           <!-- icon -->
                           <i class="flaticon-open-book-1 text-primary"></i>
                        </div>
                        <h3>Hoạt động giáo dục</h3>
                        <p>Etiam rhoncus leo a dolor placerat, nec elem entum ipsum convall.</p>
                     </div>
                     <!-- /feature-with-icon-->
                  </div>
                  <div class="col-md-6 col-lg-6">
                     <!-- feature -->
                     <div class="feature-with-icon">
                        <div class="icon-features">
                           <!-- icon -->
                           <i class="flaticon-classroom-1 text-primary"></i>
                        </div>
                        <h3>Giáo viên có trình độ</h3>
                        <p>Etiam rhoncus leo a dolor placerat, nec elem entum ipsum convall.</p>
                     </div>
                     <!-- /feature-with-icon-->
                     <!-- feature -->
                     <div class="feature-with-icon mt-5">
                        <div class="icon-features">
                           <!-- icon -->
                           <i class="flaticon-baby-boy text-primary"></i>
                        </div>
                        <h3>Quan tâm trẻ sơ sinh</h3>
                        <p>Etiam rhoncus leo a dolor placerat, nec elem entum ipsum convall.</p>
                     </div>
                     <!-- /feature-with-icon-->
                  </div>
                  <!-- /col-l -->
               </div>
               <!-- /row-->
            </div>
            <!-- /col-l -->
            <div class="col-lg-6 features-bg">
               <!-- image -->
               <img src="{{asset('public/frontend/img/features.png')}}" alt="" class="img-fluid"  data-aos="zoom-out"   data-aos-delay="300"/>
            </div>
            <!-- /col-l -->
         </div>
         <!-- /row -->
      </div>
      <!-- /container -->
   </section>
   <!-- /section ends -->
   <!-- section -->
   <section id="services-home" class="container-fluid">
      <div class="container pb-5">
         <!-- section heading -->  
         <div class="section-heading text-center">
            <h2>Dịch vụ của chúng tôi</h2>
            <p class="subtitle">Những gì chúng tôi cung cấp</p>
         </div>
         <!-- /section heading -->
         <!-- row -->
         <div class="row vertical-tabs">
            <div class="col-lg-12">
               <!-- navigation -->
               <div class="tabs-with-icon">
                  <nav>
                     <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1"><i class="flaticon-abc-block"></i>Nhà trẻ</a>
                        <a class="nav-item nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" ><i class="flaticon-kids-1"></i>Trại hè</a>
                        <a class="nav-item nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" ><i class="flaticon-smiling-baby"></i>Quan tâm trẻ</a>
                        <a class="nav-item nav-link" id="tab4-tab" data-toggle="tab" href="#tab4"><i class="flaticon-blackboard"></i>Các lớp học</a>
                        <a class="nav-item nav-link" id="tab5-tab" data-toggle="tab" href="#tab5" ><i class="flaticon-kids"></i>Các hoạt động</a>
                     </div>
                  </nav>
                  <!-- tab-content -->
                  <div class="tab-content block-padding bg-light" id="nav-tabContent">
                     <div class="tab-pane active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                        <!-- row -->
                        <div class="row">
                           <div class="col-lg-6">
                              <!-- image -->
                              <img src="{{asset('public/frontend/img/services/service1.jpg')}}" alt="" class="rounded img-fluid">
                              <!-- ornament starts-->
                              <div class="ornament-rainbow" data-aos="fade-right"></div>
                           </div>
                           <!-- col-lg -->
                           <div class="col-lg-6">
                              <h3>Nhà trẻ</h3>
                              <p>Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                              <ul class="custom pl-0">
                                 <li>Hơn 30 chuyên gia đủ điều kiện</li>
                                 <li>Cung cấp cho bạn các dịch vụ chất lượng</li>
                                 <li>Hoạt động kế hoạch hàng ngày của chúng tôi</li>
                              </ul>
                              <!-- Button -->	 
                              <a href="#" class="btn btn-secondary mt-4">Xem chi tiết</a>
                           </div>
                           <!-- /col-lg -->
                        </div>
                        <!-- row -->
                     </div>
                     <!-- ./Tab-pane -->
                     <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                        <div class="row">
                           <div class="col-lg-6">
                              <h3>Trại hè</h3>
                              <p>Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                              <ul class="custom pl-0">
                                 <li>Hơn 30 chuyên gia đủ điều kiện</li>
                                 <li>Cung cấp cho bạn các dịch vụ chất lượng</li>
                                 <li>Hoạt động kế hoạch hàng ngày của chúng tôi</li>
                              </ul>
                              <!-- Button -->	 
                              <a href="#" class="btn btn-secondary mt-4">Xem chi tiết</a>
                           </div>
                           <!-- /col-lg -->
                           <div class="col-lg-6 res-margin">
                              <!-- image -->
                              <img src="{{asset('public/frontend/img/services/service2.jpg')}}" alt="" class="rounded img-fluid">
                              <!-- ornament starts-->
                              <div class="ornament-stars" data-aos="fade-right"></div>
                           </div>
                           <!-- col-lg -->
                        </div>
                        <!-- row -->
                     </div>
                     <!-- ./Tab-pane -->
                     <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                        <div class="row">
                           <div class="col-lg-6">
                              <!-- image -->
                              <img src="{{asset('public/frontend/img/services/service3.jpg')}}" alt="" class="rounded img-fluid">
                              <!-- ornament starts-->
                              <div class="ornament-bubbles" data-aos="fade-right"></div>
                           </div>
                           <!-- col-lg -->
                           <div class="col-lg-6">
                              <h3>Quan tâm trẻ</h3>
                              <p>Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                              <ul class="custom pl-0">
                                 <li>Hơn 30 chuyên gia đủ điều kiện</li>
                                 <li>Cung cấp cho bạn các dịch vụ chất lượng</li>
                                 <li>Hoạt động kế hoạch hàng ngày của chúng tôi</li>
                              </ul>
                              <!-- Button -->	 
                              <a href="#" class="btn btn-secondary mt-4">Xem chi tiết</a>
                           </div>
                           <!-- /col-lg -->
                        </div>
                        <!-- row -->
                     </div>
                     <!-- ./Tab-pane -->
                     <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                        <div class="row">
                           <div class="col-lg-6">
                              <h3>Các lớp học</h3>
                              <p>Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                              <ul class="custom pl-0">
                                 <li>Hơn 30 chuyên gia đủ điều kiện</li>
                                 <li>Cung cấp cho bạn các dịch vụ chất lượng</li>
                                 <li>Hoạt động kế hoạch hàng ngày của chúng tôi</li>
                              </ul>
                              <!-- Button -->	 
                              <a href="#" class="btn btn-secondary mt-4">Xem chi tiết</a>
                           </div>
                           <!-- /col-lg -->
                           <div class="col-lg-6 res-margin">
                              <!-- image -->
                              <img src="{{asset('img/services/service4.jpg')}}" alt="" class="rounded img-fluid">
                              <!-- ornament starts-->
                              <div class="ornament-stars" data-aos="fade-right"></div>
                           </div>
                           <!-- col-lg -->
                        </div>
                        <!-- row -->
                     </div>
                     <!-- ./Tab-pane -->
                     <div class="tab-pane" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
                        <div class="row">
                           <div class="col-lg-6">
                              <!-- image -->
                              <img src="{{asset('public/frontend/img/services/service5.jpg')}}" alt="" class="rounded img-fluid">
                              <!-- ornament starts-->
                              <div class="ornament-rainbow" data-aos="fade-right"></div>
                           </div>
                           <!-- col-lg -->
                           <div class="col-lg-6">
                              <h3>Các hoạt động</h3>
                              <p>Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                              <ul class="custom pl-0">
                                 <li>Over 30 Qualified professionals</li>
                                 <li>We offer you our quality services since 2002</li>
                                 <li>Educational activities in our daily plan</li>
                              </ul>
                              <!-- Button -->	 
                              <a href="#" class="btn btn-secondary mt-4">Xem chi tiết</a>
                           </div>
                           <!-- /col-lg -->
                        </div>
                        <!-- row -->
                     </div>
                     <!-- ./Tab-pane -->
                  </div>
                  <!-- ./Tab-content -->
               </div>
               <!-- vertical-tabs -->
            </div>
            <!-- /col-lg-6 -->
         </div>
         <!-- /row --> 
      </div>
      <!-- /container -->
   </section>
   <!-- /section ends -->
   <!-- Section  -->
   <section id="counter-section" class="container-fluid counter-calltoaction bg-fixed overlay"  data-100-bottom="background-position: 50% 100px;"
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
<!-- /section ends--><!-- section-->
<section id="team-home" class="container">
   <!-- section heading -->  
   <div class="section-heading text-center">
      <h2>Đội ngũ của chúng tôi</h2>
      <p class="subtitle">Chuyên gia đủ điều kiện</p>
   </div>
   <!-- /section-heading -->  
   <div class="row">
      <div class="col-lg-7">
         <h3>Gặp gỡ đội ngũ tài năng</h3>
         <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
         <ul class="checkmark pl-0 font-weight-bold">
            <li>Hơn 30 chuyên gia đủ điều kiện</li>
            <li>Chúng tôi cung cấp cho bạn các dịch vụ chất lượng từ năm 2002</li>
            <li>Các hoạt động vui chơi và giáo dục trong kế hoạch hàng ngày của chúng tôi</li>
         </ul>
         <!-- /ul-->
      </div>
      <!-- /col-lg-->
      <div class="col-lg-5 res-margin">
         <img src="{{asset('public/frontend/img/team/team-home.jpg')}}" alt="" class="img-fluid blob2">
         <!-- ornament starts-->
         <div class="ornament-stars" data-aos="fade-down"></div>
      </div>
      <!-- /col-lg-->
      <div class="col-lg-12">
         <!-- team carousel -->  
         <div class="carousel-4items owl-carousel owl-theme mt-5">
            <!-- Team member 1 -->
            <div class="col-md-12 team-style1 notepad">
               <div class="team_img">
                  <a href="?page=doingu-view">
                     <img src="{{asset('public/frontend/img/team/team1.jpg')}}" class="img-fluid" alt="">
                  </a>
                  <!-- social icons -->
                  <ul class="social">
                     <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                     <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
               </div>
               <!-- /team_img -->
               <div class="team-content">
                  <a href="?page=doingu-view">
                     <h4 class="title">Laura Smith</h4>
                  </a>
                  <span class="post">Giáo viên</span>
                  <p>Id fermentum augue, ut pellen tesque leo nas. Maecenas at arcu risus Donec com modo.</p>
               </div>
               <!-- /team-content -->
            </div>
            <!-- /team-style1 -->
            <!-- Team member 2 -->
            <div class="col-md-12 team-style1 notepad">
               <div class="team_img">
                  <a href="?page=doingu-view">
                     <img src="{{asset('public/frontend/img/team/team2.jpg')}}" class="img-fluid" alt="">
                  </a>
                  <!-- social icons -->
                  <ul class="social">
                     <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                     <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
               </div>
               <!-- /team_img -->
               <div class="team-content">
                  <a href="?page=doingu-view">
                     <h4 class="title">John Doe</h4>
                  </a>
                  <span class="post">Người quản lý</span>
                  <p>Id fermentum augue, ut pellen tesque leo nas. Maecenas at arcu risus Donec com modo.</p>
               </div>
               <!-- /team-content -->
            </div>
            <!-- /team-style1 -->
            <!-- Team member 3 -->
            <div class="col-md-12 team-style1 notepad">
               <div class="team_img">
                  <a href="?page=doingu-view">
                     <img src="{{asset('public/frontend/img/team/team3.jpg')}}" class="img-fluid" alt="">
                  </a>
                  <!-- social icons -->
                  <ul class="social">
                     <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                     <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
               </div>
               <!-- /team_img -->
               <div class="team-content">
                  <a href="?page=doingu-view">
                     <h4 class="title">Meghan Smith</h4>
                  </a>
                  <span class="post">Giáo viên</span>
                  <p>Id fermentum augue, ut pellen tesque leo nas. Maecenas at arcu risus Donec com modo.</p>
               </div>
               <!-- /team-content -->
            </div>
            <!-- /team-style1 -->
            <!-- Team member 4 -->
            <div class="col-md-12 team-style1 notepad">
               <div class="team_img">
                  <a href="?page=doingu-view">
                     <img src="{{asset('public/frontend/img/team/team4.jpg')}}" class="img-fluid" alt="">
                  </a>
                  <!-- social icons -->
                  <ul class="social">
                     <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                     <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
               </div>
               <!-- /team_img -->
               <div class="team-content">
                  <a href="?page=doingu-view">
                     <h4 class="title">Mika Doe</h4>
                  </a>
                  <span class="post">Giáo viên</span>
                  <p>Id fermentum augue, ut pellen tesque leo nas. Maecenas at arcu risus Donec com modo.</p>
               </div>
               <!-- /team-content -->
            </div>
            <!-- /team-style1 -->
            <!-- Team member 5 -->
            <div class="col-md-12 team-style1 notepad">
               <div class="team_img">
                  <a href="?page=doingu-view">
                     <img src="{{asset('public/frontend/img/team/team5.jpg')}}" class="img-fluid" alt="">
                  </a>
                  <!-- social icons -->
                  <ul class="social">
                     <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                     <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
               </div>
               <!-- /team_img -->
               <div class="team-content">
                  <a href="?page=doingu-view">
                     <h4 class="title">Jillian Smith</h4>
                  </a>
                  <span class="post">Giáo viên</span>
                  <p>Id fermentum augue, ut pellen tesque leo nas. Maecenas at arcu risus Donec com modo.</p>
               </div>
               <!-- /team-content -->
            </div>
            <!-- /team-style1 -->
         </div>
         <!-- /owl-team--> 
      </div>
      <!-- /col-lg-->
   </div>
   <!-- /row-->
</section>
<!-- /section ends-->
<!-- section --> 
<section id="gallery-home" class="container-fluid bg-tertiary no-bg-sm">
   <div class="container">
      <!-- section heading -->  
      <div class="section-heading text-center text-light">
         <h2>Thư viện</h2>
         <p class="subtitle">Các cơ sở của chúng tôi</p>
      </div>
      <!-- /section-heading -->
      <!-- centered Gallery navigation -->
      <ul class="nav nav-pills category-isotope center-nav">
         <li class="nav-item">
            <a class="nav-link active" href="#" data-toggle="tab" data-filter="*">Tất cả</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="tab" data-filter=".school">Trường học</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="tab" data-filter=".activities">Các hoạt động</a>
         </li>
      </ul>
      <!-- /ul -->
      <!-- Gallery -->
      <div id="gallery-isotope" class="row mt-5 magnific-popup">
         <!-- Image 1 -->
         <div class="col-sm-6 col-md-6 col-lg-4 activities">
            <div class="portfolio-item">
               <div class="gallery-thumb">
                  <img class="img-fluid " src="{{asset('public/frontend/img/gallery/gallery1.jpg')}}" alt="">
                  <span class="overlay-mask"></span>
                  <a href="{{asset('public/frontend/img/gallery/gallery1.jpg')}}" class="link centered" title="You can add caption to pictures.">
                     <i class="fa fa-expand"></i></a>
                  </div>
               </div>
            </div>
            <!-- Image 2 -->
            <div class="col-sm-6 col-md-6 col-lg-4 school">
               <div class="portfolio-item">
                  <div class="gallery-thumb">
                     <img class="img-fluid " src="{{asset('public/frontend/img/gallery/gallery2.jpg')}}" alt="">
                     <span class="overlay-mask"></span>
                     <a href="img/gallery/gallery2.jpg" class="link centered" title="You can add caption to pictures.">
                        <i class="fa fa-expand"></i></a>
                     </div>
                  </div>
               </div>
               <!-- Image 3 -->
               <div class="col-sm-6 col-md-6 col-lg-4 school">
                  <div class="portfolio-item">
                     <div class="gallery-thumb">
                        <img class="img-fluid " src="{{asset('public/frontend/img/gallery/gallery3.jpg')}}" alt="">
                        <span class="overlay-mask"></span>
                        <a href="{{asset('public/frontend/img/gallery/gallery3.jpg')}}" class="link centered" title="You can add caption to pictures.">
                           <i class="fa fa-expand"></i></a>
                        </div>
                     </div>
                  </div>
                  <!-- Image 4 -->
                  <div class="col-sm-6 col-md-6 col-lg-4 activities">
                     <div class="portfolio-item">
                        <div class="gallery-thumb">
                           <img class="img-fluid " src="{{asset('public/frontend/img/gallery/gallery4.jpg')}}" alt="">
                           <span class="overlay-mask"></span>
                           <a href="{{asset('public/frontend/img/gallery/gallery4.jpg')}}" class="link centered" title="You can add caption to pictures.">
                              <i class="fa fa-expand"></i></a>
                           </div>
                        </div>
                     </div>
                     <!-- Image 5 -->
                     <div class="col-sm-6 col-md-6 col-lg-4 school">
                        <div class="portfolio-item">
                           <div class="gallery-thumb">
                              <img class="img-fluid " src="{{asset('img/gallery/gallery5.jpg')}}" alt="">
                              <span class="overlay-mask"></span>
                              <a href="{{asset('public/frontend/img/gallery/gallery5.jpg')}}" class="link centered" title="You can add caption to pictures.">
                                 <i class="fa fa-expand"></i></a>
                              </div>
                           </div>
                        </div>
                        <!-- Image 6 -->
                        <div class="col-sm-6 col-md-6 col-lg-4 school">
                           <div class="portfolio-item">
                              <div class="gallery-thumb">
                                 <img class="img-fluid " src="{{asset('public/frontend/img/gallery/gallery6.jpg')}}" alt="">
                                 <span class="overlay-mask"></span>
                                 <a href="{{asset('public/frontend/img/gallery/gallery6.jpg')}}" class="link centered" title="You can add caption to pictures.">
                                    <i class="fa fa-expand"></i></a>
                                 </div>
                              </div>
                           </div>
                           <!-- Image 7 -->
                           <div class="col-sm-6 col-md-6 col-lg-4 activities">
                              <div class="portfolio-item">
                                 <div class="gallery-thumb">
                                    <img class="img-fluid " src="{{asset('public/frontend/img/gallery/gallery7.jpg')}}" alt="">
                                    <span class="overlay-mask"></span>
                                    <a href="{{asset('public/frontend/img/gallery/gallery7.jpg')}}" class="link centered" title="You can add caption to pictures.">
                                       <i class="fa fa-expand"></i></a>
                                    </div>
                                 </div>
                              </div>
                              <!-- Image 8 -->
                              <div class="col-sm-6 col-md-6 col-lg-4 activities">
                                 <div class="portfolio-item">
                                    <div class="gallery-thumb">
                                       <img class="img-fluid " src="{{asset('public/frontend/img/gallery/gallery8.jpg')}}" alt="">
                                       <span class="overlay-mask"></span>
                                       <a href="{{asset('public/frontend/img/gallery/gallery8.jpg')}}" class="link centered" title="You can add caption to pictures.">
                                          <i class="fa fa-expand"></i></a>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Image 9 -->
                                 <div class="col-sm-6 col-md-6 col-lg-4 school">
                                    <div class="portfolio-item">
                                       <div class="gallery-thumb">
                                          <img class="img-fluid " src="{{asset('public/frontend/img/gallery/gallery9.jpg')}}" alt="">
                                          <span class="overlay-mask"></span>
                                          <a href="{{asset('public/frontend/img/gallery/gallery9.jpg')}}" class="link centered" title="You can add caption to pictures.">
                                             <i class="fa fa-expand"></i></a>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- Image 10 -->
                                    <div class="col-sm-6 col-md-6 col-lg-4 school">
                                       <div class="portfolio-item">
                                          <div class="gallery-thumb">
                                             <img class="img-fluid " src="{{asset('public/frontend/img/gallery/gallery10.jpg')}}" alt="">
                                             <span class="overlay-mask"></span>
                                             <a href="{{asset('public/frontend/img/gallery/gallery10.jpg')}}" class="link centered" title="You can add caption to pictures.">
                                                <i class="fa fa-expand"></i></a>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- Image 11 -->
                                       <div class="col-sm-6 col-md-6 col-lg-4 school">
                                          <div class="portfolio-item">
                                             <div class="gallery-thumb">
                                                <img class="img-fluid " src="{{asset('public/frontend/img/gallery/gallery11.jpg')}}" alt="">
                                                <span class="overlay-mask"></span>
                                                <a href="{{asset('public/frontend/img/gallery/gallery11.jpg')}}" class="link centered" title="You can add caption to pictures.">
                                                   <i class="fa fa-expand"></i></a>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Image 12 -->
                                          <div class="col-sm-6 col-md-6 col-lg-4 school">
                                             <div class="portfolio-item">
                                                <div class="gallery-thumb">
                                                   <img class="img-fluid " src="{{asset('public/frontend/img/gallery/gallery12.jpg')}}" alt="">
                                                   <span class="overlay-mask"></span>
                                                   <a href="{{asset('public/frontend/img/gallery/gallery12.jpg')}}" class="link centered" title="You can add caption to pictures.">
                                                      <i class="fa fa-expand"></i></a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- /gallery-isotope-->	   
                                       </div>
                                       <!-- /container-->
                                    </section>
                                    <!-- /section ends -->
                                    <!-- section -->
                                    <section id="blogprev-home" data-100-bottom="background-position: 0% 120%;"
                                    data-top-bottom="background-position: 0% 100%;">
                                    <div class="container">
                                       <!-- section heading -->  
                                       <div class="section-heading text-center">
                                          <h2>Blog mới nhất</h2>
                                          <p class="subtitle">Cập nhật của chúng tôi</p>
                                       </div>
                                       <!-- /section-heading -->
                                       <!-- blog carousel -->
                                       <div class="carousel-3items owl-carousel owl-theme mt-0">
                                          <!-- blog-box -->
                                          <div class="blog-box">
                                             <!-- image -->
                                             <a href="?page=tintuc-view">
                                                <div class="image"><img src="{{asset('public/frontend/img/blog/blogstyle2-1.jpg')}}" alt=""/></div>
                                             </a>
                                             <!-- blog-box-caption -->
                                             <div class="blog-box-caption">
                                                <!-- date -->
                                                <div class="date"><span class="day">13</span><span class="month">Tháng 6</span></div>
                                                <a href="?page=tintuc-view">
                                                   <h3>Các bài học kỹ năng sống phù hợp với trẻ</h3>
                                                </a>
                                                <!-- /link -->
                                                <p>
                                                   Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis...
                                                </p>
                                             </div>
                                             <!-- blog-box-footer -->
                                             <div class="blog-box-footer">
                                                <div class="comments"><i class="fas fa-eye"></i>Lượt xem: 2022</div>
                                                <!-- Button -->    
                                                <div class="text-center col-md-12">
                                                   <a href="?page=tintuc-view" class="btn btn-primary">Xem thêm</a>
                                                </div>
                                             </div>
                                             <!-- /blog-box-footer -->
                                          </div>
                                          <!-- /blog-box -->
                                          <!-- blog-box -->
                                          <div class="blog-box">
                                             <!-- image -->
                                             <a href="?page=tintuc-view">
                                                <div class="image"><img src="{{asset('public/frontend/img/blog/blogstyle2-2.jpg')}}" alt=""/></div>
                                             </a>
                                             <!-- blog-box-caption -->
                                             <div class="blog-box-caption">
                                                <!-- date -->
                                                <div class="date"><span class="day">13</span><span class="month">Tháng 6</span></div>
                                                <a href="?page=tintuc-view">
                                                   <h3>Đổ lỗi 'con hư, béo phì do học online'</h3>
                                                </a>
                                                <!-- /link -->
                                                <p>
                                                   Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis...
                                                </p>
                                             </div>
                                             <!-- blog-box-footer -->
                                             <div class="blog-box-footer">
                                                <div class="comments"><i class="fas fa-eye"></i>Lượt xem: 2022</div>
                                                <!-- Button -->    
                                                <div class="text-center col-md-12">
                                                   <a href="?page=tintuc-view" class="btn btn-primary">Xem thêm</a>
                                                </div>
                                             </div>
                                             <!-- /blog-box-footer -->
                                          </div>
                                          <!-- /blog-box -->
                                          <!-- blog-box -->
                                          <div class="blog-box">
                                             <!-- image -->
                                             <a href="?page=tintuc-view">
                                                <div class="image"><img src="{{asset('public/frontend/img/blog/blogstyle2-3.jpg')}}" alt=""/></div>
                                             </a>
                                             <!-- blog-box-caption -->
                                             <div class="blog-box-caption">
                                                <!-- date -->
                                                <div class="date"><span class="day">13</span><span class="month">Tháng 6</span></div>
                                                <a href="?page=tintuc-view">
                                                   <h3>Những đứa trẻ mầm non khát học từng ngày</h3>
                                                </a>
                                                <!-- /link -->
                                                <p>
                                                   Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis...
                                                </p>
                                             </div>
                                             <!-- blog-box-footer -->
                                             <div class="blog-box-footer">
                                                <div class="comments"><i class="fas fa-eye"></i>Lượt xem: 2022</div>
                                                <!-- Button -->    
                                                <div class="text-center col-md-12">
                                                   <a href="?page=tintuc-view" class="btn btn-primary">Xem thêm</a>
                                                </div>
                                             </div>
                                             <!-- /blog-box-footer -->
                                          </div>
                                          <!-- /blog-box -->
                                          <!-- blog-box -->
                                          <div class="blog-box">
                                             <!-- image -->
                                             <a href="?page=tintuc-view">
                                                <div class="image"><img src="{{asset('public/frontend/img/blog/blogstyle2-4.jpg')}}" alt=""/></div>
                                             </a>
                                             <!-- blog-box-caption -->
                                             <div class="blog-box-caption">
                                                <!-- date -->
                                                <div class="date"><span class="day">13</span><span class="month">Tháng 6</span></div>
                                                <a href="?page=tintuc-view">
                                                   <h3>Kế hoạch tuyển sinh đầu cấp tại TP HCM</h3>
                                                </a>
                                                <!-- /link -->
                                                <p>
                                                   Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis...
                                                </p>
                                             </div>
                                             <!-- blog-box-footer -->
                                             <div class="blog-box-footer">
                                                <div class="comments"><i class="fas fa-eye"></i>Lượt xem: 2022</div>
                                                <!-- Button -->    
                                                <div class="text-center col-md-12">
                                                   <a href="?page=tintuc-view" class="btn btn-primary">Xem thêm</a>
                                                </div>
                                             </div>
                                             <!-- /blog-box-footer -->
                                          </div>
                                          <!-- /blog-box -->
                                       </div>
                                       <!-- /owl-carousel -->
                                    </div>
                                    <!-- /container -->
                                 </section>
                                 <!-- /section ends-->
                              </div>
@endsection