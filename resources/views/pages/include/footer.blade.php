<footer id="footer" class="clearfix">
  <div class="container footer-columns">
     <div class="row container">
        @foreach($footer as $key => $value)
        <div class="widget about col-xs-12 col-sm-4 col-md-4">
           <div class="footer-logo">
              <img class="img-responsive" src="{{URL::to('public/backend/uploads/banners/'.$value->image)}}" alt="{{$value->name}}" />
           </div>
           Liên hệ QC: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e5958d8c888d849ccb868aa58288848c89cb868a88">[email&#160;protected]</a>
        </div>
        @endforeach
     </div>
  </div>
</footer>