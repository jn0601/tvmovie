@extends('layout')
@section('content')

<style>
    .page_hinhanh-view h1 {
       color: #151515;
        font-size: 2.8em;
        font-weight: 800;
        font-family: Nunito;
        line-height: 1.2;
        text-transform: initial;
     }
    .page_hinhanh-view .page-with-sidebar h2 {
       color: #414242;
        font-size: 1.5em;
        font-weight: 600;
        margin-bottom: 20px;
        font-family: inherit;
    }
 
    .page_hinhanh-view h3 {
       color: #0E1B23;
        font-family: 'Nunito', sans-serif;
        font-size: 1.3em;
        font-weight: 500;
        margin-bottom: 20px;
    }
    .page_hinhanh-view .blog-box h3 {
        color: #404044;
     font-size: 1.8em;
     margin-bottom: 20px;
     font-weight: 600;
     font-family: inherit;
    }
    .page_hinhanh-view .sidebar-header {
        text-align: center;
        margin-top: 30px;
        font-size: 20px;
        font-weight: 600;
        padding: 8px 10px 11px;
        color: #fff;
    }
    .page_hinhanh-view .blog-box a:hover h3 {
       color: #e4a40f;
    }
 
 </style>
 
 <!-- page wrapper starts -->
 <div id="page-wrapper">
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
       <div class="container" >
          <!-- jumbo-heading -->
          <div class="jumbo-heading" data-aos="fade-down">
             <p>Thư viện hình ảnh</p >
             <!-- Breadcrumbs -->
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                   <li class="breadcrumb-item"><a href="#">Thư viện</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Thư viện hình ảnh</li>
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
    <div class="page page_hinhanh-view">
       <div class="container">
          <div class="col-lg-6 text-center offset-lg-3">
             <h1 class="mb-2">{{$title_name}}</h1>
             <p>{!!$desc!!}</p>
          </div>
          <!-- /col-md -->
       </div>
       <!-- /container -->
       <!-- gallery -->
       <div class="container magnific-popup mt-5">
          <!-- row starts -->
          <div class="row">
            @foreach($album_photos as $key => $photo)
             <!-- image -->
             <div class="col-lg-3">
                <a href="{{URL::to('public/backend/uploads/photos/'.$photo->image)}}" 
                    title="You can add caption to pictures.">
                   <img src="{{URL::to('public/backend/uploads/photos/'.$photo->image)}}" 
                   class="blob img-fluid" alt="">
                </a>
             </div>
             <!-- image -->
             
             <!-- image -->
             
             <!-- image -->
            @endforeach
          </div>
          <!-- /row -->
          <!-- row starts -->
          
          <!-- /row -->
          <!-- row starts -->
          
          <!-- /row -->
          
       </div>
           {!!$album_photos->links()!!} 
     </nav>
       <div class="tag-socical container">
        <div class="tag">
          <ul style="padding: 0; margin: 0;">
            <li class="text1"><span>Tags :</span></li>
            <li class="text2"><a href="#">{{$album_detail->tags}}</a></li>
            {{-- <li class="text2"><a href="#">Dịch vụ,</a></li>
            <li class="text2"><a href="#">Liên hệ</a></li> --}}
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
 <!-- /container -->
 <div class="box-page magnific-popup1">
    <div class="container">
       <div class="col-lg-6 text-center offset-lg-3">
          <h2>Hình ảnh liên quan</h2>
          <p>In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
       </div>
       <div class="carousel-3items owl-carousel owl-theme mt-0">
          <!-- blog-box -->
          @foreach($related_album as $key => $related)
          <div class="col-lg-3">
             <a href="{{URL::to('/'.$related->seo_name)}}" title="You can add caption to pictures.">
                <img src="{{URL::to('public/backend/uploads/albums/'.$related->image)}}" 
                class="blob img-fluid" alt="">
                <i class="far fa-images"></i>
             </a>
          </div>
          @endforeach
          <!-- image -->
          
          <!-- image -->
          
          <!-- image -->
          
          <!-- /blog-box -->
       </div>
       <!-- /owl-carousel -->
    </div>
 </div>
 </div>
 <!-- /page -->
 </div>
       <!--/ page-wrapper -->

@endsection