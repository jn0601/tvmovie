@extends('layout')
@section('content')
    @php
        $current_url = Request::url();
      //   $session_genre = Session::get('genre');
      //   $session_country = Session::get('country');
      //   $session_category = Session::get('category');

      //   $genre_link = Session::get('genre_link');
      //   $country_link = Session::get('country_link');
      //   $category_link = Session::get('category_link');
      //   $get_link = '';

      //   if ($session_genre) {
      //       $get_link = $genre_link;
      //       $get_title = $session_genre;
      //   }

      //   if ($session_country) {
      //       $get_link = $country_link;
      //       $get_title = $session_country;
      //   }

      //   if ($session_category) {
      //       $get_link = $category_link;
      //       $get_title = $session_category;
      //   }

      //   if ($get_link == '') {
      //       $get_title = $category_detail->name;
      //   }

    @endphp

    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span>Phim » <span class="breadcrumb_last"
                        aria-current="page">{{ $movie_detail->name }}</span></span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
                <div class="clearfix wrap-content">

                    <div class="halim-movie-wrapper">
                        {{-- <div class="title-block">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                <div class="halim-pulse-ring"></div>
                            </div>
                            <div class="title-wrapper" style="font-weight: bold;">
                                Bookmark
                            </div>
                        </div> --}}
                        @php
                            $get_customer_id = Session::get('customer_id');
                        @endphp
                        <div class="movie_info col-xs-12">
                            <div class="movie-poster col-md-3">
                                <img class="movie-thumb"
                                    src="{{ URL::to('public/backend/uploads/movies/' . $movie_detail->image) }}"
                                    alt="{{ $movie_detail->name }}">
                                <div class="bwa-content">
                                    <div class="loader"></div>
                                    @if($get_customer_id)
                                    <a href="{{ route('watch', ['seo_name' => $movie_detail->seo_name, 
                                    'tap' => $first_ep->seo_name, 
                                    'server' => $first_server->seo_name]) }}" class="bwac-btn">
                                        <i class="fa fa-play"></i>
                                    </a>
                                    @else
                                    <a href="{{route('view_login')}}" class="bwac-btn">
                                        <i class="fa fa-play"></i>
                                    </a>
                                    @endif
                                </div>
                                @if ($price != 'Đã mua' && $price != '0 VND')
                                    @if($get_customer_id)
                                    <form class="buy-movie" method="post" action="{{route('payment', ['movie_id' => $movie_detail->id, 'customer_id' => $get_customer_id])}}" 
                                        onclick="return confirm('Bạn có chắc chắn muốn mua phim này không?')">
                                        @csrf
                                        <button type='submit' class="btn btn-success"><i class="fa fa-credit-card"></i> Mua phim</button>
                                    </form>
                                    @else 
                                    <form class="buy-movie" method="get" action="{{route('view_login')}}">
                                        <button type='submit' class="btn btn-success"><i class="fa fa-credit-card"></i> Mua phim</button>
                                    </form>
                                    @endif
                                @endif
                            </div>
                            <div class="film-poster col-md-9">
                                <h1 class="movie-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                    {{ $movie_detail->name }}</h1>
                                <h2 class="movie-title title-2" style="font-size: 12px;">{{ $movie_detail->org_name }}</h2>
                                <ul class="list-info-group">
                                    <li class="list-info-group-item"><span>Giá</span> :
                                        {{ $price }}
                                     </li>
                                     <li class="list-info-group-item"><span>Lượt xem</span> :
                                        {{ $movie_detail->count_view }}
                                     </li>
                                    <li class="list-info-group-item"><span>Thể loại</span> :
                                        @foreach ($genre_detail as $key => $value)
                                            <a href="{{ route('genre', $value->seo_name) }}" rel="category tag">{{ $value->name }}</a>,
                                        @endforeach
                                    </li>
                                    <li class="list-info-group-item"><span>Quốc gia</span> :
                                        @foreach ($country_detail as $key => $value)
                                            <a href="{{ route('country', $value->seo_name) }}" rel=" tag">{{ $value->name }}</a>,
                                        @endforeach
                                    </li>
                                    <li class="list-info-group-item"><span>Danh mục</span> :
                                       <a href="{{ route('category', $category_detail->seo_name) }}" rel=" tag">{{ $category_detail->name }}</a>
                                    </li>
                                    <li class="list-info-group-item"><span>Năm phát hành</span> :
                                       <a href="{{ route('year', $movie_detail->year) }}" rel=" tag">{{ $movie_detail->year }}</a>
                                    </li>
                                    {{-- <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">HD</span><span class="episode">{{$value->year}}</span></li>
                       <li class="list-info-group-item"><span>Điểm IMDb</span> : <span class="imdb">7.2</span></li>
                       <li class="list-info-group-item"><span>Thời lượng</span> : 133 Phút</li>
                       <li class="list-info-group-item"><span>Đạo diễn</span> : <a class="director" rel="nofollow" href="https://phimhay.co/dao-dien/cate-shortland" title="Cate Shortland">Cate Shortland</a></li>
                       <li class="list-info-group-item last-item" style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;"><span>Diễn viên</span> : <a href="" rel="nofollow" title="C.C. Smiff">C.C. Smiff</a>, <a href="" rel="nofollow" title="David Harbour">David Harbour</a>, <a href="" rel="nofollow" title="Erin Jameson">Erin Jameson</a>, <a href="" rel="nofollow" title="Ever Anderson">Ever Anderson</a>, <a href="" rel="nofollow" title="Florence Pugh">Florence Pugh</a>, <a href="" rel="nofollow" title="Lewis Young">Lewis Young</a>, <a href="" rel="nofollow" title="Liani Samuel">Liani Samuel</a>, <a href="" rel="nofollow" title="Michelle Lee">Michelle Lee</a>, <a href="" rel="nofollow" title="Nanna Blondell">Nanna Blondell</a>, <a href="" rel="nofollow" title="O-T Fagbenle">O-T Fagbenle</a></li> --}}
                                 <li>{!! $movie_detail->desc !!}</li>
                                </ul>
                                
                                
                                <div class="movie-trailer hidden">
                                    
                                    
                                </div>
                                <div class="fb-like" data-href="{{ $current_url }}" data-width="" data-layout="button_count"
                                    data-action="like" data-size="small" data-share="true"></div>
                                {{-- <div class="fb-like" data-href="{{$current_url}}" data-width="" data-layout="" 
                                data-action="" data-size="" data-share="true"></div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="halim_trailer"></div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Trailer phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                {{-- {!! $movie_detail->link_trailer !!} --}}
                                <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$movie_detail->link_trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </article>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                {{-- Phim <a href="https://phimhay.co/goa-phu-den-38424/">GÓA PHỤ ĐEN</a> - 2021 - Mỹ:
                    <p>Góa Phụ Đen &#8211; Black Widow 2021: Natasha Romanoff hay còn gọi là Góa phụ đen phải đối mặt với những phần đen tối của mình khi một âm mưu nguy hiểm liên quan đến quá khứ của cô nảy sinh. Bị truy đuổi bởi một thế lực sẽ không có gì có thể hạ gục cô, Natasha phải đối mặt với lịch sử là một điệp viên những mối quan hệ tan vỡ đã để lại trong cô từ lâu trước khi cô trở thành thành viên của biệt đội Avenger.</p>
                    <h5>Từ Khoá Tìm Kiếm:</h5>
                    <ul>
                       <li>black widow {{$value->year}}</li>
                       <li>Black Widow 2021 {{$value->year}}</li>
                       <li>phim black windows 2021</li>
                       <li>xem phim black windows</li>
                       <li>xem phim black widow</li>
                       <li>phim black windows</li>
                       <li>goa phu den</li>
                       <li>xem phim black window</li>
                       <li>phim black widow 2021</li>
                       <li>xem black widow</li>
                    </ul> --}}
                                {!! $movie_detail->content !!}
                            </article>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Tags</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                @if ($movie_detail->tags != NULL)
                                 @php
                                    $tags = array();
                                    $tags = explode(',', $movie_detail->tags);
                                 @endphp
                                 @foreach ($tags as $key => $value)
                                    <a href="{{route('tag', $value)}}">{{$value}}</a>
                                 @endforeach
                                @else
                                <a href="{{route('movie', $movie_detail->seo_name)}}">{{$movie_detail->name}}</a>
                                @endif
                            </article>
                        </div>
                    </div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Bình luận Facebook</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                {{-- Phim <a href="https://phimhay.co/goa-phu-den-38424/">GÓA PHỤ ĐEN</a> - 2021 - Mỹ:
                  <p>Góa Phụ Đen &#8211; Black Widow 2021: Natasha Romanoff hay còn gọi là Góa phụ đen phải đối mặt với những phần đen tối của mình khi một âm mưu nguy hiểm liên quan đến quá khứ của cô nảy sinh. Bị truy đuổi bởi một thế lực sẽ không có gì có thể hạ gục cô, Natasha phải đối mặt với lịch sử là một điệp viên những mối quan hệ tan vỡ đã để lại trong cô từ lâu trước khi cô trở thành thành viên của biệt đội Avenger.</p>
                  <h5>Từ Khoá Tìm Kiếm:</h5>
                  <ul>
                     <li>black widow {{$value->year}}</li>
                     <li>Black Widow 2021 {{$value->year}}</li>
                     <li>phim black windows 2021</li>
                     <li>xem phim black windows</li>
                     <li>xem phim black widow</li>
                     <li>phim black windows</li>
                     <li>goa phu den</li>
                     <li>xem phim black window</li>
                     <li>phim black widow 2021</li>
                     <li>xem black widow</li>
                  </ul> --}}
                                <div style="background-color:white">
                                    <div class="fb-comments" data-href="{{ $current_url }}" data-width="100%" data-numposts="5">
                                    </div>
                                </div>
                                
                            </article>
                        </div>
                    </div>
                </div>


            </section>
            <section class="related-movies">
                <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                    </div>
                    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach($related as $key => $value)
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
                        @endforeach





                    </div>
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
                                        items: 4
                                    }
                                }
                            })
                        });
                    </script>
                </div>
            </section>
        </main>
        {{-- sidebar --}}
    @include('pages.include.sidebar')
    </div>
@endsection
