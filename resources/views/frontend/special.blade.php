@extends('layouts.category_master')

@section('content')
<div id="container">
    <div class="container">

      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="{{ route('front.index') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="#">
          @if (session()->get('lang') == 'fa')
            ویژه
          @else
            Special
          @endif
            
        </a></li>
      </ul>
      <!-- Breadcrumb End-->

      <div class="row">
        <!--Left Part Start -->
        <aside id="column-left" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">دسته ها</h3>
          <div class="box-category">
            <ul id="cat_accordion">
              @if (session()->get('lang') == 'fa')
                @foreach ($Category as $cat)
                  <li><a href="{{ route('front.category',$cat->id) }}">{{ $cat->category_fa }}</a></li>
                @endforeach
              @else
                @foreach ($Category as $cat)
                  <li><a href="{{ route('front.category',$cat->id) }}">{{ $cat->category_en }}</a></li>
                @endforeach
              @endif
              
              
            </ul>
          </div>
          <h3 class="subtitle">برند</h3>
          <div class="box-category">
            <ul id="cat_accordion">
              @if (session()->get('lang') == 'fa')
                @foreach ($Brand as $bra)
                  <li><a href="{{ url('brand').'/'.$bra->id.'/'.$bra->brand_fa }}">{{ $bra->brand_fa }}</a></li>
                @endforeach
              @else
                @foreach ($Brand as $bra)
                  <li><a href="{{ url('brand').'/'.$bra->id.'/'.$bra->brand_en }}">{{ $bra->brand_en }}</a></li>
                @endforeach
              @endif
              
              
            </ul>
          </div>
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
            <h3 class="subtitle">Special</h3>
          @endif
          <div class="side-item">
            @if (session()->get('lang') == 'fa')
              @foreach ($Specialpro as $sp)
                <div class="product-thumb clearfix">
                  <div class="image"><a href="{{ url('product').'/'.$sp->id.'/'.$sp->title_fa }}"><img src="{{ asset('upload/product').'/'.$sp->image }}" alt=" {{ $sp->title_fa }} " title=" {{ $sp->title_fa }} " class="img-responsive"></a></div>
                  <div class="caption">
                    <h4><a href="{{ url('product').'/'.$sp->id.'/'.$sp->title_fa }}">{{ $sp->title_fa }}</a></h4>
                    <p class="price"> <span class="price-new">{{ number_format($sp->price) }} تومان</span></p>
                  </div>
                </div>
              @endforeach
            @else
              @foreach ($Specialpro as $sp)
                <div class="product-thumb clearfix">
                  <div class="image"><a href="{{ url('product').'/'.$sp->id.'/'.$sp->title_en }}"><img src="{{ asset('upload/product').'/'.$sp->image }}" alt=" {{ $sp->title_en }} " title=" {{ $sp->title_en }} " class="img-responsive"></a></div>
                  <div class="caption">
                    <h4><a href="{{ url('product').'/'.$sp->id.'/'.$sp->title_en }}">{{ $sp->title_en }}</a></h4>
                    <p class="price"> <span class="price-new">{{ number_format($sp->price) }} تومان</span></p>
                  </div>
                </div>
              @endforeach
            @endif
            
            
          </div>
          
        </aside>
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          @if (session()->get('lang') == 'fa')
            <h1 class="title">ویژه</h1>
          @else
            <h1 class="title">Special</h1>
          @endif
          
          

          
          <div class="product-filter">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                  <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="List"><i class="fa fa-th-list"></i></button>
                  <button type="button" id="grid-view" class="btn btn-default selected" data-toggle="tooltip" title="" data-original-title="Grid"><i class="fa fa-th"></i></button>
                </div>
              </div>
              <div class="col-md-8 col-sm-2 text-right">
                <label class="control-label" for="input-sort">مرتب سازی :</label>
                @if (session()->get('lang') == 'fa')
                  <a class="btn btn-success" id="new_product">جدید ترین</a> | 
                  <a class="btn btn-success" id="max_product">گران ترین</a> |
                  <a class="btn btn-success" id="min_product">ارزان ترین</a> |
                  <a class="btn btn-success" id="random_product">تصادفی</a> 
                @else
                  <a class="btn btn-success" id="new_product">New</a> | 
                  <a class="btn btn-success" id="max_product">MaxPrice</a> |
                  <a class="btn btn-success" id="min_product">MinPrice</a> |
                  <a class="btn btn-success" id="random_product">Random</a> 
                @endif
                  
              </div>
            </div>
          </div>
          <br>
          <div class="row products-category" id="product_new">
            @if (session()->get('lang') == 'fa')
              @foreach ($ProductBrands as $value)
                <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                  <div class="product-thumb">
                    <div class="image"><a href="{{ url('product').'/'.$value->id.'/'.$value->title_fa }}"><img src="{{ asset('upload/product').'/'.$value->image }}" alt="{{ $value->title_fa }}" title=" {{ $value->title_fa }} " class="img-responsive"></a></div>
                    <div>
                      <div class="caption">
                        <h4><a href="{{ url('product').'/'.$value->id.'/'.$value->title_fa }}">{{ $value->title_fa }}</a></h4>
                        <p class="description"></p>
                        <p class="price"> <span class="price-new">{{ number_format($value->price) }}</span> </p>
                      </div>
                      <div class="button-group">
                        <button class="btn-primary" type="button" onclick=""><span>افزودن به سبد</span></button>

                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            @else
              @foreach ($ProductBrands as $value)
                <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                  <div class="product-thumb">
                    <div class="image"><a href="{{ url('product').'/'.$value->id.'/'.$value->title_en }}"><img src="{{ asset('upload/product').'/'.$value->image }}" alt="{{ $value->title_en }} " title="{{ $value->title_en }} " class="img-responsive"></a></div>
                    <div>
                      <div class="caption">
                        <h4><a href="{{ url('product').'/'.$value->id.'/'.$value->title_en }}">{{ $value->title_en }}</a></h4>
                        <p class="description"></p>
                        <p class="price"> <span class="price-new">{{ number_format($value->price) }}</span> </p>
                      </div>
                      <div class="button-group">
                        <button class="btn-primary" type="button" onclick=""><span>افزودن به سبد</span></button>
                        <div class="add-to-links">
                          <button type="button" data-toggle="tooltip" title="" onclick="" data-original-title="افزودن به علاقه مندی ها"><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>
                          <button type="button" data-toggle="tooltip" title="" onclick="" data-original-title="مقایسه این محصول"><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
              
          </div>
          <div class="row products-category" id="product_max">
            @foreach ($ProductBrandMax as $value)
                <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                  <div class="product-thumb">
                    <div class="image"><a href="{{ url('product').'/'.$value->id.'/'.$value->title_fa }}"><img src="{{ asset('upload/product').'/'.$value->image }}" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive"></a></div>
                    <div>
                      <div class="caption">
                        <h4><a href="{{ url('product').'/'.$value->id.'/'.$value->title_fa }}">{{ $value->title_fa }}</a></h4>
                        <p class="description"></p>
                        <p class="price"> <span class="price-new">{{ number_format($value->price) }}</span> </p>
                      </div>
                      <div class="button-group">
                        <button class="btn-primary" type="button" onclick=""><span>افزودن به سبد</span></button>
                        <div class="add-to-links">
                          <button type="button" data-toggle="tooltip" title="" onclick="" data-original-title="افزودن به علاقه مندی ها"><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>
                          <button type="button" data-toggle="tooltip" title="" onclick="" data-original-title="مقایسه این محصول"><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
          </div>

        <div class="row products-category" id="product_min">
          @foreach ($ProductBrandMin as $value)
              <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="product-thumb">
                  <div class="image"><a href="{{ url('product').'/'.$value->id.'/'.$value->title_fa }}"><img src="{{ asset('upload/product').'/'.$value->image }}" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive"></a></div>
                  <div>
                    <div class="caption">
                      <h4><a href="{{ url('product').'/'.$value->id.'/'.$value->title_fa }}">{{ $value->title_fa }}</a></h4>
                      <p class="description"></p>
                      <p class="price"> <span class="price-new">{{ number_format($value->price) }}</span> </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onclick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="" onclick="" data-original-title="افزودن به علاقه مندی ها"><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>
                        <button type="button" data-toggle="tooltip" title="" onclick="" data-original-title="مقایسه این محصول"><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach
        </div>
        <div class="row products-category" id="product_random">
          @foreach ($ProductBrandRandom as $value)
              <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="product-thumb">
                  <div class="image"><a href="{{ url('product').'/'.$value->id.'/'.$value->title_fa }}"><img src="{{ asset('upload/product').'/'.$value->image }}" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive"></a></div>
                  <div>
                    <div class="caption">
                      <h4><a href="{{ url('product').'/'.$value->id.'/'.$value->title_fa }}">{{ $value->title_fa }}</a></h4>
                      <p class="description"></p>
                      <p class="price"> <span class="price-new">{{ number_format($value->price) }}</span> </p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onclick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="" onclick="" data-original-title="افزودن به علاقه مندی ها"><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>
                        <button type="button" data-toggle="tooltip" title="" onclick="" data-original-title="مقایسه این محصول"><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach
        </div>
        
          <div class="row">
            {{ $ProductBrands->links() }}
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
@endsection

@section('footer')
    <script>


      // -------------- Default ------------\\
      $('#product_max').css('display','none');
      $('#product_min').css('display','none');
      $('#product_random').css('display','none');
      // -------------- Default ------------\\


      $('#new_product').click(function(){
        $('#product_max').css('display','none');
        $('#product_min').css('display','none');
        $('#product_random').css('display','none');

        $('#product_new').css('display','block');
      });

      $('#min_product').click(function(){
        $('#product_new').css('display','none');
        $('#product_max').css('display','none');
        $('#product_random').css('display','none');

        $('#product_min').css('display','block');
      });

      $('#max_product').click(function(){
        $('#product_new').css('display','none');
        $('#product_min').css('display','none');
        $('#product_random').css('display','none');

        $('#product_max').css('display','block');
      });

      $('#random_product').click(function(){
        $('#product_new').css('display','none');
        $('#product_min').css('display','none');
        $('#product_max').css('display','none');

        $('#product_random').css('display','block');
      });

    </script>
@endsection