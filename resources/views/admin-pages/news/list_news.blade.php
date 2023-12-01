@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách tin tức</h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="{{URL::to('/admin/news/create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới</a>
            </ul>
            <div class="clearfix"></div>
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
                  <th class="text-center">Chủ đề</th>
                  <th class="text-center">Trạng thái</th>
                  <th class="text-right">Tác vụ</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $news)
                <tr>
                  <td class="text-center">
                    {{$news->display_order}}
                  </td>
                  <td class="text-center">
                    <img src="{{URL::to('public/backend/uploads/news/'.$news->image)}}" class="list-image">
                  </td>
                  <td class="title-space">
                    <a>{{ $news->name }}</a>
                    <br />
                    <!-- <small>Created 01.01.2015</small> -->
                  </td>
                  
                  <td class="text-center">
                    @if($news->category_id != 0)
                        @foreach($dataCategory as $key => $cate)
                          @if($cate->id == $news->category_id)
                            <span>{{$cate->name}}</span>
                          @endif
                        @endforeach
                    @endif
                  </td>
                  <td class="text-center"><span class="text-ellipsis">
                      {{-- <a>{{$news->status == 1 ? 'Hoạt động' : 'Không hoạt động'}}</a> --}}
                      <?php if ($news->status == 1) { ?>
                        <a href="{{URL::to('/admin/unactivate-news-status/'.$news->id)}}"><span class="fa fa-toggle-on status_button"></span></a>
                        <?php } else { ?>
                        <a href="{{URL::to('/admin/activate-news-status/'.$news->id)}}"><span class="fa fa-toggle-off status_button"></span></a>
                        <?php } ?>
                    </span>
                  </td>
                  <td class="text-right">
                    <a title="Sửa" href="{{URL::to('admin/news/'.$news->id .'/edit')}}"
                      class="btn btn-info btn-xs btn-sm"><i class="fa fa-pencil"></i> </a>
                    
                    <form class="form_delete" method="post" action="{{route('admin/news.destroy',$news->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
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
            {{$data->links()}}
          </div>
         
        </div>
       
      </div>
    </div>
  </div>
</div>
</div>

@endsection