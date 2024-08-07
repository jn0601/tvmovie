@extends('admin_layout')
@section('admin_content')
@php  
	if ($data != '') {
		$status = $data->status == 1 ? 'selected' : '';
	}
@endphp

<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>
							@if ($data == '')
							Thêm mới
							@else
							Cập nhật
							@endif
						</h2>
						<ul class="nav navbar-right panel_toolbox">
							<a href="{{URL::to('/admin/roles')}}" class="btn btn-primary btn-sm"> <i class="fa fa-sign-out"></i> Quay lại </a>
						</ul>
						<div class="clearfix"></div>
					</div>

					<div class="x_content LVR_list-admin">
						@if ($data == '')
						{{-- <form class="" enctype="multipart/form-data" action="{{ route('admin/roles.store')}}" method="post" novalidate> --}}
							{!! Form::open(['route'=>'admin/roles.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
							{{ csrf_field() }}
						@else
						{{-- <form class="" enctype="multipart/form-data" action="{{ route('admin/roles.update',['admin/roles/{roles}' => $data->id]) }}" method="post" novalidate> --}}
							{!! Form::open(['route'=>['admin/roles.update',$data->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
							{{ csrf_field() }}
						@endif
							<div class="form-group row">
								<div class="col-md-3 title">
									Thông tin cơ bản
								</div>
								<div class="col-md-9">
									<div class="box-item-tab-content">
										<div class="tab-content" id="myTabContent">
											@php
													$name = 'name';
													$desc = 'desc';

													$name_value = isset($data['name']) ? $data['name'] : "";
													$desc_value = isset($data['desc']) ? $data['desc'] : "";
											@endphp
		
											<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Tiêu đề <span class="required">*</span></label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input class="form-control" data-validate-length-range="6"
															data-validate-words="2" name="{{$name}}" value="{{old($name, $name_value)}}" placeholder="" required="required" />
													</div>
												</div>
												@error($name)
													<span style="color: red;">{{$message}}</span>
												@enderror	
		
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Mô tả</label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<textarea style="resize: none; width: 100%" id="ckeditor1" rows="8" name="{{$desc}}" >{{old($desc, $desc_value)}}</textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="LVR_line-content"></div>


							<div class="LVR_line-content"></div>
							<div class="form-group row">
								<div class="col-md-3 title">
									Tính năng
								</div>
								<div class="col-md-9">
									<div class="box-item-tab-content-default">
										
										
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2">Trạng thái</label>
											<div class="col-md-10 col-sm-10 input-group input-group-sm">
												<select name="status" class="form-control">
													@if ($data != '')
													<option {{$status}} value="2">Không hoạt động</option>
													<option {{$status}} value="1">Hoạt động</option>
													@else
													<option value="2">Không hoạt động</option>
													<option selected value="1">Hoạt động</option>
													@endif
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="LVR_line-content"></div>
							
							<div class="form-group row">
								<div class="col-md-3 title">
									
								</div>
								<div class="col-md-9">
									<div class="">
										<button type='submit' class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Lưu</button>
										<button type='reset' class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Tạo lại</button>
									</div>
								</div>
							</div>
							{{-- <div class="ln_solid">
								<div class="form-group">
									<div class="col-md-10 offset-md-2 mt-3">
										
										
									</div>
								</div>
							</div> --}}
						</form>	
          </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

