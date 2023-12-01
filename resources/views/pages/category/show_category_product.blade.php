@extends('layout')
@section('content')

<style>
   .page_tintuc h2 {
      font-family: 'Nunito', sans-serif;
      font-size: 2.2em;
      color: #151515;
      font-weight: 600;
      margin-bottom: 20px;
      line-height: 1.1;
   }

   .page_tintuc h3 {
       color: #404044;
       font-size: 1.8em;
       margin-bottom: 20px;
       font-weight: 600;
   }
   .page_tintuc a:hover h3 {
      color: #e4a40f;
   }
</style>

<!-- page wrapper starts -->
<div id="page-wrapper">
   
   <h1 class="tieu-de-trang" style="display:none">{{$title_name}}</h1>
   
   <!-- Jumbotron -->
   <div class="jumbotron jumbotron-fluid">
      <div class="container" >
         <!-- jumbo-heading -->
         <div class="jumbo-heading" data-aos="fade-down">
            <p>{{$title_name}}</p>
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$title_name}}</li>
                  
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
   <div id="blog-home" class="page page_tintuc">
      <h2 style="display:none">{{$title_name}}</h2>
      <div class="container">
         <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-lg-9 page-with-sidebar">
               <div class="row">
                  <!-- featured blog post -->
                  <div class="col-lg-12 mb-5">
                     <!-- blog-box -->
                     
                     <!-- /blog-box -->
                  </div>
                  @foreach($elements as $key => $element)
                  <!-- /col-lg-12-->
                  <div class="col-lg-6 res-margin mt-lg-5">
                     <!-- blog-box -->
                     <div class="blog-box" style="height: 100%;">
                        <!-- image -->
                        @if($type == 15)
                           @if($menu_type == 5)
                              <a href="{{URL::to('/tin-tuc/'.$element->seo_name)}}">
                                 <div class="image"><img style="height: 400px; width: 100%;" 
                                    src="{{URL::to('public/backend/uploads/news/'.$element->image)}}" 
                                    alt=""/></div>
                              </a>
                           @else
                              <a href="{{URL::to('/san-pham/'.$element->seo_name)}}">
                                 <div class="image"><img style="height: 400px; width: 100%;" 
                                    src="{{URL::to('public/backend/uploads/products/'.$element->image)}}" 
                                    alt=""/></div>
                              </a>
                           @endif
                        @elseif($type == 5)
                           <a href="{{URL::to('/tin-tuc/'.$element->seo_name)}}">
                              <div class="image"><img style="height: 400px; width: 100%;" 
                              src="{{URL::to('public/backend/uploads/news/'.$element->image)}}" 
                              alt=""/></div>
                           </a>
                        @else
                           <a href="{{URL::to('/san-pham/'.$element->seo_name)}}">
                              <div class="image"><img style="height: 400px; width: 100%;" 
                                 src="{{URL::to('public/backend/uploads/products/'.$element->image)}}" 
                                 alt=""/></div>
                           </a>
                        @endif
                        <!-- blog-box-caption -->
                        <div class="blog-box-caption">
                           <!-- date -->
                           <div class="date"><span class="day">{{substr($element->date_created, -2)}}

                           </span><span class="month">Tháng {{substr($element->date_created, 4, -2)}}</span></div>
                           
                           @if($type == 15)
                              @if($menu_type == 5)
                              <a href="{{URL::to('/tin-tuc/'.$element->seo_name)}}">
                                 <h3>{{$element->name}}</h3>
                              </a>
                              @else
                              <a href="{{URL::to('/san-pham/'.$element->seo_name)}}">
                                 <h3>{{$element->name}}</h3>
                              </a>
                              @endif
                           @elseif($type == 5)
                              <a href="{{URL::to('/tin-tuc/'.$element->seo_name)}}">
                                 <h3>{{$element->name}}</h3>
                              </a>
                           @else
                              <a href="{{URL::to('/san-pham/'.$element->seo_name)}}">
                                 <h3>{{$element->name}}</h3>
                              </a>
                           @endif
                           
                           <!-- /link -->
                           <p>
                              {!!$element->desc!!}
                           </p>
                        </div>
                        <!-- blog-box-footer -->
                        <div class="blog-box-footer">
                           @if($type == 15)
                              @if($menu_type == 5)
                                 <div class="comments"><i class="fas fa-eye"></i>Lượt xem: {{$element->count_view}}</div>
                                 <!-- Button -->    
                                 <div class="text-center col-md-12">
                                    <a href="{{URL::to('/tin-tuc/'.$element->seo_name)}}" class="btn btn-primary">Xem thêm</a>
                                 </div>
                              @else
                                 <div class="comments"><i class="fas fa-eye"></i>Lượt xem: {{$element->count_view}}</div>
                                 <!-- Button --> 
                                 <div class="text-center col-md-12">
                                    <a href="{{URL::to('/san-pham/'.$element->seo_name)}}" class="btn btn-primary">Xem thêm</a>
                                 </div>
                              @endif
                           @elseif($type == 5)
                              <div class="comments"><i class="fas fa-eye"></i>Lượt xem: {{$element->count_view}}</div>
                              <!-- Button -->    
                              <div class="text-center col-md-12">
                                 <a href="{{URL::to('/tin-tuc/'.$element->seo_name)}}" class="btn btn-primary">Xem thêm</a>
                              </div>
                           @else
                              <div class="comments"><i class="fas fa-eye"></i>Lượt xem: {{$element->count_view}}</div>
                              <!-- Button --> 
                              <div class="text-center col-md-12">
                                 <a href="{{URL::to('/san-pham/'.$element->seo_name)}}" class="btn btn-primary">Xem thêm</a>
                              </div>
                           @endif
                           
                        </div>
                        <!-- /blog-box-footer -->
                     </div>
                     <!-- /blog-box -->
                  </div>
                  @endforeach
                  <!-- /col-lg-6-->
                  
                  <!-- /col-lg-6-->
                  
                  <!-- /col-lg-6-->
                  
                  <!-- /col-lg-6-->
               </div>
               <!-- /row -->
               <div class="col-md-12 mt-5">
                  <!-- pagination -->
                  <nav aria-label="pagination">
                     <!-- <ul class="pagination">
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                     </ul> -->
                     {!!$elements->links()!!} 
                  </nav>
                  <!-- /nav -->
               </div>
               <!-- /col-md -->
            </div>
            <!-- /page-with-sdiebar -->
            <!-- blog sidebar starts -->
            @include('pages.category.tin-right')
            <!--/sidebar -->      
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container -->
   </div>
   <!-- /page -->
</div>
      <!--/ page-wrapper -->
@endsection