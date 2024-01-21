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
							<a href="{{URL::to('/admin/customers')}}" class="btn btn-primary btn-sm"> <i class="fa fa-sign-out"></i> Quay lại </a>
						</ul>
						<div class="clearfix"></div>
					</div>

					<div class="x_content LVR_list-admin">
						@if ($data == '')
							{!! Form::open(['route'=>'admin/customers.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
							{{ csrf_field() }}
						@else
							{!! Form::open(['route'=>['admin/customers.update',$data->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
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
													$username = 'username';
													$fullname = 'fullname';
													$email = 'email';
                          $phone = 'phone';
                          $balance = 'balance';
                          $password = 'password';
                          $old_password = 'old_password';
                          $re_password = 're_password';

													$username_value = isset($data['username']) ? $data['username'] : "";
													$fullname_value = isset($data['fullname']) ? $data['fullname'] : "";
													$email_value = isset($data['email']) ? $data['email'] : "";
                          $phone_value = isset($data['phone']) ? $data['phone'] : "";
                          $balance_value = isset($data['balance']) ? $data['balance'] : "";
													$old_password_value = isset($data['password']) ? $data['password'] : "";
											@endphp
		
											<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Tên đăng nhập <span class="required">*</span></label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input class="form-control" id="customer-username" oninput="validateUsername()" data-validate-length-range="6"
															data-validate-words="2" name="{{$username}}" value="{{old($username, $username_value)}}" placeholder="" required="required" />
													</div>
												</div>
												@error($username)
													<span style="color: red;">{{$message}}</span>
												@enderror	
		
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Họ và tên</label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input class="form-control"  data-validate-length-range="6"
															data-validate-words="2" name="{{$fullname}}" value="{{old($fullname, $fullname_value)}}" placeholder="" />
													</div>
												</div>
		
												<div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Email<span class="required">*</span></label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input type="email" class="form-control"  data-validate-length-range="6"
															data-validate-words="2" name="{{$email}}" value="{{old($email, $email_value)}}" required="required"/>
													</div>
												</div>
												@error($email)
														<span style="color: red;">{{$message}}</span>
												@enderror		

                        <div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Số điện thoại<span class="required">*</span></label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input class="form-control" id="phone-number" oninput="validatePhoneNumber()" maxlength="10" 
                            name="{{$phone}}" value="{{old($phone, $phone_value)}}" required="required"/>
													</div>
												</div>
												@error($phone)
														<span style="color: red;">{{$message}}</span>
												@enderror	

                        <div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Số dư<span class="required">*</span></label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input class="form-control" id="price" data-validate-length-range="6"
															data-validate-words="2" name="{{$balance}}" value="{{old($balance, $balance_value)}}" placeholder="VND" required="required"/>
													</div>
												</div>
												@error($balance)
														<span style="color: red;">{{$message}}</span>
												@enderror	
                        @if ($data == '')
                        <div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Mật khẩu<span class="required">*</span></label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input type="password" class="form-control"  data-validate-length-range="6"
															data-validate-words="2" name="{{$password}}" required="required"/>
													</div>
												</div>
                        @else
                        <div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Mật khẩu cũ<span class="required">*</span></label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input type="password" class="form-control"  data-validate-length-range="6"
															data-validate-words="2" name="{{$old_password}}"/>
													</div>
												</div>
                        <div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Nhập mật khẩu mới</label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input type="password" class="form-control"  data-validate-length-range="6"
															data-validate-words="2" name="{{$password}}" />
													</div>
												</div>
                        <div class="field item form-group">
													<label class="col-form-label col-md-2 col-sm-2">Nhập lại mật khẩu mới<span class="required">*</span></label>
													<div class="col-md-10 col-sm-10 input-group input-group-sm">
														<input type="password" class="form-control"  data-validate-length-range="6"
															data-validate-words="2" name="{{$re_password}}"/>
													</div>
												</div>
                        @endif
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

