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
							<a href="{{URL::to('/admin/episodes/'.$movie_seo_name)}}" class="btn btn-primary btn-sm"> <i class="fa fa-sign-out"></i> Quay lại </a>
						</ul>
						<div class="clearfix"></div>
					</div>

					<div class="x_content LVR_list-admin">
						@if ($data == '')
						{{-- <form class="" enctype="multipart/form-data" action="{{ route('admin/episodes.store')}}" method="post" novalidate> --}}
							{!! Form::open(['route'=>'admin/episodes.store', 'id'=>'myForm', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
							{{ csrf_field() }}
						@else
						{{-- <form class="" enctype="multipart/form-data" action="{{ route('admin/episodes.update',['admin/episodes/{episodes}' => $data->id]) }}" method="post" novalidate> --}}
							{!! Form::open(['route'=>['admin/episodes.update',$data->id], 'id'=>'myForm', 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
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
													$episode = 'episode';
													$subtitle_file_vi = 'subtitle_file_vi';
													$subtitle_file_en = 'subtitle_file_en';

													$name_value = isset($data['name']) ? $data['name'] : "";
													$desc_value = isset($data['desc']) ? $data['desc'] : "";
													$content_value = isset($data['content']) ? $data['content'] : "";
													$seo_name_value = isset($data['seo_name']) ? $data['seo_name'] : "";
													$episode_value = isset($data['episode']) ? $data['episode'] : "";
											@endphp
											<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Tiêu đề <span class="required">*</span></label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input class="form-control" id="slug" onkeyup="ChangeToSlug();" data-validate-length-range="6"
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
															data-validate-words="2" name="{{$seoName}}" value="{{old($seoName, $seo_name_value)}}" required="required"/>
													</div>
												</div>
												@error($seoName)
													<span style="color: red;">{{$message}}</span>
												@enderror	
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="LVR_line-content"></div>

							<div class="form-group row">
								<div class="col-md-3 title">
									Server Link
								</div>
								<div class="col-md-9">
									<div class="box-item-tab-content-default">
										@php
											$i = 1;
										@endphp
										@foreach($listServerLink as $key => $value)
										@php
											$server_name = $value->name;
											$link = 'link'.$i;
										@endphp

										<div class="field item form-group">
											<div class="col-md-2 col-sm-2 input-group input-group-sm">
												<input class="server-id" name="server_id[]" value="{{$value->id}}" readonly/>
												<label class="col-form-label">{{$server_name}}</label>
											</div>
											<div class="col-md-10 col-sm-10 input-group input-group-sm">
												@if($data != '')
													@foreach($listLink as $key => $linkValue)
														@php
														$link_value = $linkValue['link'];
														$checked = false;
														@endphp
														@if($linkValue->server_id == $value->id)
															<input class="form-control" data-validate-length-range="6"
																data-validate-words="2" name="{{$link}}" id="{{$link}}" value="{{old($link, $link_value)}}" 
																placeholder="<iframe> width=100% height=500 allowfullscreen ..</iframe>"/>
														@php
															$checked = true;
														@endphp
														@break
														@endif
													@endforeach
													@if($checked == false)
														<input class="form-control" data-validate-length-range="6"
														data-validate-words="2" name="{{$link}}" id="{{$link}}" value="{{old($link)}}" 
														placeholder="<iframe> width=100% height=500 allowfullscreen ..</iframe>"/>
													@endif
												@else
												<input class="form-control" data-validate-length-range="6"
												data-validate-words="2" name="{{$link}}" id="{{$link}}" value="{{old($link)}}" 
												placeholder="<iframe> width=100% height=500 allowfullscreen ..</iframe>"/>
												@endif
											</div>
										</div>

										@php
											$i++;
										@endphp
										@endforeach
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
											<label class="col-form-label col-md-2 col-sm-2">Thuộc về phim</label>
											<div class="col-md-10 col-sm-10 input-group input-group-sm">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="movie_seo_name" value="{{$movie_seo_name}}" readonly/>
											</div>
										</div>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2">Số tập</label>
											<div class="col-md-10 col-sm-10 input-group input-group-sm">
												<input class="form-control" data-validate-length-range="6"
													data-validate-words="2" name="{{$episode}}" value="{{old($episode, $episode_value)}}" placeholder="1,2,3,..." required="required"/>
											</div>
										</div>

										@if ($data == '')
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2">Phụ đề tiếng Việt</label>
											<div class="col-md-10 col-sm-10 input-group input-group-sm">
												<input class="form-control" type="file" data-validate-length-range="6"
													data-validate-words="2" name="{{$subtitle_file_vi}}" value="{{old($subtitle_file_vi)}}" placeholder=""/>
											</div>
										</div>

										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2">Phụ đề tiếng Anh</label>
											<div class="col-md-10 col-sm-10 input-group input-group-sm">
												<input class="form-control" type="file" data-validate-length-range="6"
													data-validate-words="2" name="{{$subtitle_file_en}}" value="{{old($subtitle_file_en)}}" placeholder=""/>
											</div>
										</div>
										@else
										@php
											$checked_vietsub = false;
											$checked_engsub = false;
										@endphp
										@foreach($listSub as $key => $sub)
										@if ($sub->name == "Tiếng Việt")
										<span class="checked-sub">Đã có phụ đề Tiếng Việt</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2">Phụ đề tiếng Việt</label>
											<div class="col-md-10 col-sm-10 input-group input-group-sm">
												<input class="form-control" type="file" data-validate-length-range="6"
													data-validate-words="2" name="{{$subtitle_file_vi}}" value="{{old($subtitle_file_vi)}}" placeholder=""/>
											</div>
										</div>
										@php
											$checked_vietsub = true;
										@endphp
										@else
										<span class="checked-sub">Đã có phụ đề Tiếng Anh</span>
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2">Phụ đề tiếng Anh</label>
											<div class="col-md-10 col-sm-10 input-group input-group-sm">
												<input class="form-control" type="file" data-validate-length-range="6"
													data-validate-words="2" name="{{$subtitle_file_en}}" value="{{old($subtitle_file_en)}}" placeholder=""/>
											</div>
										</div>
										@php
											$checked_engsub = true;
										@endphp
										@endif
										@endforeach
										@if ($checked_vietsub == false)
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2">Phụ đề tiếng Việt</label>
											<div class="col-md-10 col-sm-10 input-group input-group-sm">
												<input class="form-control" type="file" data-validate-length-range="6"
													data-validate-words="2" name="{{$subtitle_file_vi}}" value="{{old($subtitle_file_vi)}}" placeholder=""/>
											</div>
										</div>
										@endif
										@if ($checked_engsub == false)
										<div class="field item form-group">
											<label class="col-form-label col-md-2 col-sm-2">Phụ đề tiếng Anh</label>
											<div class="col-md-10 col-sm-10 input-group input-group-sm">
												<input class="form-control" type="file" data-validate-length-range="6"
													data-validate-words="2" name="{{$subtitle_file_en}}" value="{{old($subtitle_file_en)}}" placeholder=""/>
											</div>
										</div>
										@endif
										@endif
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
										<button type='submit' onclick="validateInputs()" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Lưu</button>
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
@push('scripts')
<script type="text/javascript">
	var numberOfInputs = {{count($listServerLink)}};
	
	function validateInputs() {
			// Check if at least one input has a value
			var atLeastOneLinkHasValue = false;
			for (var index = 1; index <= numberOfInputs; index++) {
					var linkValue = document.getElementById('link' + index).value;

					if (linkValue) {
							// At least one input has a value, allow submission
							// document.getElementById('myForm').submit();
							// return; // Exit the loop early
							atLeastOneLinkHasValue = true;
							break; // Exit the loop early
					}
			}
			if (!atLeastOneLinkHasValue) {
				// No inputs have a value, show an alert or take other action
				alert('Nhập ít nhất 1 link');
				// Prevent form submission
				event.preventDefault();
      }
	}
</script>
@endpush
