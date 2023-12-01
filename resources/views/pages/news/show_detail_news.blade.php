@extends('layout')
@section('content')

<style>
   .page_tintuc-view h1 {
      color: #151515;
      font-size: 2.8em;
      font-weight: 800;
      font-family: Nunito;
      line-height: 1.2;
      text-transform: initial;
   }

   .page_tintuc-view .page-with-sidebar h2 {
      color: #414242;
      font-size: 1.5em;
      font-weight: 600;
      margin-bottom: 20px;
      font-family: inherit;
   }

   .page_tintuc-view h3 {
      color: #0E1B23;
      font-family: 'Nunito', sans-serif;
      font-size: 1.3em;
      font-weight: 500;
      margin-bottom: 20px;
   }

   .page_tintuc-view .blog-box h3 {
      color: #404044;
      font-size: 1.8em;
      margin-bottom: 20px;
      font-weight: 600;
      font-family: inherit;
   }

   .page_tintuc-view .sidebar-header {
      text-align: center;
      margin-top: 30px;
      font-size: 20px;
      font-weight: 600;
      padding: 8px 10px 11px;
      color: #fff;
   }

   .page_tintuc-view .blog-box a:hover h3 {
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
            <p>Tin tức</p>
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                  <li class="breadcrumb-item"><a href="index.php?page=tintuc">Danh mục</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
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
   <div class="page page_tintuc-view">
      <div class="container">
         <div class="row content">
            {{-- @foreach($news_detail as $key => $news) --}}
            <!-- Post Content Column -->
            <div class="col-lg-9 blog-card page-with-sidebar content">
               <h1 class="mb-2">{{$news_detail->name}}</h1>
               <!-- Post info-->
               <div class="post-info text-muted">
                  <i class="fas fa-calendar margin-icon"></i>{{substr($news_detail->date_created, -2)}}/{{substr($news_detail->date_created, 4, -2)}}/{{substr($news_detail->date_created, 0, 4)}}
                  <i class="fas fa-eye"></i> Lượt xem: {{$news_detail->count_view}}
               </div>
               <hr>
               <!-- Preview Image -->
               <img src="{{URL::to('public/backend/uploads/news/'.$news_detail->image)}}" class="img-fluid" alt="">
               <hr>
               <!-- Post Content -->
               <p>{!!$news_detail->content!!}</p>
               <div class="tag-socical container">
                  <div class="tag">
                     <ul style="padding: 0; margin: 0;">
                        <li class="text1"><span>Tags :</span></li>
                        <li class="text2"><a href="#">{{$news_detail->tags}}</a></li>
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
               <!-- Comments Form -->
               <div class="card my-4 mt-5 bg-light">
                  <h2 class="card-header">Để lại bình luận:</h2>
                  <div class="card-body">
                     <form>
                        <div class="form-group">
                           <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary">Gửi ngay</button>
                     </form>
                  </div>
               </div>
               <!-- Comment -->
               <div class="comment row mt-5">
                  <div class="col-md-3 col-xs-12 comment-img text-center float-left">
                     <img class="rounded-circle img-fluid m-x-auto" src="img/team/team1.jpg" alt="">
                  </div>
                  <!-- /col-md -->
                  <div class="col-md-9 col-xs-12 float-right">
                     <h3 class="mt-2"><a href="">Luisa Smith</a> <small>nói:</small></h3>
                     <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                     <button type="submit" class="btn btn-primary btn-sm float-right">Trả lời</button>
                  </div>
                  <!--/media-body -->
               </div>
               <!--/Comment -->
               <!-- Comment -->
               <div class="comment row">
                  <div class="col-md-3 col-xs-12 comment-img text-center float-left">
                     <img class="rounded-circle img-fluid m-x-auto" src="img/team/team2.jpg" alt="">
                  </div>
                  <!-- /col-md -->
                  <div class="col-md-9 col-xs-12 float-right">
                     <h3 class="mt-2"><a href="">John Doe</a> <small>nói:</small></h3>
                     <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                     <button type="submit" class="btn btn-primary btn-sm float-right">Trả lời</button>
                  </div>
                  <!--/media-body -->
               </div>
               <!--/Comment -->
               <!-- Comment -->
               <div class="comment row">
                  <div class="col-md-3 col-xs-12 comment-img text-center float-left">
                     <img class="rounded-circle img-fluid m-x-auto" src="img/team/team3.jpg" alt="">
                  </div>
                  <!-- /col-md -->
                  <div class="col-md-9 col-xs-12 float-right">
                     <h3 class="mt-2"><a href="">Mia Kelly</a> <small>nói:</small></h3>
                     <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                     <button type="submit" class="btn btn-primary btn-sm float-right">Trả lời</button>
                  </div>
                  <!--/media-body -->
               </div>
               <!--/Comment -->
            </div>
            <!-- /page-with-sidebar -->
            <!-- Sidebar -->
            {{-- @include('pages.category.tin-right') --}}

            <div id="sidebar" class="col-lg-3 h-50 sticky-top">
               <!--widget area-->
               <div class="widget-area notepad">
                  <h3 class="sidebar-header">Tin tức cùng danh mục</h3>
                  @foreach($related_news as $key => $related)
                  <div class="list-group">
                     <a href="{{URL::to('/'.$related->seo_name)}}" class="list-group-item list-group-item-action active">{{$related->name}}</a>
                  </div>
                  @endforeach
                  <!-- /list-group -->
               </div>
               <!-- /widget-area -->
            </div>
            <!--/sidebar -->
            {{-- @endforeach --}}
         </div>
         <!-- /.row -->
      </div>
      <div class="box-page magnific-popup1 box-news">
         <div class="container">
            <div class="col-lg-6 text-center offset-lg-3">
               <h2>Bài viết liên quan</h2>
               <!-- <p>In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p> -->
            </div>
            <div class="carousel-3items owl-carousel owl-theme mt-0">
               <!-- blog-box -->
               @foreach($related_news as $key => $related)
               <div class="blog-box">
                  <!-- image -->
                  <a href="{{URL::to('/'.$related->seo_name)}}">
                     <div class="image"><img style="height: 350px;" 
                        src="{{URL::to('public/backend/uploads/news/'.$related->image)}}" alt="" /></div>
                  </a>
                  <!-- blog-box-caption -->
                  <div class="blog-box-caption">
                     <!-- date -->
                     <div class="date"><span class="day">{{substr($related->date_created, -2)}}</span><span class="month">Tháng {{substr($news_detail->date_created, 4, -2)}}</span></div>
                     <a href="{{URL::to('/'.$related->seo_name)}}">
                        <h3>{{$related->name}}</h3>
                     </a>
                     <!-- /link -->
                     <p>
                        {!!$related->desc!!}
                     </p>
                  </div>
                  <!-- blog-box-footer -->
                  <div class="blog-box-footer">
                     <div class="comments"><i class="fas fa-eye"></i>Lượt xem: {{$related->count_view}}</div>
                     <!-- Button -->
                     <div class="text-center col-md-12">
                        <a href="{{URL::to('/'.$related->seo_name)}}" class="btn btn-primary">Xem thêm</a>
                     </div>
                  </div>
                  <!-- /blog-box-footer -->
               </div>
               @endforeach
               <!-- /blog-box -->
               <!-- blog-box -->
               
               <!-- /blog-box -->
               <!-- blog-box -->
               
               <!-- /blog-box -->
               <!-- blog-box -->
               
               <!-- /blog-box -->
            </div>
            <!-- /owl-carousel -->
         </div>
      </div>
      <!-- /.container -->
   </div>

   <!-- /page -->
</div>
<!--/ page-wrapper -->
@endsection