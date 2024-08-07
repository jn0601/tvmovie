@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách danh mục tin tức</h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="{{URL::to('/admin/news-categories/create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới</a>
            </ul>
            <div class="clearfix"></div>
            {{-- search bar --}}
            @php
            if (!isset($search_value)) {
              $search_value['name'] = '';
              $search_value['status'] = '';
              $search_value['representative'] = '';
            }
            @endphp
            {!! Form::open(['url'=>'admin/news-category-search', 'method'=>'get', 'enctype'=>'multipart/form-data']) !!}
            <div class="LVR_box-search">
              <div class="input-group input-group-sm">
                <div class="col-md-2 col-sm-2 input-group input-group-sm">
                  <select name="status" class="form-control">
                    <option value="">Trạng thái</option>
                    <option {{$search_value['status'] == '1' ? 'selected' : ''}} value="1">Hoạt động</option>
                    <option {{$search_value['status'] == '2' ? 'selected' : ''}} value="2">Không Hoạt động</option>
                  </select>
                </div>
                <div class="col-md-2 col-sm-2 input-group input-group-sm">
                  <select name="representative" class="form-control">
                    <option value="">Tiêu biểu</option>
                    <option {{$search_value['representative'] == '1' ? 'selected' : ''}} value="1">Có</option>
                    <option {{$search_value['representative'] == '2' ? 'selected' : ''}} value="2">Không</option>
                  </select>
                </div>
                <div class="col-md-3 col-sm-3 input-group input-group-sm">
                  <input type="text" name="name" value="{{$search_value['name'] ? $search_value['name'] : ''}}"
                  class="form-conmtrol search-bar" placeholder="Nhập tên cần tìm...">
                </div>
                <span class="input-group-btn">
                  <button class="btn btn-info btn-sm" type="submit">
                    <i class="fa fa-search"></i> Tìm kiếm
                  </button>
                </span>
              </div>
            </div>
            {!! Form::close() !!}


          </div>

          
          <div class="x_content LVR_list-admin">
            <!-- <p>Simple table with project listing with progress and editing options</p> -->

            <!-- start project list -->
            <table class="table table-striped projects bulk_action">
              <thead>
                <tr>
                  <th class="text-center">STT</th>
                  <th class="text-center">Hình ảnh</th>
                  <th class="title-space">Tiêu đề</th>
                  {{-- <th class="text-center">Chủ đề</th> --}}
                  <th class="text-center">Tiêu biểu</th>
                  <th class="text-center">Trạng thái</th>
                  <th class="text-right">Tác vụ</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $news_categories)
                <tr>
                  <td class="text-center">
                    {{$news_categories->display_order}}
                  </td>
                  <td class="text-center">
                    <img src="{{URL::to('public/backend/uploads/news-categories/'.$news_categories->image)}}" class="list-image">
                  </td>
                  <td class="title-space">
                    @if($news_categories->parent_id != 0)
                    <a class="child-category"> &nbsp ↪ {{ $news_categories->name }}</a>
                    @else
                    <a>{{$news_categories->name}}</a>
                    @endif
                    <!-- <small>Created 01.01.2015</small> -->
                  </td>
                  
                  {{-- <td class="text-center">
                    @if($news_categories->parent_id != 0)
                      <a>↪ {{$news_categories->name}}</a>
                    @else
                      <a>{{$news_categories->name}}</a>
                    @endif
                  </td> --}}
                  <td class="text-center"><span class="text-ellipsis">
                    <?php if ($news_categories->representative == 1) { ?>
                      <a href="{{URL::to('/admin/unactivate-news-categories-representative/'.$news_categories->id)}}"><span class="fa fa-toggle-on status_button"></span></a>
                      <?php } else { ?>
                      <a href="{{URL::to('/admin/activate-news-categories-representative/'.$news_categories->id)}}"><span class="fa fa-toggle-off status_button"></span></a>
                      <?php } ?>
                  </span>
                </td>
                  <td class="text-center"><span class="text-ellipsis">
                      <?php if ($news_categories->status == 1) { ?>
                        <a href="{{URL::to('/admin/unactivate-news-categories-status/'.$news_categories->id)}}"><span class="fa fa-toggle-on status_button"></span></a>
                        <?php } else { ?>
                        <a href="{{URL::to('/admin/activate-news-categories-status/'.$news_categories->id)}}"><span class="fa fa-toggle-off status_button"></span></a>
                        <?php } ?>
                    </span>
                  </td>
                  <td class="text-right">
                    <a title="Sửa" href="{{URL::to('admin/news-categories/'.$news_categories->id .'/edit')}}"
                      class="btn btn-info btn-xs btn-sm"><i class="fa fa-pencil"></i> </a>
                    
                    <form class="form_delete" method="post" action="{{route('admin/news-categories.destroy',$news_categories->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                          @method('delete')
                          @csrf
                          <button title="Xóa" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                    </form>
                    
                  </td>
                </tr>

                @endforeach
              </tbody>
            </table>
            <!-- end project list -->
            {{-- {{$data->links()}} --}}
          </div>
         
        </div>
       
      </div>
    </div>
  </div>
</div>
</div>

@endsection