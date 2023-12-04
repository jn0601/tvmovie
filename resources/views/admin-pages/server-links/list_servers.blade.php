@extends('admin_layout')
@section('admin_content')

<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách server phim</h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="{{URL::to('/admin/server-links/create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới</a>
            </ul>
            <div class="clearfix"></div>
          </div>

          
          <div class="x_content LVR_list-admin">
            <!-- <p>Simple table with project listing with progress and editing options</p> -->

            <!-- start project list -->
            <table class="table table-striped projects bulk_action">
              <thead>
                <tr>
                  <th class="text-left">STT</th>
                  <th class="title-space">Tiêu đề</th>
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
                    <a>{{$item->name}}</a>
                    <br />
                    <small>Cập nhật ngày {{$item->date_updated}}</small> 
                  </td>
                  <td class="text-center"><span class="text-ellipsis">
                      <?php if ($item->status == 1) { ?>
                        <a href="{{URL::to('/admin/unactivate-servers-status/'.$item->id)}}"><span class="fa fa-toggle-on status_button"></span></a>
                        <?php } else { ?>
                        <a href="{{URL::to('/admin/activate-servers-status/'.$item->id)}}"><span class="fa fa-toggle-off status_button"></span></a>
                        <?php } ?>
                    </span>
                  </td>
                  <td class="text-right">
                    <a title="Sửa" href="{{URL::to('admin/server-links/'.$item->id .'/edit')}}"
                      class="btn btn-info btn-xs btn-sm"><i class="fa fa-pencil"></i> </a>
                    
                    <form class="form_delete" method="post" action="{{route('admin/server-links.destroy',$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
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