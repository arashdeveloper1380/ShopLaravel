<!DOCTYPE html>
<html dir="rtl">
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>مارکت شاپ - قالب HTML فروشگاهی</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/js/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/js/bootstrap/css/bootstrap-rtl.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/css/font-awesome/css/font-awesome.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/css/stylesheet.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/css/owl.carousel.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/css/owl.transitions.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/css/responsive.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/css/stylesheet-rtl.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/css/responsive-rtl.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Frontend/css/stylesheet-skin2.css') }}" />

@yield('header')

<style>
  .logout{
    float: left !important;
    background-color: transparent !important;
    border: 0 !important;
    margin-top: 6px !important;
  }
  .social-media{
    display: block;
    margin-right: 510px;
    line-height: 38px;
  }
</style>

<!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
  <div id="header">
    <!-- Top Bar Start-->
    <nav id="top" class="htop">
      <div class="container">
        <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
          <div class="pull-left flip left-top">
            <div class="links">
              <ul>
                <li class="mobile"><i class="fa fa-phone"></i>{{ $Setting->mobile }}</li>
                <li class="email"><a href="mailto:info@marketshop.com"><i class="fa fa-envelope"></i>{{ $Setting->email }}</a></li>
                
              </ul>
            </div>

          </div>
          <div id="top-links" class="nav pull-right flip">
            <ul>
              @if (Auth::check())

                @if (session()->get('lang') == 'fa')

                  @if (Auth::user()->role == 'admin')
                    <li><a href="{{ route('dashboard.index') }}">پنل مدریت</a></li>
                  @else
                    <li><a href="#"> پروفایل <span style="color: cornflowerblue">{{ Auth::user()->name }}</span> </a></li>
                  @endif
                  <form action="{{ route('front.logout') }}">
                    @csrf
                    <input class="logout" type="submit" value="خروج">
                  </form>
                @else
                  <li><a href="login.html">Profile</a></li>
                  <form action="{{ route('front.logout') }}">
                    @csrf
                    <input class="logout" type="submit" value="Logout">
                  </form>
                @endif

              @else

                @if (session()->get('lang') == 'fa')
                  <li><a href="{{ route('login') }}">ورود</a></li>
                  <li><a href="{{ route('register') }}">ثبت نام</a></li>
                @else
                  <li><a href="{{ route('login') }}">Login</a></li>
                  <li><a href="{{ route('register') }}">Register</a></li>
                @endif

              @endif
              
              
              @if (session()->get('lang') == 'en')
                <li style="margin-left: 500px;"><a href="{{ route('lang.fa') }}">Fa</a></li>
              @else
                <li style="margin-left: 560px;"><a href="{{ route('lang.en') }}">En</a></li>
              @endif

            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Top Bar End-->
    <!-- Header Start-->
    <header class="header-row">
      <div class="container">
        <div class="table-container">
          <!-- Logo Start -->
          <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
            <div id="logo"><a href="index.html"><img class="img-responsive" src="{{ asset('Frontend/image/logo.png') }}" title="MarketShop" alt="MarketShop" /></a></div>
          </div>
          <!-- Logo End -->
          <!-- Mini Cart Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div id="cart">
              <button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..." class="heading dropdown-toggle">
              <span class="cart-icon pull-left flip"></span>
              <span id="cart-total">{{ Cart::count() }} محصول</span></button>
              <ul class="dropdown-menu">
                <li>
                  @include('frontend._partials._cart')
                </li>
                <li>
                  <div>
                    {{-- <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>جمع کل</strong></td>
                          <td class="text-right">{{ $cart->total() }} تومان</td>
                        </tr>
                      </tbody>
                    </table> --}}
                    <p class="checkout"><a href="{{ route('cart.index') }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> مشاهده سبد</a>
                      &nbsp;&nbsp;&nbsp;</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- Mini Cart End-->
          <!-- جستجو Start-->
          @if (session()->get('lang') == 'fa')
            <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
              <div id="search" class="input-group">
                <input id="filter_name" type="text" name="search" value="" placeholder="جستجو" class="form-control input-lg" />
                <button type="button" class="button-search"><i class="fa fa-search"></i></button>
              </div>
            </div>
          @else
            <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
              <div id="search" class="input-group">
                <input id="filter_name" type="text" name="search" value="" placeholder="Search" class="form-control input-lg" />
                <button type="button" class="button-search"><i class="fa fa-search"></i></button>
              </div>
            </div>
          @endif
          
          <!-- جستجو End-->
        </div>
      </div>
    </header>
    <!-- Header End-->
    <!-- Main آقایانu Start-->
    
      <nav id="menu" class="navbar">
        <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>
        <div class="container">
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            

            @if (session()->get('lang') == 'fa')
            <li><a class="home_link" title="خانه" href="{{ route('front.index') }}">خانه</a></li>
              @foreach ($Category as $value)
                <li><a href="{{ route('front.category',$value->id) }}">{{ $value->category_fa }}</a></li>      
              @endforeach

            @else
            <li><a class="home_link" title="Home" href="{{ route('front.index') }}">Home</a></li>
              @foreach ($Category as $value)
                <li><a href="{{ route('front.category',$value->id) }}">{{ $value->category_en }}</a></li>      
              @endforeach 

            @endif
            @if (session()->get('lang') == 'fa')
              <li class="custom-link-right"><a href="{{ route('front.special') }}" target="_blank">کالاهای ویژه!</a></li>
            @else
              <li class="custom-link-right"><a href="{{ route('front.special') }}" target="_blank">Special Product !</a></li>
            @endif

            <div class="social-media">
              @foreach ($Social as $item)
              @if (session()->get('lang') == 'fa')
                <li class="pull-right" style="padding-right: 10px">
                  <a href="{{ $item->link }}" title="{{ $item->social_fa }}">
                    <i class="fa fa-{{ $item->social_en }}" style="font-size: 24px;line-height: 38px;"></i>
                  </a>
                </li>
              @else
                <li class="pull-right" style="padding-right: 10px">
                  <a href="{{ $item->link }}" title="{{ $item->social_en }}">
                    <i class="fa fa-{{ $item->social_en }}"></i>
                  </a>
                </li>
              @endif
                
              @endforeach
              
            </div>

          </ul>
        </div>
        </div>
      </nav>
    
    <!-- Main آقایانu End-->
  </div>