@extends('layout')
@section('content')

<style>
   .page_lienhe h2 {
      color: #151515;
      font-size: 2.8em;
      font-weight: 800;
      font-family: Nunito;
      line-height: 1.2;
   }

   .page_lienhe h3 {
      color: #404044;
      font-size: 1.8em;
      margin-bottom: 20px;
      font-weight: 600;
      font-family: inherit;
   }
</style>
<!-- page wrapper starts -->
<div id="page-wrapper"><!-- Jumbotron -->
   <h1 class="tieu-de-trang" style="display:none">Liên hệ</h1>
   <div class="jumbotron jumbotron-fluid">
      <div class="container">
         <!-- jumbo-heading -->
         <div class="jumbo-heading" data-aos="fade-down">
            <p>Liên hệ</p>
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
               </ol>
            </nav>
            <!-- /breadcrumb -->
         </div>
         <!-- /jumbo-heading -->
      </div>
      <!-- /container -->
   </div>
   <!-- /jumbotron -->
   <!-- ==== Page Content ==== -->
   <div class="page page_lienhe pb-0">
      <div class="container block-padding">
         <div class="row">
            <div class="col-lg-5 justify-content-center align-self-center text-lg-left text-sm-center text-xs-center">
               <h2>Liên lạc</h2>
               <span class="h7 mt-0">Contact us today for a quote</span>
               <p class="mt-2">Etiam rhoncus leo a dolor placerat, nec elem entum ipsum conval Qui quaerat fugit quas
                  veniam perferendis repudiandae sequi, dolore quisquam illum.</p>
               <!-- contact icons-->
               <ul class="list-unstyled mt-3 list-contact colored-icons">
                  <li><i class="fa fa-envelope margin-icon"></i><a
                        href="mailto:admin@demo.web30s.vn">admin@demo.web30s.vn</a></li>
                  <li><i class="fa fa-phone margin-icon"></i>1900 9477</li>
                  <li><i class="fa fa-map-marker margin-icon"></i>344 Huỳnh Tấn Phát, Tân Thuận Tây, Q.7, HCM</li>
               </ul>
               <!-- /list-->
            </div>
            <!-- /col-lg- -->
            <!-- contact-info-->
            <div class="contact-info col-lg-6 offset-lg-1 res-margin notepad">
               <h3>Gửi tin nhắn cho chúng tôi</h3>
               @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
               @php
               $message = Session::get('message');
               if($message){
               echo '<span class="text-alert">'.$message.'</span>';
               Session::put('message',null);
               }
               @endphp
               <!-- Form Starts -->
               <form class="" enctype="multipart/form-data" action="{{URL::to('admin/send-contact')}}" method="post"
                  novalidate>
                  {{ csrf_field() }}
                  <div id="contact_form">
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-6">
                              <label>Họ & tên<span class="required">*</span></label>
                              <input type="text" name="name" value="{{old('name')}}" class="form-control input-field" required="">
                           </div>
                           <div class="col-md-6">
                              <label>Địa chỉ Email <span class="required"></span></label>
                              <input type="email" name="email" value="{{old('email')}}" class="form-control input-field" required="">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <label>Số điện thoại<span class="required">*</span></label>
                              <input type="number" name="phone" value="{{old('phone')}}" class="form-control input-field" required="">
                           </div>
                           <div class="col-md-6">
                              <label>Địa chỉ</label>
                              <input type="text" name="address" value="{{old('address')}}" class="form-control input-field">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <label>Tiêu đề<span class="required"></span></label>
                              <input type="text" name="title" value="{{old('title')}}" class="form-control input-field" required="">
                           </div>
                           <div class="col-md-12">
                              <label>Nội dung</label>
                              <textarea name="content" id="message" 
                              class="textarea-field form-control" rows="3">{{old('content')}}</textarea>
                           </div>
                           <div class="col-md-12">
                              <label>Ghi chú</label>
                              <input type="text" name="note" value="{{old('note')}}" class="form-control input-field">
                           </div>
                        </div>
                        <button type="submit" id="submit_btn" value="Submit" class="btn btn-primary">Gửi tin
                           nhắn</button>
                     </div>
                     <!-- /form-group-->
                     <!-- Contact results -->
                     <div id="contact_results"></div>
                  </div>
                  <!-- /contact)form-->
               </form>
            </div>
            <!-- /contact-info-->
         </div>
         <!-- /row -->
      </div>
      <!-- /container -->
      <!-- map-->
      <div id="maps" class="container-fluid">
         <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.8146167973664!2d106.72653431535171!3d10.748766462641512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3ad1865b55%3A0x312e2babd77bc83b!2zQ8O0bmcgdHkgUC5BIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1655085190412!5m2!1svi!2s"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <!-- /map-->
   </div>
   <!-- /page -->
</div>


@endsection