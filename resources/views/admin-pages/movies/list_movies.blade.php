@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách phim</h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="{{URL::to('/admin/movies/create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới</a>
            </ul>
            <div class="clearfix"></div>
            {{-- search bar --}}
            @php
            if (!isset($search_value)) {
              $search_value['name'] = '';
              $search_value['status'] = '';
            }
            //dd($search_value['status'] == 0 ? 'yes' : 'no');
            @endphp
            {!! Form::open(['url'=>'admin/movie-search', 'method'=>'get', 'enctype'=>'multipart/form-data']) !!}
            <div class="LVR_box-search">
              <div class="input-group input-group-sm">
                <div class="col-md-1 col-sm-1 input-group input-group-sm">
                  <select name="status" class="form-control">
                    <option value="">Trạng thái</option>
                    <option {{$search_value['status'] == '1' ? 'selected' : ''}} value="1">Hoạt động</option>
                    <option {{$search_value['status'] == '0' ? 'selected' : ''}} value="0">Không Hoạt động</option>
                  </select>
                </div>
                <div class="col-md-2 col-sm-2 input-group input-group-sm">
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
                  <th class="title-space">Tập phim</th>
                  <th class="text-center">Chủ đề</th>
                  <th class="text-center">Thể loại</th>
                  <th class="text-center">Trạng thái</th>
                  <th class="text-right">Tác vụ</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $movies)
                <tr>
                  <td class="text-center">
                    {{$movies->display_order}}
                  </td>
                  <td class="text-center">
                    <img src="{{URL::to('public/backend/uploads/movies/'.$movies->image)}}" class="list-image">
                  </td>
                  <td class="title-space">
                    <a>{{ $movies->name }}</a>
                    <br />
                    <small>Cập nhật ngày {{$movies->date_updated}}</small> 
                  </td>

                  <td class="title-space">
                    <a href="{{URL::to('admin/episodes/'.$movies->seo_name)}}">Thêm tập phim</a>
                  </td>
                  
                  <td class="text-center">
                    @if($movies->category_id != 0)
                        @foreach($dataCategory as $key => $cate)
                          @if($cate->id == $movies->category_id)
                            <span>{{$cate->name}}</span>
                          @endif
                        @endforeach
                    @endif
                  </td>
                  <td class="text-center">
                    {{-- duyệt table phụ --}}
                    @foreach($listGenre as $key => $value)
                      {{-- nếu tìm thấy id ở đó --}}
                      @if ($value->movie_id == $movies->id)
                        {{-- tìm tên thể loại ở table chính --}}
                        @foreach($mainGenre as $key => $value2)
                          @if ($value2->id == $value->genre_id)
                            <span>- {{$value2->name}}</span><br>
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                  </td>
                  <td class="text-center"><span class="text-ellipsis">
                      {{-- <a>{{$movies->status == 1 ? 'Hoạt động' : 'Không hoạt động'}}</a> --}}
                      <?php if ($movies->status == 1) { ?>
                        <a href="{{URL::to('/admin/unactivate-movies-status/'.$movies->id)}}"><span class="fa fa-toggle-on status_button"></span></a>
                        <?php } else { ?>
                        <a href="{{URL::to('/admin/activate-movies-status/'.$movies->id)}}"><span class="fa fa-toggle-off status_button"></span></a>
                        <?php } ?>
                    </span>
                  </td>
                  <td class="text-right">
                    <a title="Sửa" href="{{URL::to('admin/movies/'.$movies->id .'/edit')}}"
                      class="btn btn-info btn-xs btn-sm"><i class="fa fa-pencil"></i> </a>
                    
                    <form class="form_delete" method="post" action="{{route('admin/movies.destroy',$movies->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
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