<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>ABC Tots - Giáo dục, trường học, mẫu giáo, mầm non, trường công, trường quốc tế, trường dân lập...</title>
  <meta name='keywords' content='ABC Tots - Giáo dục, trường học, mẫu giáo, mầm non, trường công, trường quốc tế, trường dân lập...'/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <!-- Font files -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700%7CNunito:400,700,900" rel="stylesheet">
  <link href="{{asset('public/frontend/fonts/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('public/frontend/fonts/fontawesome/fontawesome-all.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Fav icons -->
  <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- style CSS -->
  <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('public/frontend/css/jquery.mmenu.all.css')}}" rel="stylesheet" type="text/css"/>
  <!-- plugins CSS -->
  <link href="{{asset('public/frontend/css/plugins.css')}}" rel="stylesheet">
  <!-- Colors CSS -->
  <link href="{{asset('public/frontend/styles/maincolors.css')}}" rel="stylesheet">
  <!-- LayerSlider CSS -->
  <link rel="stylesheet" href="{{asset('public/frontend/vendor/layerslider/css/layerslider.css')}}">
  <script type="text/javascript" src="{{asset('public/frontend/js/jquery.mmenu.all.js')}}"></script>
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body id="top">
  <nav id="main-nav" class="navbar-expand-xl fixed-top">
    <div class="row">
       <!-- Start Top Bar -->
       <div class="container-fluid top-bar" >
          <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <!-- Start Contact Info -->
                   <ul class="contact-details float-left">
                      <li><i class="fa fa-map-marker"></i>344 Huỳnh Tấn Phát, Tân Thuận Tây, Quận 7, HCM</li>
                      <li><i class="fa fa-envelope"></i><a href="mailto:admin@demo.web30s.vn">admin@demo.web30s.vn</a></li>
                      <li><i class="fa fa-phone"></i>1900 9477</li>
                   </ul>
                   <!-- End Contact Info -->
                   <!-- Start Social Links -->
                   <ul class="social-list float-right list-inline">
                      <li class="list-inline-item"><a title="Facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                      <li class="list-inline-item"><a title="Twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                      <li class="list-inline-item"><a  title="Instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                      <li class="list-inline-item"><a href="#" title="Tiếng Việt"><img src="{{asset('public/frontend/img/vn.png')}}" alt="Tiếng Việt"></a></li>
                      <li class="list-inline-item"><a href="#" title="American"><img src="{{asset('public/frontend/img/eng.png')}}" alt="American"></a></li>
                   </ul>
                   <!-- /End Social Links -->
                </div>
                <!-- col-md-12 -->
             </div>
             <!-- /row -->
          </div>
          <!-- /container -->
       </div>
       <!-- End Top bar -->
       <!-- Navbar Starts -->
       <div class="navbar container-fluid">
          <div class="container ">
             <!-- logo -->
             <a class="nav-brand" href="{{URL::to('/')}}">
                <img src="{{asset('public/frontend/img/logo.png')}}" alt="" class="img-fluid">
             </a>
             <div class="mobile-menu-area">
              <div class="pagewrap">
                <div id="content_menu_mobile">
                  <div class="header_mid_mobile flex">
                    <div class="header_menu_mobile">
                      <a href="#menu" class="menu-bar" aria-role="button"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav id="menu">
                     
                     <a href="#" class="menu-bar" aria-role="button"><i class="fa fa-times"></i></a>
                     @if ($menu_tab)
                     @foreach($menu_tab as $tab)
                     @if ($tab->type == 0)
                      <p class="dropdown-btn single">
                        <a href="{{URL::to('/')}}">Trang chủ</a> 
                      </p>
                     @elseif ($tab->type == 7)
                      <p class="dropdown-btn single">
                        <a href="{{URL::to('/gioi-thieu')}}">Giới thiệu</a> 
                      </p>
                     @elseif ($tab->type == 11)
                      <p class="dropdown-btn single">
                        <a href="{{URL::to('/lien-he')}}">Liên hệ</a>
                      </p>
                     @else
                      <p class="dropdown-btn">
                        <a href="{{URL::to('/'.$tab->seo_name)}}">{{$tab->name}}</a>
                        <a class="icon"><i class="fa fa-caret-down"></i></a>
                      </p> 
                     
                        @if($tab->type == 6)
                           <div class="dropdown-container">
                           @foreach($menu_product as $product_cate)
                              @if($product_cate->level == 1)
                                 
                                    <p class="dropdown-btn">
                                    <a href="{{URL::to('/'.$product_cate->seo_name)}}">{{$product_cate->name}}</a>
                                    
                                    <a class="icon"><i class="fa fa-caret-down"></i></a>
                                    </p>
                                    @php
                                       $count = 0;
                                    @endphp
                                    @if($count == 0)
                                    <div class="dropdown-container">
                                       @php
                                          $count++;
                                       @endphp
                                    @endif
                                    @foreach($menu_product as $product_cate_2)
                                       @if($product_cate_2->parent_id == $product_cate->id)
                                          
                                                <p class="dropdown-btn">
                                                   <a href="{{URL::to('/'.$product_cate_2->seo_name)}}">{{$product_cate_2->name}}</a>
                                                   <a class="icon"><i class="fa fa-caret-down"></i></a>
                                                </p>
                                                @php
                                                   $count2 = 0;
                                                @endphp
                                                @if($count2 == 0)
                                                <div class="dropdown-container">
                                                @php
                                                   $count2++;
                                                @endphp
                                                @endif
                                                @foreach($menu_product as $product_cate_3)
                                                   @if($product_cate_3->parent_id == $product_cate_2->id)
                                                      
                                                      <p class="dropdown-btn single">
                                                         <a href="{{URL::to('/'.$product_cate_3->seo_name)}}">
                                                            {{$product_cate_3->name}}</a>
                                                      </p>
                                                   @endif
                                                @endforeach
                                                @if($count2 != 0)
                                                   </div>
                                                @endif
                                       @endif
                                    @endforeach
                                    @if($count != 0)
                                       </div>
                                    @endif
                                 
                              @endif
                           @endforeach
                           </div> 
                        @endif
                     
                     
                     
                        @if($tab->type == 5)
                           <div class="dropdown-container">
                           @foreach($menu_news as $news_cate)
                              @if($news_cate->level == 1)
                                 
                                    <p class="dropdown-btn">
                                    <a href="{{URL::to('/'.$news_cate->seo_name)}}">{{$news_cate->name}}</a>
                                    
                                    <a class="icon"><i class="fa fa-caret-down"></i></a>
                                    </p>
                                    @php
                                       $count = 0;
                                    @endphp
                                    @if($count == 0)
                                    <div class="dropdown-container">
                                       @php
                                          $count++;
                                       @endphp
                                    @endif
                                    @foreach($menu_news as $news_cate_2)
                                       @if($news_cate_2->parent_id == $news_cate->id)
                                          
                                                <p class="dropdown-btn">
                                                   <a href="{{URL::to('/'.$news_cate_2->seo_name)}}">{{$news_cate_2->name}}</a>
                                                   <a class="icon"><i class="fa fa-caret-down"></i></a>
                                                </p>
                                                @php
                                                   $count2 = 0;
                                                @endphp
                                                @if($count2 == 0)
                                                <div class="dropdown-container">
                                                @php
                                                   $count2++;
                                                @endphp
                                                @endif
                                                @foreach($menu_news as $news_cate_3)
                                                   @if($news_cate_3->parent_id == $news_cate_2->id)

                                                      <p class="dropdown-btn single">
                                                         <a href="{{URL::to('/'.$news_cate_3->seo_name)}}">
                                                            {{$news_cate_3->name}}</a>
                                                      </p>
                                                   @endif
                                                @endforeach
                                                @if($count2 != 0)
                                                   </div>
                                                @endif
                                       @endif
                                    @endforeach
                                    @if($count != 0)
                                       </div>
                                    @endif
                                 
                              @endif
                           @endforeach
                           </div>
                        @endif

                        @if($tab->type == 10)
                           <div class="dropdown-container">
                           @foreach($menu_albums as $albums_cate)
                              @if($albums_cate->level == 1)
                                 
                                    <p class="dropdown-btn">
                                    <a href="{{URL::to('/'.$albums_cate->seo_name)}}">{{$albums_cate->name}}</a>
                                    
                                    <a class="icon"><i class="fa fa-caret-down"></i></a>
                                    </p>
                                    @php
                                       $count = 0;
                                    @endphp
                                    @if($count == 0)
                                    <div class="dropdown-container">
                                       @php
                                          $count++;
                                       @endphp
                                    @endif
                                    @foreach($menu_albums as $albums_cate_2)
                                       @if($albums_cate_2->parent_id == $albums_cate->id)
                                          
                                                <p class="dropdown-btn">
                                                   <a href="{{URL::to('/'.$albums_cate_2->seo_name)}}">{{$albums_cate_2->name}}</a>
                                                   <a class="icon"><i class="fa fa-caret-down"></i></a>
                                                </p>
                                                @php
                                                   $count2 = 0;
                                                @endphp
                                                @if($count2 == 0)
                                                <div class="dropdown-container">
                                                @php
                                                   $count2++;
                                                @endphp
                                                @endif
                                                @foreach($menu_albums as $albums_cate_3)
                                                   @if($albums_cate_3->parent_id == $albums_cate_2->id)
                                                      
                                                      <p class="dropdown-btn single">
                                                         <a href="{{URL::to('/'.$albums_cate_3->seo_name)}}">
                                                            {{$albums_cate_3->name}}</a>
                                                      </p>
                                                   @endif
                                                @endforeach
                                                @if($count2 != 0)
                                                   </div>
                                                @endif
                                       @endif
                                    @endforeach
                                    @if($count != 0)
                                       </div>
                                    @endif
                                 
                              @endif
                           @endforeach
                           </div>
                        @endif

                        @if($tab->type == 8)
                           <div class="dropdown-container">
                           @foreach($menu_videos as $videos_cate)
                              @if($videos_cate->level == 1)
                                 
                                    <p class="dropdown-btn">
                                    <a href="{{URL::to('/'.$videos_cate->seo_name)}}">{{$videos_cate->name}}</a>
                                    
                                    <a class="icon"><i class="fa fa-caret-down"></i></a>
                                    </p>
                                    @php
                                       $count = 0;
                                    @endphp
                                    @if($count == 0)
                                    <div class="dropdown-container">
                                       @php
                                          $count++;
                                       @endphp
                                    @endif
                                    @foreach($menu_videos as $videos_cate_2)
                                       @if($videos_cate_2->parent_id == $videos_cate->id)
                                          
                                                <p class="dropdown-btn">
                                                   <a href="{{URL::to('/'.$videos_cate_2->seo_name)}}">{{$videos_cate_2->name}}</a>
                                                   <a class="icon"><i class="fa fa-caret-down"></i></a>
                                                </p>
                                                @php
                                                   $count2 = 0;
                                                @endphp
                                                @if($count2 == 0)
                                                <div class="dropdown-container">
                                                @php
                                                   $count2++;
                                                @endphp
                                                @endif
                                                @foreach($menu_videos as $videos_cate_3)
                                                   @if($videos_cate_3->parent_id == $videos_cate_2->id)
                                                      
                                                      <p class="dropdown-btn single">
                                                         <a href="{{URL::to('/'.$videos_cate_3->seo_name)}}">
                                                            {{$videos_cate_3->name}}</a>
                                                      </p>
                                                   @endif
                                                @endforeach
                                                @if($count2 != 0)
                                                   </div>
                                                @endif
                                       @endif
                                    @endforeach
                                    @if($count != 0)
                                       </div>
                                    @endif
                                 
                              @endif
                           @endforeach
                           </div>
                        @endif
                     
                     
                     
                     @endif
                     @endforeach
                     @endif
                      <!---->
                      <!-- <p class="dropdown-btn single">
                        <a href="#">Đội ngũ</a>
                      </p> -->
            
                      <!---->

                      {{-- <p class="dropdown-btn">
                        <a href="?page=tintuc">Tin tức</a>
                        <a class="icon"><i class="fa fa-caret-down"></i></a>
                      </p>
                      <div class="dropdown-container">
                        <p class="dropdown-btn single">
                          <a href="?page=tintuc">Tin tức trường học</a>
                        </p>
                        <p class="dropdown-btn single">
                          <a href="?page=tintuc">Tin khuyến mãi</a>
                        </p>
                      </div> --}}
            
                      <!---->
                      <!-- <p class="dropdown-btn">
                        <a href="#" title="Thư viện">Thư viện</a>
                        <a class="icon"><i class="fa fa-caret-down"></i></a>
                      </p> -->
                      <!-- <div class="dropdown-container">
                        <p class="dropdown-btn single">
                          <a href="?page=hinhanh" title="Thư viện hình ảnh">Thư viện hình ảnh</a>
                        </p>
                        <p class="dropdown-btn single">
                          <a href="?page=video" title="Thư viện video">Thư viện video</a>
                        </p>
                      </div> -->
                      <!---->
                      
                    </nav>
                  </div>
                </div>
              </div>
            </div>
             <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto" style="-webkit-flex-wrap: wrap;">
                  {{-- <li class="nav-item">
                     <a class="nav-link" href="{{URL::to('/')}}">Trang chủ
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{URL::to('/gioi-thieu')}}">Giới thiệu
                     </a>
                  </li> --}}
                  @if ($menu_tab)
                  @foreach($menu_tab as $tab)
                   <!-- menu item -->
                     <!-- menu cấp 1 -->
                     @if ($tab->type == 0)
                     <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('/')}}">Trang chủ
                        </a>
                     </li>
                     @elseif ($tab->type == 7)
                     <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('/gioi-thieu')}}">Giới thiệu
                        </a>
                     </li>
                     @elseif ($tab->type == 11)
                     <li class="nav-item">
                        <li class="nav-item">
                           <a class="nav-link" href="{{URL::to('/lien-he')}}">Liên hệ
                           </a>
                        </li>
                     </li>
                     @else
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="{{URL::to('/'.$tab->seo_name)}}">
                              {{$tab->name}}
                           </a>
                           <div class="dropdown-menu dropdown" aria-labelledby="services-dropdown">
                              
                              @if($tab->type == 6)
                              @foreach($menu_product as $product_cate)
                                 @if($product_cate->level == 1)
                                    <div class="menuhover">
                                             <a class="dropdown-item" href="{{URL::to('/'.$product_cate->seo_name)}}">
                                             {{$product_cate->name}} <i class="fas fa-caret-right"></i></a>
                                             <!-- menu cấp 2 -->
                                             {{-- <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown"> --}}
                                                @php
                                                   $count = 0;
                                                @endphp
                                                @foreach($menu_product as $product_cate_2)
                                                   @if($product_cate_2->parent_id == $product_cate->id)
                                                      @if($count == 0)
                                                      <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown" >
                                                         @php
                                                            $count++;
                                                         @endphp
                                                      @endif
                                                      <a class="dropdown-item" href="{{URL::to('/'.$product_cate_2->seo_name)}}">{{$product_cate_2->name}}</a>
                                                      <!-- menu cấp 3 -->
                                                      {{-- <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown"> --}}
                                                         @php
                                                            $count2 = 0;
                                                         @endphp
                                                         @foreach($menu_product as $product_cate_3)
                                                            @if($product_cate_3->parent_id == $product_cate_2->id)
                                                               @if($count2 == 0)
                                                                  <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown">
                                                                  @php
                                                                     $count2++;
                                                                  @endphp
                                                               @endif
                                                            <a class="dropdown-item" href="{{URL::to('/'.$product_cate_3->seo_name)}}">{{$product_cate_3->name}}</a>
                                                            @endif
                                                         @endforeach
                                                      @if($count2 != 0)
                                                         </div>
                                                      @endif
                                                   @endif
                                                @endforeach
                                                @if($count != 0)
                                                   </div>
                                                @endif
                                    </div>
                                 @endif
                              @endforeach
                              @endif


                              @if($tab->type == 5)
                              @foreach($menu_news as $news_cate)
                                 @if($news_cate->level == 1)
                                    <div class="menuhover">
                                             <a class="dropdown-item" href="{{URL::to('/'.$news_cate->seo_name)}}">
                                             {{$news_cate->name}} <i class="fas fa-caret-right"></i></a>
                                             <!-- menu cấp 2 -->
                                             {{-- <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown"> --}}
                                                @php
                                                   $count = 0;
                                                @endphp
                                                @foreach($menu_news as $news_cate_2)
                                                   @if($news_cate_2->parent_id == $news_cate->id)
                                                      @if($count == 0)
                                                      <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown" >
                                                         @php
                                                            $count++;
                                                         @endphp
                                                      @endif
                                                      <a class="dropdown-item" href="{{URL::to('/'.$news_cate_2->seo_name)}}">{{$news_cate_2->name}}</a>
                                                      <!-- menu cấp 3 -->
                                                      {{-- <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown"> --}}
                                                         @php
                                                            $count2 = 0;
                                                         @endphp
                                                         @foreach($menu_news as $news_cate_3)
                                                            @if($news_cate_3->parent_id == $news_cate_2->id)
                                                               @if($count2 == 0)
                                                                     <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown">
                                                                     @php
                                                                        $count2++;
                                                                     @endphp
                                                               @endif
                                                            <a class="dropdown-item" href="{{URL::to('/'.$news_cate_3->seo_name)}}">{{$news_cate_3->name}}</a>
                                                            @endif
                                                         @endforeach
                                                         @if($count2 != 0)
                                                            </div>
                                                         @endif
                                                   @endif
                                                @endforeach
                                                @if($count != 0)
                                                   </div>
                                                @endif
                                    </div>
                                 @endif
                              @endforeach
                              @endif

                              @if($tab->type == 10)
                              @foreach($menu_albums as $albums_cate)
                                 @if($albums_cate->level == 1)
                                    <div class="menuhover">
                                             <a class="dropdown-item" href="{{URL::to('/'.$albums_cate->seo_name)}}">
                                             {{$albums_cate->name}} <i class="fas fa-caret-right"></i></a>
                                             <!-- menu cấp 2 -->
                                             {{-- <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown"> --}}
                                                @php
                                                   $count = 0;
                                                @endphp
                                                @foreach($menu_albums as $albums_cate_2)
                                                   @if($albums_cate_2->parent_id == $albums_cate->id)
                                                      @if($count == 0)
                                                      <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown" >
                                                         @php
                                                            $count++;
                                                         @endphp
                                                      @endif
                                                      <a class="dropdown-item" href="{{URL::to('/'.$albums_cate_2->seo_name)}}">{{$albums_cate_2->name}}</a>
                                                      <!-- menu cấp 3 -->
                                                      {{-- <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown"> --}}
                                                         @php
                                                            $count2 = 0;
                                                         @endphp
                                                         @foreach($menu_albums as $albums_cate_3)
                                                            @if($albums_cate_3->parent_id == $albums_cate_2->id)
                                                            @if($count2 == 0)
                                                               <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown">
                                                               @php
                                                                  $count2++;
                                                               @endphp
                                                            @endif
                                                            <a class="dropdown-item" href="{{URL::to('/'.$albums_cate_3->seo_name)}}">{{$albums_cate_3->name}}</a>
                                                            @endif
                                                         @endforeach
                                                         @if($count2 != 0)
                                                            </div>
                                                         @endif
                                                   @endif
                                                @endforeach
                                                @if($count != 0)
                                                   </div>
                                                @endif
                                    </div>
                                 @endif
                              @endforeach
                              @endif

                              @if($tab->type == 8)
                              @foreach($menu_videos as $videos_cate)
                                 @if($videos_cate->level == 1)
                                    <div class="menuhover">
                                             <a class="dropdown-item" href="{{URL::to('/'.$videos_cate->seo_name)}}">
                                             {{$videos_cate->name}} <i class="fas fa-caret-right"></i></a>
                                             <!-- menu cấp 2 -->
                                             {{-- <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown"> --}}
                                                @php
                                                   $count = 0;
                                                @endphp
                                                @foreach($menu_videos as $videos_cate_2)
                                                   @if($videos_cate_2->parent_id == $videos_cate->id)
                                                   @if($count == 0)
                                                   <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown" >
                                                      @php
                                                         $count++;
                                                      @endphp
                                                   @endif
                                                      <a class="dropdown-item" href="{{URL::to('/'.$videos_cate_2->seo_name)}}">{{$videos_cate_2->name}}</a>
                                                      <!-- menu cấp 3 -->
                                                      {{-- <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown"> --}}
                                                         @php
                                                            $count2 = 0;
                                                         @endphp
                                                         @foreach($menu_videos as $videos_cate_3)
                                                            @if($videos_cate_3->parent_id == $videos_cate_2->id)
                                                               @if($count2 == 0)
                                                                  <div class="dropdown-menu dropdown-menu-a" aria-labelledby="about-dropdown">
                                                                  @php
                                                                     $count2++;
                                                                  @endphp
                                                               @endif
                                                               <a class="dropdown-item" href="{{URL::to('/'.$videos_cate_3->seo_name)}}">{{$videos_cate_3->name}}</a>
                                                            @endif
                                                         @endforeach
                                                         @if($count2 != 0)
                                                            </div>
                                                         @endif
                                                   @endif
                                                @endforeach
                                                @if($count != 0)
                                                   </div>
                                                @endif
                                    </div>
                                 @endif
                              @endforeach
                              @endif
                           </div>
                        </li>
                     @endif
                   
                  @endforeach
                  @endif
                  {{-- <li class="nav-item">
                     <a class="nav-link" href="{{URL::to('/lien-he')}}">Liên hệ
                     </a>
                  </li> --}}
                </ul>
                <!--/ul -->
             </div>
             <!--collapse -->
          </div>
          <!-- /container -->
       </div>
       <!-- /navbar -->
    </div>
    <!--/row -->
 </nav>
  <div class="conten">
    <div id="preloader">
      <div class="container h-100">
         <div class="row h-100 justify-content-center align-items-center">
            <div class="preloader-logo">
               <!-- spinner -->
               <div class="spinner">
                  <div class="dot1"></div>
                  <div class="dot2"></div>
               </div>
            </div>
            <!--/preloader logo -->
         </div>
         <!--/row -->
      </div>
      <!--/container -->
   </div>
    
      @yield('content')
   <div class="clr"></div>
</div>
<!--/ page-wrapper -->
<svg version="1.1" id="footer-divider"  class="secondary" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
viewBox="0 0 1440 126" xml:space="preserve" preserveAspectRatio="none slice">
<path class="st0" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>
<!-- ==== footer ==== -->
<footer class="bg-secondary text-light">
   <div class="container">
      <!-- row -->
      <div class="row">
         <div class="col-lg-4 text-center">
            <!-- logo -->
            <img src="img/logo_light.png"  class="logo-footer img-fluid" alt=""/>
            <h2 style="display:none">Tên công ty</h2>
            <h3 style="display:none">Thông tin</h3>
            <h4 class="mt-3" style="font-size: 1.5em;font-weight: 600;">Theo dõi bản tin của chúng tôi</h4>
            <!-- Mailist Form -->				
            <div id="mc_embed_signup">
               <!-- your mailist address in the line bellow -->
               <form action="//listname.list-manage.com/subscribe/post?u=04e646927a196552aaee78a7b&amp;id=0dae358e08" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll">
                     <div class="mc-field-group">
                        <div class="input-group">
                           <input class="form-control input-lg required email" type="email" value="" name="EMAIL" placeholder="Email của bạn ở đây" id="mce-EMAIL">
                           <span class="input-group-btn">
                              <button class="btn btn-tertiary" type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">Đăng ký</button>
                           </span>
                        </div>
                        <!-- Subscription results -->
                        <div id="mce-responses" class="mailchimp">
                           <div class="alert alert-danger response" id="mce-error-response"></div>
                           <div class="alert alert-success response" id="mce-success-response"></div>
                        </div>
                     </div>
                     <!-- /mc-fiel-group -->									
                  </div>
                  <!-- /mc_embed_signup_scroll -->
               </form>
               <!-- /form ends -->
            </div>
            <!-- /mc_embed_signup -->		  
         </div>
         <!--/ col-lg -->
         <div class="col-lg-4 text-center res-margin">
            <h4 style="font-size: 1.5em;font-weight: 600;">Liên hệ chúng tôi</h4>
            <ul class="list-unstyled mt-3">
               <li class="mb-1"><i class="fas fa-phone margin-icon "></i>1900 9477</li>
               <li class="mb-1"><i class="fas fa-envelope margin-icon"></i><a href="mailto:admin@demo.web30s.vn">admin@demo.web30s.vn</a></li>
               <li><i class="fas fa-map-marker margin-icon"></i>344 Huỳnh Tấn Phát, Tân Thuận Tây, Q.7, HCM</li>
            </ul>
            <!--/ul -->
            <!-- Start Social Links -->
            <ul class="social-list text-center list-inline mt-2">
               <li class="list-inline-item"><a title="Facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
               <li class="list-inline-item"><a title="Twitter" href="#"><i class="fab fa-twitter"></i></a></li>
               <li class="list-inline-item"><a  title="Instagram" href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
            <!-- /End Social Links -->
         </div>
         <!--/ col-lg -->
         <div class="col-lg-4 text-center">
            <h4 style="font-size: 1.5em;font-weight: 600;"> Giờ làm việc </h4>
            <ul class="list-unstyled mt-3">
               <li class="mb-1">Từ Thứ Hai đến Thứ Sáu</li>
               <li class="mb-1"> Mở cửa từ 9 giờ sáng - 6 giờ tối</li>
               <li class="mb-1">Ngày lễ - Đóng cửa</li>
               <li>Cuối tuần - Đã đóng cửa </li>
            </ul>
            <!--/ul -->
         </div>
         <!--/ col-lg -->
      </div>
      <!--/ row-->
      <hr/>
      <div class="row">
         <div class="credits col-sm-12">
            <p>
              <a href="https://web30s.vn/" title="Thiết kế website" target="_blank">Sản phẩm của</a>
              <a href="https://web30s.vn/" target="_blank"><img src="{{asset('public/frontend/img/web30s.png')}}"></a>
              <a href="https://pavietnam.vn/" title="Thiết kế website" target="_blank">Cung cấp bởi P.A Việt Nam</a>
           </p>
        </div>
     </div>
     <!--/row-->
  </div>
  <!--/ container -->
  <!-- Go To Top Link -->
  <div class="page-scroll hidden-sm hidden-xs">
   <a href="#top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
</div>
</footer>
<!-- jequery plugins -->
<!-- Bootstrap core & Jquery -->
<script src="{{asset('public/frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('public/frontend/js/custom.js')}}"></script>
<script src="{{asset('public/frontend/js/plugins.js')}}"></script>
<!-- Prefix free -->
<script src="{{asset('public/frontend/js/prefixfree.min.js')}}"></script>
<!-- number counter script -->
<script src="{{asset('public/frontend/js/counter.js')}}"></script>
<!-- maps -->
<script src="{{asset('public/frontend/js/map.js')}}"></script>
<!-- GreenSock -->
<script src="{{asset('public/frontend/vendor/layerslider/js/greensock.js')}}"></script>
<!-- LayerSlider script files -->
<script src="{{asset('public/frontend/vendor/layerslider/js/layerslider.transitions.js')}}"></script>
<script src="{{asset('public/frontend/vendor/layerslider/js/layerslider.kreaturamedia.jquery.js')}}"></script>
<script src="{{asset('public/frontend/vendor/layerslider/js/layerslider.load.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/jquery.mmenu.all.js')}}"></script>

<script>
  /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;
  
  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
    dropdownContent.style.display = "none";
    } else {
    dropdownContent.style.display = "block";
    }
    });
  }
  </script>
   
   <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
   {!! Toastr::message() !!}
{{-- <script>
   function() {
      ($('#menu_sub').outerWidth() + $('#menu_sub').offset().left) - window.outerWidth;
   }
</script> --}}

</body>
</html>


