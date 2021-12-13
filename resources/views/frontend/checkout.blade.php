@extends('layouts.home_master')

@section('first_content')
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.html">سبد خرید</a></li>
        <li><a href="checkout.html">تسویه حساب</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <form action="{{ route('checkout.store') }}" method="POST">
            {{ csrf_field() }}
            <div id="content" class="col-sm-12">
            <h1 class="title">تسویه حساب</h1>
            <div class="row">
                    <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-user"></i> اطلاعات شخصی شما</h4>
                        </div>
                        <div class="panel-body">
                                <div class="form-group required">
                                    <label for="input-payment-firstname" class="control-label">نام</label>
                                    <input type="text" class="form-control" id="input-payment-firstname" placeholder="نام" @if(Auth::user()->name) value="{{ Auth::user()->name }}" @endif  name="name">
                                </div>
                                <div class="form-group required">
                                    <label for="input-payment-lastname" class="control-label">نام خانوادگی</label>
                                    <input type="text" class="form-control" id="input-payment-lastname" placeholder="نام خانوادگی" @if(Auth::user()->lname) value="{{ Auth::user()->lname }}" @endif name="lname">
                                </div>
                                <div class="form-group required">
                                    <label for="input-payment-email" class="control-label">آدرس ایمیل</label>
                                    <input type="text" class="form-control" id="input-payment-email" placeholder="آدرس ایمیل" @if(Auth::user()->email) value="{{ Auth::user()->email }}" @endif name="email">
                                </div>
                                <div class="form-group required">
                                    <label for="input-payment-telephone" class="control-label">شماره تلفن</label>
                                    <input type="text" class="form-control" id="input-payment-telephone" placeholder="شماره تلفن" @if(Auth::user()->phone) value="{{ Auth::user()->phone }}" @endif name="phone">
                                </div>
                            </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-book"></i> آدرس</h4>
                        </div>
                        <div class="panel-body">
                                <div class="form-group required">
                                    <label for="input-payment-address-1" class="control-label">آدرس 1</label>
                                    <input type="text" class="form-control" id="input-payment-address-1" placeholder="آدرس 1" @if (Auth::user()->address) value="{{ Auth::user()->address }}" @endif name="address">
                                </div>
                                <div class="form-group required">
                                    <label for="input-payment-city" class="control-label">شهر</label>
                                    <input type="text" class="form-control" id="input-payment-city" placeholder="شهر" @if (Auth::user()->city) value="{{ Auth::user()->city }}" @endif name="city">
                                </div>
                                <div class="form-group required">
                                    <label for="input-payment-postcode" class="control-label">کد پستی</label>
                                    <input type="text" class="form-control" id="input-payment-postcode" placeholder="کد پستی" @if (Auth::user()->codePost) value="{{ Auth::user()->codePost }}" @endif name="codePost">
                                </div>

                            </div>
                    </div>
                    </div>
                <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> سبد خرید</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td class="text-center">تصویر</td>
                                    <td class="text-left">نام محصول</td>
                                    <td class="text-left">تعداد</td>
                                    <td class="text-right">قیمت واحد</td>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $cart)
                                    <tr>
                                        <td class="text-center"><a href="{{ url('product').'/'.$cart->id.'/'.$cart->name }}"><img src="{{ asset('upload/product').'/'.$cart->model->image }}" alt="{{ $cart->name }}" title="{{ $cart->name }}" width="150" class="img-thumbnail"></a></td>
                                        <td class="text-left"><a href="product.html">{{ $cart->name }}</a></td>
                                        <td class="text-left">
                                            <div class="input-group btn-block" style="max-width: 200px;">
                                                <span style="color: crimson">{{ $cart->qty }}</span>
                                            </div>
                                        </td>
                                        <td class="text-right">{{$cart->model->presentPrice($cart->subtotal)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td class="text-right" colspan="4"><strong>جمع سبد خرید:</strong></td>
                                    <td class="text-right">{{number_format($newSubTotal)}} تومان</td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><strong>مالیات:</strong></td>
                                    <td class="text-right">{{number_format($newTax)}} تومان</td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><strong>جمع کل:</strong></td>
                                    <td class="text-right">{{number_format($newTotal)}} تومان</td>
                                </tr>
                                </tfoot>
                            </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-pencil"></i> افزودن توضیح برای سفارش.</h4>
                        </div>
                        <div class="panel-body">
                            <textarea rows="4" class="form-control" id="confirm_comment" name="description"></textarea>
                            <br>
                            <div class="buttons">

                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="pull-right">
                    <input type="submit" class="btn btn-primary" id="button-confirm" value="تایید سفارش">
                </div>

            </div>
            </div>
            </form>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
@endsection
