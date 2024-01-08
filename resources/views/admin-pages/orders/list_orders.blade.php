@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách đơn đăng kí</h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="{{URL::to('/admin/orders/create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới</a>
            </ul>
            <div class="clearfix"></div>
            {{-- search bar --}}
            @php
            if (!isset($search_value)) {
              $search_value['code'] = '';
              $search_value['status'] = '';
            }
            //dd($search_value['status'] == 0 ? 'yes' : 'no');
            @endphp
            {!! Form::open(['url'=>'admin/order-search', 'method'=>'get', 'enctype'=>'multipart/form-data']) !!}
            <div class="LVR_box-search">
              <div class="input-group input-group-sm">
                <div class="col-md-2 col-sm-2 input-group input-group-sm">
                  <select name="status" class="form-control">
                    <option value="">Trạng thái</option>
                    <option {{$search_value['status'] == '1' ? 'selected' : ''}} value="1">Đã xử lí</option>
                    <option {{$search_value['status'] == '2' ? 'selected' : ''}} value="2">Chưa xử lí</option>
                  </select>
                </div>
                <div class="col-md-2 col-sm-2 input-group input-group-sm">
                  <input type="text" name="code" value="{{$search_value['code'] ? $search_value['code'] : ''}}"
                  class="form-conmtrol search-bar" placeholder="Nhập mã đăng kí cần tìm...">
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
                  <th class="title-space">Mã đơn đăng kí</th>
                  <th class="text-center">Trạng thái</th>
                  <th class="text-right">Tác vụ</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $item)
                <tr>
                  <td class="text-left">
                    {{$item->display_order}}
                  </td>
                  <td class="title-space">
                    <a>{{$item->code}}</a>
                    <br />
                    <small>Ngày {{$item->date_updated}}</small> 
                  </td>
                  <td class="text-center"><span class="text-ellipsis">
                      <a>{{$item->status == 1 ? 'Đã xử lí' : 'Chưa xử lí'}}</a>
                  </td>
                  <td class="text-right">
                    <a title="Sửa" href="{{URL::to('admin/orders/'.$item->id .'/edit')}}"
                      class="btn btn-info btn-xs btn-sm"><i class="fa fa-pencil"></i> </a>
                    
                    <form class="form_delete" method="post" action="{{route('admin/orders.destroy',$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
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