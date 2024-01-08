@extends('layout')
@section('content')
@php
   Session::put('year', $year);
@endphp
<div class="row container" id="wrapper">
  <div class="halim-panel-filter">
     <div class="panel-heading">
        <div class="row">
           <div class="col-xs-6">
            <div class="yoast_breadcrumb hidden-xs"><span><span>Năm » <span class="breadcrumb_last" aria-current="page"><a href="#">{{$year}}</a></span></span></span></div>
           </div>
        </div>
     </div>
     <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
        <div class="ajax"></div>
     </div>
  </div>
  <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
   <section>
      <div class="section-bar clearfix">
         <h1 class="section-title"><span>{{$year}}</span></h1>
      </div>
      <div class="halim_box">
       @foreach ($movie as $key => $value)
         <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
            <div class="halim-item">
               <a class="halim-thumb" href="{{ route('movie', $value->seo_name) }}" title="{{ $value->name }}">
                  <figure><img class="lazy img-responsive" src="{{URL::to('public/backend/uploads/movies/'.$value->image)}}" 
                   alt="{{ $value->name }}" title="{{ $value->name }}"></figure>
                   @foreach ($episode as $key => $ep)
                      @if ($ep->movie_id == $value->id)
                         <span class="status">{{ $ep->name }}</span>
                      @break
                      @endif
                   @endforeach
                  <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$value->year}}</span> 
                  <div class="icon_overlay"></div>
                  <div class="halim-post-title-box">
                     <div class="halim-post-title ">
                        <p class="entry-title">{{ $value->name }}</p>
                        <p class="original_title">{{ $value->org_name }}</p>
                     </div>
                  </div>
               </a>
            </div>
         </article>
       @endforeach
       
         
         
      
      </div>
      <div class="clearfix"></div>
      <div class="text-center">
         {{-- <ul class='page-numbers'>
            <li><span aria-current="page" class="page-numbers current">1</span></li>
            <li><a class="page-numbers" href="">2</a></li>
            <li><a class="page-numbers" href="">3</a></li>
            <li><span class="page-numbers dots">&hellip;</span></li>
            <li><a class="page-numbers" href="">55</a></li>
            <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li>
         </ul> --}}
         {{$movie->links()}}
      </div>
   </section>
</main>
{{-- sidebar --}}
@include('pages.include.sidebar')
</div>
@endsection