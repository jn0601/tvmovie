@extends('layout')
@section('content')
<div class="row container" id="wrapper">
  <div class="halim-panel-filter">
     <div class="panel-heading">
        <div class="row">
           <div class="col-xs-6">
              <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('genre', $genre_detail->seo_name)}}">
                {{$genre_detail->name}}
                </a> » <span><a href="{{route('country', $country_detail->seo_name)}}">
                {{$country_detail->name}}
              </a> » <span class="breadcrumb_last" aria-current="page">{{$movie_detail->name}}</span></span></span></span></div>
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
           
           {{-- <iframe width="100%" height="500" src="https://www.youtube.com/embed/r958O404e4U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
           {{-- <iframe id="iframe-embed" width="100%" height="500" scrolling="no" frameborder="0" src="https://megacloud.tv/embed-1/e-1/D0Hz3lAa1u6D?z=" allowfullscreen="allowfullscreen" webkitallowfullscreen="true" mozallowfullscreen="true" __idm_id__="1581057"></iframe> --}}
           {{-- <iframe id="iframe-embed" width="100%" height="500" scrolling="no" frameborder="0" src="https://megacloud.tv/embed-1/e-1/m8WKxgcqJ3QS?z=" allowfullscreen="allowfullscreen" webkitallowfullscreen="true" mozallowfullscreen="true" __idm_id__="3522561"></iframe> --}}
           {!!$episode_link->link!!}
           
           <div class="button-watch">
              <ul class="halim-social-plugin col-xs-4 hidden-xs">
                 <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
              </ul>
              <ul class="col-xs-12 col-md-8">
                 <div id="autonext" class="btn-cs autonext">
                    <i class="icon-autonext-sm"></i>
                    <span><i class="hl-next"></i> Autonext: <span id="autonext-status">On</span></span>
                 </div>
                 <div id="explayer" class="hidden-xs"><i class="hl-resize-full"></i>
                    Expand 
                 </div>
                 <div id="toggle-light"><i class="hl-adjust"></i>
                    Light Off 
                 </div>
                 <div id="report" class="halim-switch"><i class="hl-attention"></i> Report</div>
                 <div class="luotxem"><i class="hl-eye"></i>
                    <span>1K</span> lượt xem 
                 </div>
                 <div class="luotxem">
                    <a class="visible-xs-inline" data-toggle="collapse" href="#moretool" aria-expanded="false" aria-controls="moretool"><i class="hl-forward"></i> Share</a>
                 </div>
              </ul>
           </div>
           <div class="collapse" id="moretool">
              <ul class="nav nav-pills x-nav-justified">
                 <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                 <div class="fb-save" data-uri="" data-size="small"></div>
              </ul>
           </div>
        
           <div class="clearfix"></div>
           <div class="clearfix"></div>
           <div class="title-block">
              <a href="javascript:;" data-toggle="tooltip" title="Add to bookmark">
                 <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="37976">
                    <div class="halim-pulse-ring"></div>
                 </div>
              </a>
              <div class="title-wrapper-xem full">
                 <h1 class="entry-title"><a href="" title="{{$movie_detail->name}}" class="tl">{{$movie_detail->name}}</a></h1>
              </div>
           </div>
           <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
              <article id="post-37976" class="item-content post-37976"></article>
           </div>
           <div class="clearfix"></div>
           <div class="text-center">
              <div id="halim-ajax-list-server"></div>
           </div>
           <div id="halim-list-server">
              <ul class="nav nav-tabs" role="tablist">
                 <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl-server"></i> Vietsub</a></li>
              </ul>
              <div class="tab-content">
                 <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                    <div class="halim-server">
                       <ul class="halim-list-eps">
                        @foreach($episode as $key => $value)
                        <a href="{{route('episode', $value->seo_name)}}"><li class="halim-episode"><span class="halim-btn halim-btn-2 active halim-info-1-1 box-shadow" data-post-id="37976" data-server="1" data-episode="1" data-position="first" data-embed="0" data-title="{{$movie_detail->name}} - {{$value->name}}" data-h1="{{$movie_detail->name}} - {{$value->name}}">{{$value->episode}}</span></li></a>
                        @endforeach
                          
                       </ul>
                       <div class="clearfix"></div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="clearfix"></div>
           <div class="htmlwrap clearfix">
              <div id="lightout"></div>
           </div>
     </section>
     <section class="related-movies">
     <div id="halim_related_movies-2xx" class="wrap-slider">
     <div class="section-bar clearfix">
     <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
     </div>
     <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
     <article class="thumb grid-item post-38494">
        <div class="halim-item">
        <a class="halim-thumb" href="chitiet.php" title="Câu Chuyện Kinh Dị Cổ Điển">
        <figure><img class="lazy img-responsive" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-Hp2tnGf-zNQ/YO68R-yZRcI/AAAAAAAAJqY/Nc9qNCLgBtcjeWjOEIrOW45H5Vvva4xNgCLcBGAsYHQ/s320/MV5BNzE1YjdmMWYtMDk5ZS00YzEzLWE4NjctYmFiZmIwNzU0MjQ5XkEyXkFqcGdeQXVyMTA3MDAxNDcw._V1_.jpg" alt="Câu Chuyện Kinh Dị Cổ Điển" title="Câu Chuyện Kinh Dị Cổ Điển"></figure>
        <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> <div class="icon_overlay"></div>
        <div class="halim-post-title-box">
        <div class="halim-post-title ">
        <p class="entry-title">Câu Chuyện Kinh Dị Cổ Điển</p><p class="original_title">A Classic Horror Story</p>
        </div>
        </div>
        </a>
        </div>
     </article>
     <article class="thumb grid-item post-38494">
        <div class="halim-item">
        <a class="halim-thumb" href="chitiet.php" title="Câu Chuyện Kinh Dị Cổ Điển">
        <figure><img class="lazy img-responsive" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-Hp2tnGf-zNQ/YO68R-yZRcI/AAAAAAAAJqY/Nc9qNCLgBtcjeWjOEIrOW45H5Vvva4xNgCLcBGAsYHQ/s320/MV5BNzE1YjdmMWYtMDk5ZS00YzEzLWE4NjctYmFiZmIwNzU0MjQ5XkEyXkFqcGdeQXVyMTA3MDAxNDcw._V1_.jpg" alt="Câu Chuyện Kinh Dị Cổ Điển" title="Câu Chuyện Kinh Dị Cổ Điển"></figure>
        <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> <div class="icon_overlay"></div>
        <div class="halim-post-title-box">
        <div class="halim-post-title ">
        <p class="entry-title">Câu Chuyện Kinh Dị Cổ Điển</p><p class="original_title">A Classic Horror Story</p>
        </div>
        </div>
        </a>
        </div>
     </article>
     <article class="thumb grid-item post-38494">
        <div class="halim-item">
        <a class="halim-thumb" href="chitiet.php" title="Câu Chuyện Kinh Dị Cổ Điển">
        <figure><img class="lazy img-responsive" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-Hp2tnGf-zNQ/YO68R-yZRcI/AAAAAAAAJqY/Nc9qNCLgBtcjeWjOEIrOW45H5Vvva4xNgCLcBGAsYHQ/s320/MV5BNzE1YjdmMWYtMDk5ZS00YzEzLWE4NjctYmFiZmIwNzU0MjQ5XkEyXkFqcGdeQXVyMTA3MDAxNDcw._V1_.jpg" alt="Câu Chuyện Kinh Dị Cổ Điển" title="Câu Chuyện Kinh Dị Cổ Điển"></figure>
        <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> <div class="icon_overlay"></div>
        <div class="halim-post-title-box">
        <div class="halim-post-title ">
        <p class="entry-title">Câu Chuyện Kinh Dị Cổ Điển</p><p class="original_title">A Classic Horror Story</p>
        </div>
        </div>
        </a>
        </div>
     </article>
     <article class="thumb grid-item post-38494">
        <div class="halim-item">
        <a class="halim-thumb" href="chitiet.php" title="Câu Chuyện Kinh Dị Cổ Điển">
        <figure><img class="lazy img-responsive" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-Hp2tnGf-zNQ/YO68R-yZRcI/AAAAAAAAJqY/Nc9qNCLgBtcjeWjOEIrOW45H5Vvva4xNgCLcBGAsYHQ/s320/MV5BNzE1YjdmMWYtMDk5ZS00YzEzLWE4NjctYmFiZmIwNzU0MjQ5XkEyXkFqcGdeQXVyMTA3MDAxNDcw._V1_.jpg" alt="Câu Chuyện Kinh Dị Cổ Điển" title="Câu Chuyện Kinh Dị Cổ Điển"></figure>
        <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> <div class="icon_overlay"></div>
        <div class="halim-post-title-box">
        <div class="halim-post-title ">
        <p class="entry-title">Câu Chuyện Kinh Dị Cổ Điển</p><p class="original_title">A Classic Horror Story</p>
        </div>
        </div>
        </a>
        </div>
     </article>
     <article class="thumb grid-item post-38494">
        <div class="halim-item">
        <a class="halim-thumb" href="chitiet.php" title="Câu Chuyện Kinh Dị Cổ Điển">
        <figure><img class="lazy img-responsive" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-Hp2tnGf-zNQ/YO68R-yZRcI/AAAAAAAAJqY/Nc9qNCLgBtcjeWjOEIrOW45H5Vvva4xNgCLcBGAsYHQ/s320/MV5BNzE1YjdmMWYtMDk5ZS00YzEzLWE4NjctYmFiZmIwNzU0MjQ5XkEyXkFqcGdeQXVyMTA3MDAxNDcw._V1_.jpg" alt="Câu Chuyện Kinh Dị Cổ Điển" title="Câu Chuyện Kinh Dị Cổ Điển"></figure>
        <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> <div class="icon_overlay"></div>
        <div class="halim-post-title-box">
        <div class="halim-post-title ">
        <p class="entry-title">Câu Chuyện Kinh Dị Cổ Điển</p><p class="original_title">A Classic Horror Story</p>
        </div>
        </div>
        </a>
        </div>
     </article>
    
     </div>
     <script>
        jQuery(document).ready(function($) {				
        var owl = $('#halim_related_movies-2');
        owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
     </script>
     </div>
     </section>
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
