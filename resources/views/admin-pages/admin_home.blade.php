@extends('admin_layout')
@section('admin_content')


<div class="banner_categories_height" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Chức năng chính</h3>
      </div>

      {{-- <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div> --}}
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="">
          <div class="x_content">
            <div class="row">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                  <a href="{{URL::to('admin/products')}}">
                  <div class="icon"><i class="fa fa-cubes"></i>
                  </div>
                  {{-- <div class="count">{{$product_count}}</div> --}}
                  <h3>Quản lý sản phẩm</h3>
                  </a>
                  {{-- <p>Lorem ipsum psdea itgum rixt.</p> --}}
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                  <a href="{{URL::to('admin/news')}}">
                  <div class="icon"><i class="fa fa-newspaper-o"></i>
                  </div>
                  {{-- <div class="count">{{$news_count}}</div> --}}
                  
                  <h3>Quản lý tin tức</h3>
                  </a>
                  {{-- <p>Lorem ipsum psdea itgum rixt.</p> --}}
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                  <a href="{{URL::to('admin/albums')}}">
                  <div class="icon"><i class="fa fa-image"></i>
                  </div>
                  {{-- <div class="count">{{$album_count}}</div> --}}
                  
                  <h3>Quản lý thư viện ảnh</h3>
                  </a>
                  {{-- <p>Lorem ipsum psdea itgum rixt.</p> --}}
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                  <a href="{{URL::to('admin/videos')}}">
                  <div class="icon"><i class="fa fa-video-camera"></i>
                  </div>
                  {{-- <div class="count">{{$video_count}}</div> --}}
                  
                  <h3>Quản lý thư viện video</h3>
                  </a>
                  {{-- <p>Lorem ipsum psdea itgum rixt.</p> --}}
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                  <a href="{{URL::to('admin/menus')}}">
                  <div class="icon"><i class="fa fa-bars"></i>
                  </div>
                  {{-- <div class="count">{{$menu_count}}</div> --}}
                  
                  <h3>Quản lý menu</h3>
                  </a>
                  {{-- <p>Lorem ipsum psdea itgum rixt.</p> --}}
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                  <a href="{{URL::to('admin/contacts')}}">
                  <div class="icon"><i class="fa fa-envelope-o"></i>
                  </div>
                  {{-- <div class="count">{{$contact_count}}</div> --}}
                  
                  <h3>Khách hàng liên hệ</h3>
                  </a>
                  {{-- <p>Lorem ipsum psdea itgum rixt.</p> --}}
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection