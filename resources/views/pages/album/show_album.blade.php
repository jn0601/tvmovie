@extends('layout')
@section('content')

<style>
    .page_hinhanh h2 {
       color: #151515;
        font-size: 2.8em;
        font-weight: 800;
        font-family: Nunito;
        line-height: 1.2;
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
                   <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                   <li class="breadcrumb-item"><a href="#">Thư viện hình ảnh</a></li>
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
    <div class="page page_hinhanh">
       <div class="container">
          <div class="col-lg-6 text-center offset-lg-3">
             <h2>Thư viện ảnh của chúng tôi</h2>
             <p>In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
          </div>
          <!-- /col-md -->
       </div>
       <!-- /container -->
       <!-- gallery -->
       <div class="container magnific-popup1 mt-5">
          <!-- row starts -->
          <div class="row">
            @foreach($elements as $key => $element)
             <!-- image -->
            <div class="col-lg-3">
                <a href="{{URL::to('/'.$element->seo_name)}}" 
                    title="You can add caption to pictures.">
                <img src="{{URL::to('public/backend/uploads/albums/'.$element->image)}}" 
                class="blob img-fluid" alt="">
                <i class="far fa-images"></i>
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
 
          {{-- <nav aria-label="pagination">
             <ul class="pagination">
                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                
             </ul>
          </nav> --}}
          {!!$elements->links()!!} 
       </div>
       <!-- /container -->
    </div>
    <!-- /page -->
 </div>
       <!--/ page-wrapper -->

@endsection