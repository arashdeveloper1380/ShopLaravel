@extends('layouts.home_master')

@section('slider')
  @php
    $Slider = DB::table('slider')->get();
  @endphp

  <div class="slideshow single-slider owl-carousel">
    @foreach ($Slider as $item)
      <div class="item"> <a href="{{ $item->link }}"><img class="img-responsive" src="{{ asset('upload/slider').'/'.$item->image }}" alt="banner 2" /></a> </div>
    @endforeach
  </div>
@endsection

@section('first_content')
<div id="product-tab" class="product-tab">
    <ul id="tabs" class="tabs">
      <li><a href="#tab-featured">ویژه</a></li>
      <li><a href="#tab-latest">جدیدترین</a></li>
    </ul>
<div id="tab-featured" class="tab_content">
    <div class="owl-carousel product_carousel_tab">
      @if (session()->get('lang') == 'fa')
        @foreach ($Special_Product as $np)
          <div class="product-thumb clearfix">
            <div class="image"><a href="{{ url('product').'/'.$np->id.'/'.$np->title_fa }}"><img src="{{ asset('upload/product').'/'.$np->image }}" alt="{{ $np->title_fa }}" title="{{ $np->title_fa }}" class="img-responsive" /></a></div>
            <div class="caption">
                <h4><a href="{{ url('product').'/'.$np->id.'/'.$np->title_fa }}">{{ $np->title_fa }}</a></h4>
                <p class="price"><span class="price-new">{{ number_format($np->price) }} تومان </span></p>
            </div>
            <div class="button-group">
              <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $np->id }}">
                <input type="hidden" name="title_fa" value="{{ $np->title_fa }}">
                <input type="hidden" name="price" value="{{ $np->price }}">
                <button class="btn-primary" type="submit"><span>افزودن به سبد</span></button>
              </form>
            </div>
          </div>
        @endforeach
      @else
        @foreach ($Special_Product as $np)
          <div class="product-thumb clearfix">
            <div class="image"><a href="{{ url('product').'/'.$np->id.'/'.$np->title_en }}"><img src="{{ asset('upload/product').'/'.$np->image }}" alt="{{ $np->title_en }}" title="{{ $np->title_en }}" class="img-responsive" /></a></div>
            <div class="caption">
                <h4><a href="{{ url('product').'/'.$np->id.'/'.$np->title_en }}">{{ $np->title_en }}</a></h4>
                <p class="price"><span class="price-new">{{ number_format($np->price) }}T</span></p>
            </div>
            <div class="button-group">
              <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $np->id }}">
                <input type="hidden" name="title_fa" value="{{ $np->title_fa }}">
                <input type="hidden" name="price" value="{{ $np->price }}">
                <button class="btn-primary" type="submit"><span>Add Cart</span></button>
              </form>
            </div>
          </div>
        @endforeach
      @endif
         
    </div>
</div>



<div id="tab-latest" class="tab_content">
    <div class="owl-carousel product_carousel_tab">

      @if (session()->get('lang') == 'fa')
        @foreach ($New_Product as $np)
          <div class="product-thumb">
            <div class="image"><a href="{{ url('product').'/'.$np->id.'/'.$np->title_fa }}"><img src="{{ asset('upload/product/').'/'.$np->image }}" alt="{{ $np->title_fa }}" title="{{ $np->title_fa }}" class="img-responsive" /></a></div>
            <div class="caption">
              <h4><a href="{{ url('product').'/'.$np->id.'/'.$np->title_fa }}">{{ $np->title_fa }}</a></h4>
              <p class="price">{{ number_format($np->price) }}</p>
            </div>
            <div class="button-group">
              <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $np->id }}">
                <input type="hidden" name="title_fa" value="{{ $np->title_fa }}">
                <input type="hidden" name="price" value="{{ $np->price }}">
                <button class="btn-primary" type="submit"><span>افزودن به سبد</span></button>
              </form>
            </div>
          </div>
        @endforeach
      @else
        @foreach ($New_Product as $np)
          <div class="product-thumb">
            <div class="image"><a href="{{ url('product').'/'.$np->id.'/'.$np->title_en }}"><img src="{{ asset('upload/product/').'/'.$np->image }}" alt="{{ $np->title_en }}" title="{{ $np->title_en }}" class="img-responsive" /></a></div>
            <div class="caption">
              <h4><a href="{{ url('product').'/'.$np->id.'/'.$np->title_en }}">{{ $np->title_en }}</a></h4>
              <p class="price">{{ number_format($np->price) }}</p>
            </div>
            <div class="button-group">
              <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $np->id }}">
                <input type="hidden" name="title_fa" value="{{ $np->title_fa }}">
                <input type="hidden" name="price" value="{{ $np->price }}">
                <button class="btn-primary" type="submit"><span>Add Cart</span></button>
              </form>
            </div>
          </div>
        @endforeach
      @endif
            
    </div>
  </div>
@endsection


@section('second_section')

@if (session()->get('lang') == 'fa')

  @foreach ($Category as $cat_product)
  <h3 class="subtitle"> {{ $cat_product->category_fa }} <a class="viewall" href="{{ route('front.category',$cat_product->id) }}"> نمایش همه </a></h3>
  <div class="owl-carousel latest_category_carousel">
      
      @foreach ($Product_cat as $pro_cat)
        @if ($cat_product->id == $pro_cat->category_id)
          <div class="product-thumb">
            <div class="image"><a href="{{ url('product').'/'.$pro_cat->id.'/'.$pro_cat->title_fa }}"><img src="{{ asset('upload/product').'/'.$pro_cat->image }}" alt="کرم مو آقایان" title="کرم مو آقایان" class="img-responsive" /></a></div>
            <div class="caption">
              <h4><a href="{{ url('product').'/'.$pro_cat->id.'/'.$pro_cat->title_fa }}">{{ $pro_cat->title_fa }}</a></h4>
              <p class="price">{{ number_format($pro_cat->price) }}</p>
              <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
            </div>
            <div class="button-group">
              <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $pro_cat->id }}">
                <input type="hidden" name="title_fa" value="{{ $pro_cat->title_fa }}">
                <input type="hidden" name="price" value="{{ $pro_cat->price }}">
                <button class="btn-primary" type="submit"><span>افزودن به سبد</span></button>
              </form>
            </div>
          </div>
        @endif
    @endforeach
      
    
  </div>
  @endforeach

@else

  @foreach ($Category as $cat_product)
    <h3 class="subtitle"> {{ $cat_product->category_en }} <a class="viewall" href="{{ route('front.category',$cat_product->id) }}"> نمایش همه </a></h3>
    <div class="owl-carousel latest_category_carousel">
      @foreach ($Product_cat as $pro_cat)
        @if ($cat_product->id == $pro_cat->category_id)
        <div class="product-thumb">
          <div class="image"><a href="{{ url('product').'/'.$pro_cat->id.'/'.$pro_cat->title_en }}"><img src="{{ asset('upload/product').'/'.$pro_cat->image }}" alt="کرم مو آقایان" title="کرم مو آقایان" class="img-responsive" /></a></div>
          <div class="caption">
            <h4><a href="{{ url('product').'/'.$pro_cat->id.'/'.$pro_cat->title_en }}">{{ $pro_cat->title_en }}</a></h4>
            <p class="price">{{ number_format($pro_cat->price) }}</p>
            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
          </div>
          <div class="button-group">
            <form action="{{ route('cart.store') }}" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $pro_cat->id }}">
              <input type="hidden" name="title_fa" value="{{ $pro_cat->title_fa }}">
              <input type="hidden" name="price" value="{{ $pro_cat->price }}">
              <button class="btn-primary" type="submit"><span>Add Cart</span></button>
            </form>
          </div>
        </div>
        @endif
      @endforeach
    </div>
  @endforeach

@endif
 
@endsection

@section('brand')
  @foreach ($Brand as $b)
    <div class="item text-center"> <a href="{{ url('brand').'/'.$b->id.'/'.$b->brand_fa }}"><img src="{{ asset('upload/brand').'/'.$b->image }}" alt="{{ $b->brand_fa }}" title="{{ $b->brand_fa }}" class="img-responsive"/></a></div>
  @endforeach
@endsection