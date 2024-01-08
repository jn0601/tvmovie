@extends('layout')
@section('content')
@php
    Session::forget('genre');
    Session::forget('country');
    Session::forget('category');
@endphp
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        {{-- <div class="col-xs-12 carausel-sliderWidget">
            <section id="halim-advanced-widget-4">
                <div class="section-heading">
                    <a href="#" title="Phim Mới">
                        <span class="h-text">Phim Mới</span>
                    </a>
                    <ul class="heading-nav pull-right hidden-xs">
                        <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12"
                            data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Mới"></span>
                        </li>
                    </ul>
                </div>
                <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
                    @foreach ($movie as $key => $value)
                      @if( in_array(1, explode(",",$value->options)) )
                        <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                            <div class="halim-item">
                                <a class="halim-thumb"
                                    href="{{ route('movie', $value->seo_name) }}"title="{{ $value->name }}">
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
                            </a>
                        </div>
                    </article>
                    @endif
                @endforeach
            </div>
        </section>
    </div> --}}
    <div id="halim_related_movies-2xx" class="wrap-slider">
        {{-- <div class="section-bar clearfix">
            <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
        </div> --}}
        <div class="section-heading">
            <a href="#" title="Phim Mới">
                <span class="h-text">Phim Mới</span>
            </a>
            <ul class="heading-nav pull-right hidden-xs">
                <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12"
                    data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Mới"></span>
                </li>
            </ul>
        </div>
        <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
            @foreach($movie as $key => $value)
            @if( in_array(1, explode(",",$value->options)) )
            <article class="thumb grid-item post-38498">
                <div class="halim-item">
                    <a class="halim-thumb" href="{{route('movie', $value->seo_name)}}" title="{{$value->name}}">
                        <figure><img class="lazy img-responsive"
                                src="{{URL::to('public/backend/uploads/movies/'.$value->image)}}"
                                alt="{{$value->name}}" title="{{$value->name}}"></figure>
                        <span class="status">HD</span><span class="episode"><i class="fa fa-play"
                                aria-hidden="true"></i>{{$value->year}}</span>
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                                <p class="entry-title">{{$value->name}}</p>
                                <p class="original_title">{{$value->org_name}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </article>
            @endif
            @endforeach





        </div>
        
    </div>
    <div class="clearfix"></div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
        <section id="halim-advanced-widget-2">
            <div class="section-heading">
                <a href="#" title="Phim Hot">
                    <span class="h-text">Phim Hot</span>
                </a>
            </div>
            <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
              @foreach ($movie as $key => $value)
              @if( in_array(4, explode(",",$value->options)) )
                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                    <div class="halim-item">
                        <a class="halim-thumb" href="{{ route('movie', $value->seo_name) }}" title="{{ $value->name }}">
                            <figure><img class="lazy img-responsive"
                                    src="{{URL::to('public/backend/uploads/movies/'.$value->image)}}"
                                    alt="{{ $value->name }}" title="{{ $value->name }}">
                            </figure>
                            @foreach ($episode as $key => $ep)
                                @if ($ep->movie_id == $value->id)
                                    <span class="status">{{ $ep->name }}</span>
                                @break
                            @endif
                            @endforeach
                            <span class="episode"><i class="fa fa-play"
                                    aria-hidden="true"></i>{{$value->year}}</span>
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
                @endif
              @endforeach



            </div>
        </section>
        <div class="clearfix"></div>
        <section id="halim-advanced-widget-2">
            <div class="section-heading">
                <a href="#" title="Phim Đặc biệt">
                    <span class="h-text">Phim Đặc biệt</span>
                </a>
            </div>
            <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                @foreach ($movie as $key => $value)
                @if( in_array(3, explode(",",$value->options)) )
                    <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{ route('movie', $value->seo_name) }}" title="{{ $value->name }}">
                                <figure><img class="lazy img-responsive"
                                        src="{{URL::to('public/backend/uploads/movies/'.$value->image)}}"
                                        alt="{{ $value->name }}" title="{{ $value->name }}">
                                </figure>
                                @foreach ($episode as $key => $ep)
                                    @if ($ep->movie_id == $value->id)
                                        <span class="status">{{ $ep->name }}</span>
                                    @break
                                @endif
                                @endforeach
                                <span class="episode"><i class="fa fa-play"
                                        aria-hidden="true"></i>{{$value->year}}</span>
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
                    @endif
                @endforeach


            </div>
        </section>
        <div class="clearfix"></div>
        {{-- <section id="halim-advanced-widget-2">
          <div class="section-heading">
            <a href="danhmuc.php" title="Phim Lẻ">
            <span class="h-text">Phim Chiếu Rạp</span>
            </a>
          </div>
          <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                <div class="halim-item">
                  <a class="halim-thumb" href="chitiet.php">
                      <figure><img class="lazy img-responsive" src="https://fptninhbinh.vn/wp-content/uploads/2021/06/bo-gia.jpg" alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO"></figure>
                      <span class="status">TẬP 15</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$value->year}}</span> 
                      <div class="icon_overlay"></div>
                      <div class="halim-post-title-box">
                        <div class="halim-post-title ">
                            <p class="entry-title">BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO</p>
                            <p class="original_title">My Roommate Is a Gumiho</p>
                        </div>
                      </div>
                  </a>
                </div>
            </article>
              

            
            
            
          </div>
      </section> --}}
        <div class="clearfix"></div>
    </main>
    {{-- sidebar --}}
    @include('pages.include.sidebar')
</div>
@endsection
