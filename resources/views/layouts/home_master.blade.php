@include('frontend._partials.header',['Category'=>$Category])
  <div id="container">
    
    <div class="container">
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-xs-12">
          <!-- Slideshow Start-->

          @yield('slider')

          <!-- Slideshow End-->
          <!-- محصولات Tab Start -->
          @yield('first_content')
  
  
  
        </div>    <!-- محصولات Tab Start -->

          <br>
          
          
          <!-- دسته ها محصولات Slider Start -->
          @yield('second_section')
          <!-- دسته ها محصولات Slider End -->

          <!-- برند Logo Carousel Start-->
          <div id="carousel" class="owl-carousel nxt">

           @yield('brand')
            
          </div>

          <!-- برند Logo Carousel End -->
        </div>
        <!--Middle Part End-->
      </div>
    </div>
  </div>


  @include('frontend._partials.footer')