@extends('layouts.single-product_master')

@section('content')
<div id="container">
    <div class="container">
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <div itemscope="">
            @if (session()->get('lang') == 'fa')

            <h1 class="title" itemprop="name">{{ $Single->title_fa }}</h1>
            <div class="row product-info">
              <div class="col-sm-6">
                <div class="image"><img class="img-responsive" itemprop="image" id="zoom_01" src="{{ asset('upload/product').'/'.$Single->image }}" title="{{ $Single->title_fa }}" alt="{{ $Single->title_fa }}" data-zoom-image="{{ asset('upload/product').'/'.$Single->image }}" /> </div>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled description">
                  <li><b>برند :</b> <a href="#"><span itemprop="brand">{{ $Single->brand->brand_fa }}</span></a></li>
                  <li><b>وضعیت موجودی :</b> 
                    @if ($Single->status == 1)
                        <span class="instock">موجود</span></li>
                        <ul class="price-box">
                            <li class="price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer"><span itemprop="price">{{ number_format($Single->price) }}<span itemprop="availability" content="موجود"></span></span></li>
                          </ul>
                          <div id="product">
                            <div class="cart">
                              <div>
                                <div class="qty">
                                  <label class="control-label" for="input-quantity">تعداد</label>
                                  <input type="text" name="qty" value="1" size="2" id="input-quantity" class="form-control">
                                  <a class="qtyBtn plus" href="javascript:void(0);">+</a><br>
                                  <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                                  <div class="clear"></div>
                                </div>
                                <form action="{{ route('cart.store') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $Single->id }}">
                                  <input type="hidden" name="title_fa" value="{{ $Single->title_fa }}">
                                  <input type="hidden" name="price" value="{{ $Single->price }}">
                                  <button type="submit" id="button-cart" class="btn btn-primary btn-lg">افزودن به سبد</button>
                                </form>
                              </div>
                            </div>
                          </div>
                    @else
                        <span class="alert alert-danger">نا موجود</span></li>
                    @endif
                </ul>
                
                <div class="rating" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                  <meta itemprop="ratingValue" content="0">
                </div>
                <hr>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style"> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>
                <!-- AddThis Button END -->
              </div>
            </div>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-description" data-toggle="tab" aria-expanded="true">توضیحات</a></li>
              @if (sizeof($Feature)>0)
                <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
              @endif
              
            </ul>
            <div class="tab-content">
              <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                  {!! $Single->desc_fa !!}
                </div>
              </div>
              <div id="tab-specification" class="tab-pane">
                <div id="tab-specification" class="tab-pane">
                  @foreach ($Feature as $item)
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->value }}</td>
                        </tr>
                      </tbody>
                    </table>
                    @endforeach
              </div>
              </div>
            </div>

            @else
                <h1 class="title" itemprop="name">{{ $Single->title_en }}</h1>
              <div class="row product-info">
                <div class="col-sm-6">
                  <div class="image"><img class="img-responsive" itemprop="image" id="zoom_01" src="{{ asset('upload/product').'/'.$Single->image }}" title="لپ تاپ ایلین ور" alt="لپ تاپ ایلین ور" data-zoom-image="{{ asset('upload/product').'/'.$Single->image }}" /> </div>
                </div>
                <div class="col-sm-6">
                  <ul class="list-unstyled description">
                    <li><b>برند :</b> <a href="#"><span itemprop="brand">{{ $Single->brand->brand_en }}</span></a></li>
                    <li><b>وضعیت موجودی :</b> 
                      @if ($Single->status == 1)
                          <span class="instock">Yes</span></li>
                          <ul class="price-box">
                              <li class="price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer"><span itemprop="price">{{ number_format($Single->price) }}<span itemprop="availability" content="Yes"></span></span></li>
                            </ul>
                            <div id="product">
                              <div class="cart">
                                <div>
                                  <div class="qty">
                                    <label class="control-label" for="input-quantity">تعداد</label>
                                    <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control">
                                    <a class="qtyBtn plus" href="javascript:void(0);">+</a><br>
                                    <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                                    <div class="clear"></div>
                                  </div>
                                  <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $Single->id }}">
                                    <input type="hidden" name="title_fa" value="{{ $Single->title_fa }}">
                                    <input type="hidden" name="price" value="{{ $Single->price }}">
                                    <button type="submit" id="button-cart" class="btn btn-primary btn-lg">Add Cart</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                    @else
                        <span class="alert alert-danger">No</span></li>
                    @endif
                    
                </ul>
                
                <div class="rating" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                  <meta itemprop="ratingValue" content="0">
                </div>
                <hr>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style"> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>
                <!-- AddThis Button END -->
              </div>
            </div>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-description" data-toggle="tab" aria-expanded="true">Description</a></li>
            </ul>
            <div class="tab-content">
              <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                  {!! $Single->desc_en !!}
                </div>
              </div>
            </div>

            @endif
            
            <h3 class="subtitle">محصولات مرتبط</h3>
            <div class="owl-carousel related_pro owl-theme" style="opacity: 1; display: block;">
              
              <div class="owl-wrapper-outer">
                @foreach ($Category as $item)
                @foreach ($L_product as $like)
                  @if ($item->id == $like->category_id)
                <div class="owl-wrapper" style="width: 2040px; left: 0px; display: block; transition: all 200ms ease 0s; transform: translate3d(0px, 0px, 0px);"> 
                  <div class="owl-item" style="width: 170px;">
                    <div class="product-thumb">
                      <div class="image">
                        <a href="{{ url('product').'/'.$like->id.'/'.$like->title_fa }}"><img src="{{ asset('upload/product').'/'.$like->image }}" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive"></a>
                      </div>
                      <div class="caption">
                        <h4><a href="{{ url('product').'/'.$like->id.'/'.$like->title_fa }}">{{ $like->title_fa }}</a></h4>
                        <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                      </div>
                      <div class="button-group">
                        <form action="{{ route('cart.store') }}" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{ $Single->id }}">
                          <input type="hidden" name="title_fa" value="{{ $Single->title_fa }}">
                          <input type="hidden" name="price" value="{{ $Single->price }}">
                          <button class="btn-primary" type="submit" onclick=""><span>افزودن به سبد</span></button>
                        </form>
                       
                      </div>
                    </div> 
                  </div> 
          </div>
          @endif
                    @endforeach
          
                    @endforeach
        </div> 
       
            <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
          </div>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <aside id="column-right" class="col-sm-3 hidden-xs">
          @if (session()->get('lang') == 'fa')
            <h3 class="subtitle">جدیترین</h3>
          @else
            <h3 class="subtitle">New</h3>
          @endif
         
          
          <div class="side-item">
            @if (session()->get('lang') == 'fa')
              @foreach ($NewProduct as $np)
                <div class="product-thumb clearfix">
                  <div class="image"><a href="{{ url('product').'/'.$np->id.'/'.$np->title_fa }}"><img src="{{ asset('upload/product').'/'.$np->image }}" alt="{{ $np->title_fa }}" title="{{ $np->title_fa }}" class="img-responsive"></a></div>
                    <div class="caption">
                      <h4><a href="{{ url('product').'/'.$np->id.'/'.$np->title_fa }}">{{ $np->title_fa }}</a></h4>
                      <p class="price"><span class="price-new">{{ number_format($np->price) }} تومان</span></p>
                    </div>
                </div>
              @endforeach
            @else
              @foreach ($NewProduct as $np)
                <div class="product-thumb clearfix">
                  <div class="image"><a href="{{ url('product').'/'.$np->id.'/'.$np->title_en }}"><img src="{{ asset('upload/product').'/'.$np->image }}" alt="{{ $np->title_en }}" title="{{ $np->title_en }}" class="img-responsive"></a></div>
                  <div class="caption">
                    <h4><a href="{{ url('product').'/'.$np->id.'/'.$np->title_en }}">{{ $np->title_en }}</a></h4>
                    <p class="price"><span class="price-new">{{ number_format($np->price) }} تومان</span></p>
                  </div>
                </div>
              @endforeach
            @endif
            
          </div>
          @if (session()->get('lang') == 'fa')
            <h3 class="subtitle">ویژه</h3>
          @else
            <h3 class="subtitle">ُSpecial</h3>  
          @endif
          <div class="side-item">
            @if (session()->get('lang') == 'fa')
                @foreach ($Specialpro as $value)
                  <div class="product-thumb clearfix">
                    <div class="image"><a href="{{ url('product').'/'.$value->id.'/'.$value->title_fa }}"><img src="{{ asset('upload/product').'/'.$value->image }}" alt=" {{ $value->title_fa }} " title=" {{ $value->title_fa }} " class="img-responsive"></a></div>
                    <div class="caption">
                      <h4><a href="{{ url('product').'/'.$value->id.'/'.$value->title_fa }}">{{ $value->title_fa }}</a></h4>
                      <p class="price"> <span class="price-new">{{ number_format($value->price) }} تومان</span> </p>
                    </div>
                  </div>
                @endforeach
            @else
                @foreach ($Specialpro as $value)
                  <div class="product-thumb clearfix">
                    <div class="image"><a href="{{ url('product').'/'.$value->id.'/'.$value->title_en }}"><img src="{{ asset('upload/product').'/'.$value->image }}" alt=" {{ $value->title_en }} " title=" {{ $value->title_en }} " class="img-responsive"></a></div>
                    <div class="caption">
                      <h4><a href="{{ url('product').'/'.$value->id.'/'.$value->title_en }}">{{ $value->title_en }}</a></h4>
                      <p class="price"> <span class="price-new">{{ number_format($value->price) }} تومان</span> </p>
                    </div>
                  </div>
                @endforeach
            @endif
          </div>
        </aside>
        <!--Right Part End -->
      </div>
    </div>
  </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset('Frontend/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('Frontend/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('Frontend/js/swipebox/lib/ios-orientationchange-fix.js') }}"></script>
    <script type="text/javascript" src="{{ asset('Frontend/js/swipebox/src/js/jquery.swipebox.min.js') }}"></script>
    <script type="text/javascript">
        $("#zoom_01").elevateZoom({
          gallery:'gallery_01',
          cursor: 'pointer',
          galleryActiveClass: 'active',
          imageCrossfade: true,
          zoomWindowFadeIn: 500,
          zoomWindowFadeOut: 500,
          zoomWindowPosition : 11,
          lensFadeIn: 500,
          lensFadeOut: 500,
          loadingIcon: 'image/progress.gif'
          }); 
        $("#zoom_01").bind("click", function(e) {
          var ez =   $('#zoom_01').data('elevateZoom');
          $.swipebox(ez.getGalleryList());
          return false;
        });
        </script>
@endsection
