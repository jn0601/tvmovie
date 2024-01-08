<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
  <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
      <div class="section-bar clearfix">
          <div class="section-title">
              <span>Phim nổi bật</span>
              
          </div>
      </div>
      <section class="tab-content">
          <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
              <div class="halim-ajax-popular-post-loading hidden"></div>
              <div id="halim-ajax-popular-post" class="popular-post">
                @foreach($sidebar as $key => $value)
                @if( in_array(2, explode(",",$value->options)) )
                  <div class="item post-37176">
                      <a href="{{ route('movie', $value->seo_name) }}" title="{{$value->name}}">
                          <div class="item-link">
                              <img src="{{URL::to('public/backend/uploads/movies/'.$value->image)}}"
                                  class="lazy post-thumb" alt="{{$value->name}}"
                                  title="{{$value->name}}" />
                              <span class="is_trailer">Nổi bật</span>
                          </div>
                          <p class="title">{{$value->name}}</p>
                      </a>
                      <div class="viewsCount" style="color: #9d9d9d;">{{$value->count_view}} lượt xem</div>
                      <div style="float: left;">
                          <span class="user-rate-image post-large-rate stars-large-vang"
                              style="display: block;/* width: 100%; */">
                              <span style="width: 0%"></span>
                          </span>
                      </div>
                  </div>
                  @endif
                @endforeach


              </div>
          </div>
      </section>
      <div class="clearfix"></div>
  </div>
</aside>
{{-- <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
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
</aside> --}}