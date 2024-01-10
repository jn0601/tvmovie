<!DOCTYPE html>
<html lang="vi">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta name="theme-color" content="#234556">
      <meta http-equiv="Content-Language" content="vi" />
      <meta content="VN" name="geo.region" />
      <meta name="DC.language" scheme="utf-8" content="vi" />
      <meta name="language" content="Việt Nam">
      

      <link rel="shortcut icon" href="https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png" type="image/x-icon" />
      <meta name="revisit-after" content="1 days" />
      <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
      <title>TVMOVIE</title>
      <meta name="description" content="Phim hay - Xem phim hay nhất, xem phim online miễn phí, phim hot , phim nhanh" />
      <link rel="canonical" href="">
      <link rel="next" href="" />
      <meta property="og:locale" content="vi_VN" />
      <meta property="og:title" content="Phim hay 2020 - Xem phim hay nhất" />
      <meta property="og:description" content="Phim hay 2020 - Xem phim hay nhất, phim hay trung quốc, hàn quốc, việt nam, mỹ, hong kong , chiếu rạp" />
      <meta property="og:url" content="" />
      <meta property="og:site_name" content="Phim hay 2021- Xem phim hay nhất" />
      <meta property="og:image" content="" />
      <meta property="og:image:width" content="300" />
      <meta property="og:image:height" content="55" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
     
      <link rel='dns-prefetch' href='//s.w.org' />
      
      <link rel='stylesheet' id='bootstrap-css' href='{{asset('public/frontend/css/bootstrap.min.css?ver=5.7.2')}}' media='all' />
      <link rel='stylesheet' id='style-css' href='{{asset('public/frontend/css/style.css?ver=5.7.2')}}' media='all' />
      <link rel='stylesheet' href='{{asset('public/frontend/css/user-style.css')}}' media='all' />
      <link rel='stylesheet' id='wp-block-library-css' href='{{asset('public/frontend/css/style.min.css?ver=5.7.2')}}' media='all' />
      <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
      <script type='text/javascript' src='{{asset('public/frontend/js/jquery.min.js?ver=5.7.2')}}' id='halim-jquery-js'></script>
      <style type="text/css" id="wp-custom-css">
         .textwidget p a img {
         width: 100%;
         }
      </style>
      <style>#header .site-title {background: url(https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png) no-repeat top left;background-size: contain;text-indent: -9999px;}</style>
   </head>
   <body class="home blog halimthemes halimmovies" data-masonry="">
      <header id="header">
         <div class="container">
            <div class="row" id="headwrap">
               <div class="col-md-2 col-sm-6 slogan">
                  <p class="site-title"><a class="logo" href="{{URL::to('/')}}" title="phim hay ">Phim Hay</p>
                  </a>
               </div>
               <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                  <div class="header-nav">
                     <div class="col-xs-12">
                        {{-- <form id="search-form-pc" name="halimForm" role="search" action="" method="GET"> --}}
                           {!! Form::open(['url'=>'tim-kiem', 'id'=>'search-form-pc', 'name'=>'halimForm',
                           'role'=>'search', 'method'=>'get', 'enctype'=>'multipart/form-data']) !!}
                           <div class="form-group">
                              <div class="input-group col-xs-12">
                                 <input id="search" type="text" name="name" class="form-control" placeholder="Tìm kiếm..." autocomplete="off" required>
                                 <i class="animate-spin hl-spin4 hidden"></i>
                              </div>
                           </div>
                           {!! Form::close() !!}
                        {{-- </form> --}}
                        <ul class="ui-autocomplete ajax-results hidden"></ul>
                     </div>
                  </div>
               </div>
               @php
                  use Illuminate\Support\Facades\Session;
                  $customer_id = Session::get('customer_id');
                  $customer_name = Session::get('customer_name');
                  $balance = Session::get('balance');
               @endphp
               @if ($customer_id)
               <div class="col-md-5 hidden-xs">
                  {{-- <div id="get-bookmark" class="box-shadow"><i class="hl-bookmark"></i><span> Bookmarks</span><span class="count">0</span></div> --}}
                  
                  {{-- <div id="bookmark-list" class="hidden bookmark-list-on-pc">
                     <ul style="margin: 0;"></ul>
                  </div> --}}
                     <div class="box-shadow login-button"><span>Xin chào, </span> {{$customer_name}} | Số dư: {{$balance}}</div>
                     <a href="{{URL::to('logout')}}" class="box-shadow login-button"><span> Đăng xuất</span></a>
               </div>
               @else
               <div class="col-md-4 hidden-xs">
                  {{-- <div id="get-bookmark" class="box-shadow"><i class="hl-bookmark"></i><span> Bookmarks</span><span class="count">0</span></div> --}}
                  
                  {{-- <div id="bookmark-list" class="hidden bookmark-list-on-pc">
                     <ul style="margin: 0;"></ul>
                  </div> --}}
                     <a href="{{route('view_login')}}" class="box-shadow login-button"><span> Đăng nhập</span></a>
                     <a href="{{route('view_signup')}}" class="box-shadow login-button"><span> Đăng ký</span></a>
               </div>
               @endif
            </div>
         </div>
      </header>
      <div class="navbar-container">
         <div class="container">
            <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
                  <span class="sr-only">Menu</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  
                  @if ($customer_id)
                     <a href="{{URL::to('logout')}}" class="box-shadow login-button pull-right mobile-button"><span> Đăng xuất</span></a>
                     <div class="box-shadow login-button collapsed pull-right mobile-button"><span>Xin chào, </span> {{$customer_name}}</div>
                  @else
                     <a href="{{route('view_login')}}" class="box-shadow login-button collapsed pull-right mobile-button"><span> Đăng nhập</span></a>
                     <a href="{{route('view_signup')}}" class="box-shadow login-button collapsed pull-right mobile-button"><span> Đăng ký</span></a>
                  @endif
                  <button type="button" class="navbar-toggle collapsed pull-right expand-search-form mobile-search" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                  <span>Tìm kiếm</span>
                  </button>
                  {{-- <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
                  Bookmarks<i class="hl-bookmark" aria-hidden="true"></i>
                  <span class="count">0</span>
                  </button> --}}
                  {{-- <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
                  <a href="javascript:;" id="expand-ajax-filter" style="color: #ffed4d;">Lọc <i class="fas fa-filter"></i></a>
                  </button> --}}
               </div>
               <div class="collapse navbar-collapse" id="halim">
                  <div class="menu-menu_1-container">
                     <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                        <li class="current-menu-item active"><a title="Trang Chủ" href="{{route('homepage')}}">Trang Chủ</a></li>
                        <li class="mega dropdown">
                           <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể Loại <span class="caret"></span></a>
                           <ul role="menu" class="dropdown-menu ">
                              @foreach($genre as $key => $value)
                              <li class=""><a title="{{$value->name}}" href="{{route('genre', $value->seo_name)}}">{{$value->name}}</a></li>
                              @endforeach
                           </ul>
                        </li>
                        <li class="mega dropdown">
                           <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Quốc Gia <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                              @foreach($country as $key => $value)
                              <li class=""><a title="{{$value->name}}" href="{{route('country', $value->seo_name)}}">{{$value->name}}</a></li>
                              @endforeach
                           </ul>
                        </li>
                        @foreach($category as $key => $value)
                           <li class="mega "><a title="{{$value->name}}" href="{{route('category', $value->seo_name)}}">{{$value->name}}</a></li>
                        @endforeach
                        {{-- <li class="mega dropdown">
                           <a title="Danh Mục Tin Tức" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Danh mục tin tức <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu menu-fixed">
                              @foreach($news_category as $key => $value)
                              <li class="menu-fixed-2"><a title="{{$value->name}}" href="{{route('news_category', $value->seo_name)}}">{{$value->name}}</a></li>
                              @endforeach
                           </ul>
                        </li> --}}
                        
                        {{-- <li class=" news">
                           <div class="subnav">
                           <a title="Danh Mục Tin Tức" href="#" data-toggle="dropdown" class="subnavbtn" aria-haspopup="true">Danh mục tin tức <span class="caret"></span></a>
                           <ul class=" subnav-content">
                              @foreach($news_category as $key => $value)
                                 @if ($value->level == 1)
                                    <li class=" subnav-content-subnav">
                                       <a class="subnavbtn2x" title="{{$value->name}}" href="{{route('news_category', $value->seo_name)}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$value->name}} <span class="caret"></span></a>
                                       <div class=" subnav-content2x">
                                          @foreach($news_category as $key => $value2)
                                             @if ($value2->level == 2 && $value2->parent_id == $value->id)
                                                <a title="{{$value->name}}" href="{{route('news_category', $value2->seo_name)}}">{{$value2->name}}</a>
                                             @endif
                                          @endforeach
                                       </div>
                                    </li>
                                    <li><a title="{{$value->name}}" href="{{route('news_category', $value->seo_name)}}">{{$value->name}}</a></li>
                                 @endif
                              @endforeach
                           </ul>
                        </div>
                        </li> --}}
                        {{-- <li class="news">
                           <div class="subnav">
                             <button class="subnavbtn">First Nav</button>
                             <div class="subnav-content">
                               <a href="#">Some page</a>
                               <a href="#">Some page</a>
                               <a href="#">Some page</a>
                             </div>
                           </div>
                           <div class="subnav">
                             <button class="subnavbtn">Second nav</button>
                             <div class="subnav-content">
                               <div class="subnav-content-subnav">
                                 <button class="subnavbtn2x"><a href ="#">Right first</a></button>
                                 <div class="subnav-content2x">
                                   <a href="#">Right 1</a>
                                   <a href="#">Right 2</a>
                                 </div>
                               </div>
                               <div class="subnav-content-subnav">
                                 <button class="subnavbtn2x"><a href ="#">Right Second</a></button>
                                 <div class="subnav-content2x">
                                   <a href="#">Right 3</a>
                                   <a href="#">Right 4</a>
                                 </div>
                               </div>
                             </div>
                           </div>
                         </li> --}}
                        @if ($customer_id)
                        <li><a title="Thông tin tài khoản" href="{{route('view_account')}}">Thông tin tài khoản</a></li>
                        <li><a title="Nạp tiền" href="{{route('view_deposit')}}">Nạp tiền</a></li>
                        @else
                        <li><a title="Thông tin tài khoản" href="{{route('view_login')}}">Thông tin tài khoản</a></li>
                        <li><a title="Nạp tiền" href="{{route('view_login')}}">Nạp tiền</a></li>
                        @endif
                     </ul>
                  </div>
                  {{-- <ul class="nav navbar-nav navbar-left" style="background:#000;">
                     <li><a href="#" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
                  </ul> --}}
               </div>
            </nav>
            <div class="collapse navbar-collapse" id="search-form">
               <div id="mobile-search-form" class="halim-search-form"></div>
            </div>
            <div class="collapse navbar-collapse" id="user-info">
               <div id="mobile-user-login"></div>
            </div>
         </div>
      </div>
      </div>
      
      <div class="container">
         <div class="row fullwith-slider"></div>
      </div>
      <div class="container">
         {{-- main content --}}
         @yield('content')
      </div>
      <div class="clearfix"></div>

      <footer id="footer" class="clearfix">
         <div class="container footer-columns">
            <div class="row container">
               @foreach($footer as $key => $value)
               <div class="widget about col-xs-12 col-sm-4 col-md-4">
                  <div class="footer-logo">
                     <img class="img-responsive" src="{{URL::to('public/backend/uploads/banners/'.$value->image)}}" alt="{{$value->name}}" />
                  </div>
                  Liên hệ QC: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e5958d8c888d849ccb868aa58288848c89cb868a88">[email&#160;protected]</a>
               </div>
               @endforeach
            </div>
         </div>
       </footer>
      {{-- @include('pages.include.footer') --}}
      <div id='easy-top'></div>
      <script type='text/javascript' src='{{asset('public/frontend/js/detect.js')}}'></script>
      <script type='text/javascript' src='{{asset('public/frontend/js/bootstrap.min.js?ver=5.7.2')}}' id='bootstrap-js'></script>
      <script type='text/javascript' src='{{asset('public/frontend/js/owl.carousel.min.js?ver=5.7.2')}}' id='carousel-js'></script>
     
      <script type='text/javascript' src='{{asset('public/frontend/js/halimtheme-core.min.js?ver=1626273138')}}' id='halim-init-js'></script>
      
     
     
   
      <style>#overlay_mb{position:fixed;display:none;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0, 0, 0, 0.7);z-index:99999;cursor:pointer}#overlay_mb .overlay_mb_content{position:relative;height:100%}.overlay_mb_block{display:inline-block;position:relative}#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:600px;height:auto;position:relative;left:50%;top:50%;transform:translate(-50%, -50%);text-align:center}#overlay_mb .overlay_mb_content .cls_ov{color:#fff;text-align:center;cursor:pointer;position:absolute;top:5px;right:5px;z-index:999999;font-size:14px;padding:4px 10px;border:1px solid #aeaeae;background-color:rgba(0, 0, 0, 0.7)}#overlay_mb img{position:relative;z-index:999}@media only screen and (max-width: 768px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:400px;top:3%;transform:translate(-50%, 3%)}}@media only screen and (max-width: 400px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:310px;top:3%;transform:translate(-50%, 3%)}}</style>
    
      <style>
         #overlay_pc {
         position: fixed;
         display: none;
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: rgba(0, 0, 0, 0.7);
         z-index: 99999;
         cursor: pointer;
         }
         #overlay_pc .overlay_pc_content {
         position: relative;
         height: 100%;
         }
         .overlay_pc_block {
         display: inline-block;
         position: relative;
         }
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 600px;
         height: auto;
         position: relative;
         left: 50%;
         top: 50%;
         transform: translate(-50%, -50%);
         text-align: center;
         }
         #overlay_pc .overlay_pc_content .cls_ov {
         color: #fff;
         text-align: center;
         cursor: pointer;
         position: absolute;
         top: 5px;
         right: 5px;
         z-index: 999999;
         font-size: 14px;
         padding: 4px 10px;
         border: 1px solid #aeaeae;
         background-color: rgba(0, 0, 0, 0.7);
         }
         #overlay_pc img {
         position: relative;
         z-index: 999;
         }
         @media only screen and (max-width: 768px) {
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 400px;
         top: 3%;
         transform: translate(-50%, 3%);
         }
         }
         @media only screen and (max-width: 400px) {
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 310px;
         top: 3%;
         transform: translate(-50%, 3%);
         }
         }
      </style>
     
      <style>
         .float-ck { position: fixed; bottom: 0px; z-index: 9}
         * html .float-ck /* IE6 position fixed Bottom */{position:absolute;bottom:auto;top:expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0))) ;}
         #hide_float_left a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;float: left;}
         #hide_float_left_m a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;}
         span.bannermobi2 img {height: 70px;width: 300px;}
         #hide_float_right a { background: #01AEF0; padding: 5px 5px 1px 5px; color: #FFF;float: left;}
      </style>


      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0&appId=729873248747273" nonce="EI48vUhe"></script>
   
      <script>
         $(document).ready(function($) {
             var owl = $('#halim_related_movies-2');
             owl.owlCarousel({
                 loop: true,
                 margin: 4,
                 autoplay: true,
                 autoplayTimeout: 4000,
                 autoplayHoverPause: true,
                 nav: true,
                 navText: ['<i class="hl-down-open rotate-left"></i>',
                     '<i class="hl-down-open rotate-right"></i>'
                 ],
                 responsiveClass: true,
                 responsive: {
                     0: {
                         items: 2
                     },
                     480: {
                         items: 3
                     },
                     600: {
                         items: 4
                     },
                     1000: {
                         items: 5
                     }
                 }
             })
         });
     </script>


      <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
      {!! Toastr::message() !!}
     
   </body>
</html>
