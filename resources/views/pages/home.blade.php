@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <div class="col-xs-12 carausel-sliderWidget">
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
                                <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span>
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
                                    aria-hidden="true"></i>Vietsub</span>
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
                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                    <div class="halim-item">
                        <a class="halim-thumb" href="chitiet.php">
                            <figure><img class="lazy img-responsive"
                                    src="https://upload.wikimedia.org/wikipedia/vi/e/e8/Avengers-Infinity_War-Official-Poster.jpg"
                                    alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO">
                            </figure>
                            <span class="status">TẬP 15</span><span class="episode"><i class="fa fa-play"
                                    aria-hidden="true"></i>Vietsub</span>
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
                      <span class="status">TẬP 15</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
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
    <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
        <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
            <div class="section-bar clearfix">
                <div class="section-title">
                    <span>Top Views</span>
                    <ul class="halim-popular-tab" role="tablist">
                        <li role="presentation" class="active">
                            <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                                data-type="today">Day</a>
                        </li>
                        <li role="presentation">
                            <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                                data-type="week">Week</a>
                        </li>
                        <li role="presentation">
                            <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                                data-type="month">Month</a>
                        </li>
                        <li role="presentation">
                            <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                                data-type="all">All</a>
                        </li>
                    </ul>
                </div>
            </div>
            <section class="tab-content">
                <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                    <div class="halim-ajax-popular-post-loading hidden"></div>
                    <div id="halim-ajax-popular-post" class="popular-post">
                      @foreach($movie as $key => $value)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $value->seo_name) }}" title="{{$value->name}}">
                                <div class="item-link">
                                    <img src="{{URL::to('public/backend/uploads/movies/'.$value->image)}}"
                                        class="lazy post-thumb" alt="{{$value->name}}"
                                        title="{{$value->name}}" />
                                    <span class="is_trailer">Trailer</span>
                                </div>
                                <p class="title">{{$value->name}}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">125 lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                      @endforeach


                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
        </div>
    </aside>
</div>
@endsection
