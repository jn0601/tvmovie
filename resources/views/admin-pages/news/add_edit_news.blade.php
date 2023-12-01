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
							<a href="{{URL::to('/admin/news')}}" class="btn btn-primary btn-sm"> <i class="fa fa-sign-out"></i> Quay lại </a>
						</ul>
						<div class="clearfix"></div>
					</div>

					<div class="x_content LVR_list-admin">
						@if ($data == '')
						{{-- <form class="" enctype="multipart/form-data" action="{{ route('admin/news.store')}}" method="post" novalidate> --}}
							{!! Form::open(['route'=>'admin/news.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
							{{ csrf_field() }}
						@else
						{{-- <form class="" enctype="multipart/form-data" action="{{ route('admin/news.update',['admin/news/{news}' => $data->id]) }}" method="post" novalidate> --}}
							{!! Form::open(['route'=>['admin/news.update',$data->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
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
													$content = 'content';
													$seoName = 'seo_name';

													$name_value = isset($data['name']) ? $data['name'] : "";
													$desc_value = isset($data['desc']) ? $data['desc'] : "";
													$content_value = isset($data['content']) ? $data['content'] : "";
													$seo_name_value = isset($data['seo_name']) ? $data['seo_name'] : "";
											@endphp
		
											<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Tiêu đề <span class="required">*</span></label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input class="form-control" id="slug" onkeyup="ChangeToSlug();" data-validate-length-range="6"
															data-validate-words="2" name="{{$name}}" value="{{old($name, $name_value)}}" placeholder="" required="required" />
														@error($name)
															<span style="color: red;">{{$message}}</span>
														@enderror	
													</div>
												</div>
		
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Mô tả</label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<textarea style="resize: none; width: 100%" id="ckeditor1" rows="8" name="{{$desc}}" >{{old($desc, $desc_value)}}</textarea>
													</div>
												</div>
		
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Nội dung</label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<textarea style="resize: none; width: 100%" id="ckeditor2" rows="10"
															name="{{$content}}">{{old($content, $content_value)}}</textarea>
													</div>
												</div>
		
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Đường dẫn<span class="required">*</span></label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input class="form-control" id="convert_slug" data-validate-length-range="6"
															data-validate-words="2" name="{{$seoName}}" value="{{old($seoName, $seo_name_value)}}"/>
														@error($seoName)
															<span style="color: red;">{{$message}}</span>
														@enderror	
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="LVR_line-content"></div>

							<div class="form-group row">
								<div class="col-md-3 title">
									Hình ảnh
								</div>
								<div class="col-md-9">
									<div class="box-item-tab-content-image">
										<div class="field item lvr_upload-images">
											<div class="col-md-12 col-sm-12">
												<div class="lvr_box-upload-image ">
													<input class="images_file"
													@if ($data != '')
													value="{{$data->image}}"
													@endif
													type="file" name="img" onchange="loadFile(event)">
													
													<div class="lvr_box-images">
														<a type="button" class="lvr_upload-btn">
															<i class="fa fa-upload"></i>
															Chọn ảnh
														</a>
														@if ($data != '')
														<ul class="lvr_display-image">
															<li class="lvr_item-image">
																<img class="lvr_child-multiple-image" 
																src="{{URL::to('public/backend/uploads/news/'.$data->image)}}" alt="">
															</li>
														</ul>
														@endif
														<ul class="lvr_display-image d-none">

														</ul>
														<a type="button" class="lvr_delete-images d-none">
															<i class="fa fa-trash"> Xóa</i>
														</a>
													</div>
													@error('img')
													<span style="color: red;">{{$message}}</span>
													@enderror	
													<!-- <div class="preview-upload">
														<img id='image_upload_clone' class='d-none' class="group_img_review"/>
													</div> -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="LVR_line-content"></div>
							<div class="form-group row">
								<div class="col-md-3 title">
									Tính năng
								</div>
								<div class="col-md-9">
									<div class="box-item-tab-content-default">
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2">Chủ đề</label>
											<div class="col-md-10 col-sm-10 input-group input-group-sm">
												<select name="category_id" class="custom-select">
													<option value="0">Không có danh mục</option>
													@if ($data == '')
													@foreach($listCategory as $key => $value)
														<option value="{{$value->id}}">
															@php
																if($value->level == 2){
																	echo '&nbsp ↪';
																}elseif ($value->level == 3){
																	echo '&nbsp &nbsp &nbsp ↪';
																}
															@endphp
															{{$value->name}}
														</option>
													@endforeach
													@else
													@foreach($listCategory as $key => $value)
														<option {{$data->category_id == $value->id ? 'selected' : ''}} value="{{$value->id}}">
															@php
																if($value->level == 2){
																	echo '&nbsp ↪';
																}elseif ($value->level == 3){
																	echo '&nbsp &nbsp &nbsp ↪';
																}
															@endphp
															{{$value->name}}
														</option>
													@endforeach
													@endif
												</select>
											</div>
										</div>

										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2">Đặc điểm
											</label>
			
											<div class="col-md-10 col-sm-10 input-group">
												<select name="options[]" class="form-control js-example-templating" multiple="multiple">
													@if ($data != '')
													<option {{ in_array(1, explode(",",$data->options)) ? 'selected' : ''}} value="1">Mới</option>
													<option {{ in_array(2, explode(",",$data->options)) ? 'selected' : ''}} value="2">Nổi bật</option>
													<option {{ in_array(3, explode(",",$data->options)) ? 'selected' : ''}} value="3">Đặc biệt</option>
													<option {{ in_array(4, explode(",",$data->options)) ? 'selected' : ''}} value="4">Hot</option>
													@else
													<option value="1">Mới</option>
													<option value="2">Nổi bật</option>
													<option value="3">Đặc biệt</option>
													<option value="4">Hot</option>
													@endif
												</select>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2">Trạng thái</label>
											<div class="col-md-10 col-sm-10 input-group input-group-sm">
												<select name="status" class="form-control">
													@if ($data != '')
													<option {{$status}} value="0">Không hoạt động</option>
													<option {{$status}} value="1">Hoạt động</option>
													@else
													<option value="0">Không hoạt động</option>
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
									Seo meta
								</div>
								<div class="col-md-9">
									<div class="box-item-tab-content">
										<div class="tab-content" id="myTabContent">
											@php
													$tags = 'tags';
													$metaTitle = 'meta_title';
													$metaDesc = 'meta_desc';
													$metaKeyword = 'meta_keyword';

													$tags_value = isset($data['tags']) ? $data['tags'] : '';
													$meta_title_value = isset($data['meta_title']) ? $data['meta_title'] : '';
													$meta_desc_value = isset($data['meta_desc']) ? $data['meta_desc'] : '';
													$meta_keyword_value = isset($data['meta_keyword']) ? $data['meta_keyword'] : '';
											@endphp
											<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Tags </label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input id="tags-input" data-role="tagsinput" class="form-control" data-validate-length-range="6" data-validate-words="2"
														 name="{{$tags}}" value="{{old($tags, $tags_value)}}"  />
													</div>
												</div>
												
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Meta title</label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input class="form-control" data-validate-length-range="6" data-validate-words="2"
														 name="{{$metaTitle}}" value="{{old($metaTitle, $meta_title_value)}}" />
													</div>
												</div>
												
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Meta
														description </label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input class="form-control" data-validate-length-range="6" data-validate-words="2"
														 name="{{$metaDesc}}" value="{{old($metaDesc, $meta_desc_value)}}"/>
													</div>
												</div>
												
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Meta
														keyword </label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input class="form-control" data-validate-length-range="6" data-validate-words="2"
														 name="{{$metaKeyword}}" value="{{old($metaKeyword, $meta_keyword_value)}}"/>
													</div>
												</div>
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

