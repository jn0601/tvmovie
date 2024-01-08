@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách danh mục banner</h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="{{URL::to('/admin/banner-categories/create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới</a>
            </ul>
            <div class="clearfix"></div>
            {{-- search bar --}}
            @php
            // if (!isset($search_value)) {
            //   $search_value['name'] = '';
            //   $search_value['status'] = '';
            // }
            //dd($search_value['status'] == 0 ? 'yes' : 'no');
            @endphp
            {{-- {!! Form::open(['url'=>'admin/banner-category-search', 'method'=>'get', 'enctype'=>'multipart/form-data']) !!}
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
            {!! Form::close() !!} --}}


          </div>

          
          <div class="x_content LVR_list-admin">
            <!-- <p>Simple table with project listing with progress and editing options</p> -->

            <!-- start project list -->
            <table class="table table-striped projects bulk_action">
              <thead>
                <tr>
                  <th class="text-left">STT</th>
                  <th class="title-space">Tiêu đề</th>
                  <th class="text-right">Tác vụ</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $category)
                <tr>
                  <td class="text-left">
                    {{$category->display_order}}
                  </td>
                  <td class="title-space">
                    <a>{{$category->name}}</a>
                  </td>
                  <td class="text-right">
                    <a title="Sửa" href="{{URL::to('admin/banner-categories/'.$category->id .'/edit')}}"
                      class="btn btn-info btn-xs btn-sm"><i class="fa fa-pencil"></i> </a>
                    
                    <form class="form_delete" method="post" action="{{route('admin/banner-categories.destroy',$category->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
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
            
          </div>
         
        </div>
        {{ $data->links() }}
      </div>
    </div>
  </div>
</div>
</div>

@endsection