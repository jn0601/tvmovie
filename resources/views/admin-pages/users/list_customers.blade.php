@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách khách hàng</h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="{{URL::to('/admin/customers/create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới</a>
            </ul>
            <div class="clearfix"></div>
            {{-- search bar --}}
            @php
            if (!isset($search_value)) {
              $search_value['username'] = '';
              $search_value['status'] = '';
              $search_value['email'] = '';
              $search_value['phone'] = '';
            }
            //dd($search_value['status'] == 0 ? 'yes' : 'no');
            @endphp
            {!! Form::open(['url'=>'admin/customer-search', 'method'=>'get', 'enctype'=>'multipart/form-data']) !!}
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
                  <input type="text" name="username" value="{{$search_value['username'] ? $search_value['username'] : ''}}"
                  class="form-conmtrol search-bar" placeholder="Nhập tên đăng nhập cần tìm...">
                </div>
                <div class="col-md-2 col-sm-2 input-group input-group-sm">
                  <input type="text" name="email" value="{{$search_value['email'] ? $search_value['email'] : ''}}"
                  class="form-conmtrol search-bar" placeholder="Nhập email cần tìm...">
                </div>
                <div class="col-md-2 col-sm-2 input-group input-group-sm">
                  <input type="text" name="phone" value="{{$search_value['phone'] ? $search_value['phone'] : ''}}"
                  class="form-conmtrol search-bar" placeholder="Số điện thoại...">
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
                  <th class="text-left">STT</th>
                  <th class="title-space">Tên đăng nhập</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Số điện thoại</th>
                  <th class="text-center">Số dư</th>
                  <th class="text-center">Trạng thái</th>
                  <th class="text-right">Tác vụ</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $item)
                <tr>
                  <td class="text-left">
                    {{$item->id}}
                  </td>
                  <td class="title-space">
                    <a>{{$item->username}}</a>
                  </td>
                  <td class="text-center">
                    {{$item->email}}
                  </td>
                  <td class="text-center">
                    {{$item->phone}}
                  </td>
                  <td class="text-center">
                    {{$item->balance}}
                  </td>
                  <td class="text-center"><span class="text-ellipsis">
                    <?php if ($item->status == 1) { ?>
                      <a href="{{URL::to('/admin/unactivate-customers-status/'.$item->id)}}"><span class="fa fa-toggle-on status_button"></span></a>
                      <?php } else { ?>
                      <a href="{{URL::to('/admin/activate-customers-status/'.$item->id)}}"><span class="fa fa-toggle-off status_button"></span></a>
                      <?php } ?>
                  </span>
                </td>
                  <td class="text-right">
                    <a title="Sửa" href="{{URL::to('admin/customers/'.$item->id .'/edit')}}"
                      class="btn btn-info btn-xs btn-sm"><i class="fa fa-pencil"></i> </a>
                    
                    <form class="form_delete" method="post" action="{{route('admin/customers.destroy',$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
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