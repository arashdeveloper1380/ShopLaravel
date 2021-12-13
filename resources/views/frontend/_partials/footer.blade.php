<!-- Feature Box Start-->
<div class="container">
    <div class="custom-feature-box row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="feature-box fbox_1">
          <div class="title">ارسال رایگان</div>
          <p>برای خرید های بیش از 100 هزار تومان</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="feature-box fbox_2">
          <div class="title">پس فرستادن رایگان</div>
          <p>بازگشت کالا تا 24 ساعت پس از خرید</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="feature-box fbox_3">
          <div class="title">کارت هدیه</div>
          <p>بهترین هدیه برای عزیزان شما</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="feature-box fbox_4">
          <div class="title">امتیازات خرید</div>
          <p>از هر خرید امتیاز کسب کرده و از آن بهره بگیرید</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Feature Box End-->
<!--Footer Start-->
<footer id="footer">
  <div class="fpart-first">
    <div class="container">
      <div class="row">
        <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
          @if (session()->get('lang') == 'fa')
            <h5>درباره</h5>
          @else
            <h5>َAbout</h5>
          @endif
          <p>{!! $Setting->description !!}</p>
        </div>
        <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
          <h5>اطلاعات</h5>
          <ul>
            <li><a href="about-us.html">درباره ما</a></li>
            <li><a href="about-us.html">اطلاعات 0 تومان</a></li>
            <li><a href="about-us.html">حریم خصوصی</a></li>
            <li><a href="about-us.html">شرایط و قوانین</a></li>
          </ul>
        </div>
        <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
          <h5>خدمات مشتریان</h5>
          <ul>
            <li><a href="contact-us.html">تماس با ما</a></li>
            <li><a href="#">بازگشت</a></li>
            <li><a href="sitemap.html">نقشه سایت</a></li>
          </ul>
        </div>
        <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
          <h5>امکانات جانبی</h5>
          <ul>
            <li><a href="#">برند ها</a></li>
            <li><a href="#">کارت هدیه</a></li>
            <li><a href="#">بازاریابی</a></li>
            <li><a href="#">ویژه ها</a></li>
          </ul>
        </div>
        <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
          <h5>حساب من</h5>
          <ul>
            <li><a href="#">حساب کاربری</a></li>
            <li><a href="#">تاریخچه سفارشات</a></li>
            <li><a href="#">لیست علاقه مندی</a></li>
            <li><a href="#">خبرنامه</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="fpart-second">
    <div class="container">
      <div id="powered" class="clearfix">
        <div class="powered_text pull-left flip">
          <p>کپی رایت © 2016 فروشگاه شما | پارسی سازی و ویرایش توسط <a href="https://www.roxo.ir" target="_blank">روکسو</a></p>
        </div>
        <div class="social pull-right flip"> 

        </div>
      <div class="bottom-row">
        <div class="payments_types">
          @foreach ($Social as $item)
            <a href="{{ $item->link }}" target="_blank" title="{{ $item->social_fa }}">
              <i class="fa fa-{{ $item->social_en }}"></i>
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div id="back-top"><a data-toggle="tooltip" title="بازگشت به بالا" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
</footer>
<!--Footer End-->

</div>
<!-- JS Part Start-->
<script type="text/javascript" src="{{ asset('Frontend/js/jquery-2.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Frontend/js/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Frontend/js/jquery.easing-1.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Frontend/js/jquery.dcjqaccordion.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Frontend/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Frontend/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('Frontend/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Frontend/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Frontend/js/swipebox/lib/ios-orientationchange-fix.js') }}"></script>
<script type="text/javascript" src="{{ asset('Frontend/js/swipebox/src/js/jquery.swipebox.min.js') }}"></script>
<!-- JS Part End-->
@yield('footer')

</body>
</html>