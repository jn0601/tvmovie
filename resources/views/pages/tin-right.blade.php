
<style>
   h2.sidebar-header {
       text-align: center;
       margin-top: 30px;
       font-size: 20px;
       font-weight: 600;
       padding: 8px 10px 11px;
       color: #fff;
       font-family: inherit;
   }
</style>
<div id="sidebar" class="h-50 col-lg-3 sticky-top order-lg-1">
   <!--widget-area notepad -->
   <div class="widget-area notepad">
      <h2 class="sidebar-header">Tìm kiếm</h2>
      <div class="input-group">
         <input type="text" class="form-control" placeholder="Tìm kiếm...">
         <span class="input-group-btn">
            <button class="btn btn-secondary btn-sm" type="button">Đi!</button>
         </span>
      </div>
   </div>
   <!--/widget-area notepad -->
   <div class="widget-area notepad">
      <h2 class="sidebar-header">Danh mục</h2>
      <div class="list-group">
         @foreach($menu_tab as $tab)
            @if ($tab->parent_id != 0 && $tab->type != 91 && $tab->type != 92 && $tab->type != 93)
               <a href="{{URL::to('/'.$tab->seo_name)}}" class="list-group-item list-group-item-action"> {{$tab->name}} </a>
            @endif
         @endforeach
      </div>
   </div>
   <!--/widget-area notepad -->
   <div class="widget-area notepad">
      <h2 class="sidebar-header">Video chúng tôi</h2>
      <!-- video -->
      <div class="embed-responsive embed-responsive-4by3">
         <iframe width="100%" height="450" src="https://www.youtube.com/embed/3U0B_WC7OmY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
   </div>
   <!--/widget-area notepad -->
   <div class="widget-area notepad">
      <h2 class="sidebar-header">Tags</h2>
      <div class="tags-widget">
         <a href="#" class="badge badge-pill badge-default">Tin tức</a>
         <a href="#" class="badge badge-pill badge-default">Nhà trẻ</a>
         <a href="#" class="badge badge-pill badge-default">Các hoạt động</a>
         <a href="#" class="badge badge-pill badge-default">Giáo viên</a>
      </div>
   </div>
   <!--/widget-area notepad -->
   <div class="widget-area notepad">
      <h2 class="sidebar-header">Theo dõi chúng tôi</h2>
      <div class="contact-icon-info">
         <ul class="social-media text-center">
            <!--social icons -->
            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
         </ul>
      </div>
      <!--/contact-icon-info -->
   </div>
   <!--/widget-area notepad -->
</div>