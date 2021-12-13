@extends('layouts.home_master')


@section('header')
<style>
  td{
    vertical-align: middle !important;
  }
</style>
@endsection

@section('first_content')

<div class="row">
    <!--Middle Part Start-->

    <div id="content" class="col-sm-12">
      @if (Session::has('msg'))
        <div class="alert alert-success">{{ Session::get('msg') }}</div>
      @endif
      @if (session()->has('success_message'))
        <div class="alert alert-success">
          {{session()->get('success_message')}}
        </div>
      @endif
      @if (Cart::count()<1)
      <br><br><br><br><br><br>
      <i class="fa fa-bullhorn" style="font-size: 100px;margin-right: 45%; color: dodgerblue"></i>
      <br><br>
      <h1 class="title text-center" style="color: crimson"> سبد خرید خالی است!!!</h1>
      @else
      <h1 class="title">سبد خرید</h1>
      <div class="table-responsive">
        <a href="{{ route('cart.empty') }}" class="btn btn-warning pull-left">پاک سبد خرید</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <td class="text-center">تصویر</td>
              <td class="text-left">نام محصول</td>
              <td class="text-left">تعداد</td>
              <td class="text-right">قیمت واحد</td>
              <td class="text-right">عملیات</td>
            </tr>
          </thead>
          <tbody>
            @foreach (Cart::content() as $cart)
              <tr>
                <td class="text-center"><a href="{{ url('product').'/'.$cart->id.'/'.$cart->name }}"><img src="{{ asset('upload/product').'/'.$cart->model->image }}" width="150" alt="{{ $cart->name }}" title="{{ $cart->name }}" class="img-thumbnail"></a></td>
                <td class="text-left"><a href="{{ url('product').'/'.$cart->id.'/'.$cart->name }}">{{ $cart->name }}</a><br>
                <td class="text-left">
                  <select name="quantity" data-id="{{ $cart->rowId }}" class="form-control quantity">
                    @for ($i=1; $i < 1 + 12 ; $i++)
                        <option value="{{$i}}" {{$cart->qty == $i ?'selected':''}} >{{$i}}</option>
                    @endfor
                  </select>
                <br>
                <td class="text-right">{{$cart->model->presentPrice($cart->subtotal)}}</td>
                <td class="text-right">


                  {{-- Delete Cart --}}
                    <form action="{{ route('cart.destroy',$cart->rowId) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                  {{-- Delete Cart --}}

                  {{-- Save Product Cart --}}
                    <form action="{{ route('cart.save',$cart->rowId) }}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i></button>
                    </form>
                  {{-- Save Product Cart --}}


                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>





      <div class="row">
        <div class="col-sm-6 col-lg-8">
          @if (Session::has('msgCode'))

          @else
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
              </div>
              <div id="collapse-coupon" class="panel-collapse collapse in">
                <div class="panel-body">
                  <label class="col-sm-4 control-label" for="input-coupon" style="line-height: 37px;">کد تخفیف خود را در اینجا وارد کنید</label>
                  <div class="input-group">
                    <form action="{{ route('couponCode.store') }}" method="post">
                      @csrf
                      <input type="text" name="code" value="" style="width: 337px;text-align: center" placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon" class="form-control">
                      <span class="input-group-btn">
                      <input type="submit" value="اعمال کوپن" style="position: absolute;top: -14px;right: 21px;" id="button-coupon" data-loading-text="بارگذاری ..." class="btn btn-primary">
                    </form>
                    </span>
                  </div>
                </div>
                @if (Session::has('msgCode'))
                  <div class="alert alert-success">{{ Session::get('msgCode') }}</div>
                @endif
                @if (Session::has('msgNotCode'))
                  <div class="alert alert-danger">{{ Session::get('msgNotCode') }}</div>
                @endif
              </div>
            </div>
          @endif
        </div>
        @if (Session::has('msgCode'))
          <div class="col-lg-4">
            <table class="table table-bordered">
              <tbody>
              <tr>
                <td class="text-right"><strong>کد:</strong></td>
                <td class="text-right" style="color: cornflowerblue">{{ session()->get('coupon')['code'] }}</td>
              </tr>
              <tr>
                <td class="text-right"><strong>مقدار تخفیف</strong></td>
                <td class="text-right">{{ number_format($discount) }} تومان</td>
              </tr>
              <tr>
                <td class="text-right"><strong>قابل پرداخت</strong></td>
                <td class="text-right">{{ number_format($newTotal) }} تومان</td>
              </tr>
              <tr>
                <td class="text-right"><strong>عملیات</strong></td>
                <td class="text-right" style="color: crimson;font-weight: bold">
                  <form action="{{ route('couponCode.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>
          </div>
        @endif
      </div>

      <div class="row">
        <div class="col-sm-4 col-sm-offset-8">
          <table class="table table-bordered">
            <tbody>
            <tr>
              <td class="text-right"><strong>جمع سبد خرید</strong></td>
              <td class="text-right">{{number_format($newSubTotal)}} تومان</td>
            </tr>
            <tr>
              <td class="text-right"><strong>مالیات:</strong></td>
              <td class="text-right" style="color: cornflowerblue">{{number_format($newTax)}} تومان</td>
            </tr>
            <tr>
              <td class="text-right"><strong>جمع کل</strong></td>
              <td class="text-right" style="color: crimson;font-weight: bold">{{number_format($newTotal)}} تومان</td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>
      <div class="buttons">
        <div class="pull-left"><a href="{{ route('checkout.index') }}" class="btn btn-primary">ادامه خرید</a></div>

      </div>
    </div>
    <!--Middle Part End -->
  </div>



      @endif
      <br><br><br>
      @if (Cart::instance('save')->count()>0)

        <h1 class="title">علاقه مندی ها</h1>
        <div class="table-responsive">
          <a href="{{ route('cart.SaveEmpty') }}" class="btn btn-warning pull-left">پاک علاقه مندی ها</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <td class="text-center">تصویر</td>
                <td class="text-left">نام محصول</td>
                <td class="text-left">تعداد</td>
                <td class="text-right">قیمت واحد</td>
                <td class="text-right">عملیات</td>
              </tr>
            </thead>
            <tbody>
              @foreach (Cart::instance('save')->content() as $item)
                <tr>
                  <td class="text-center"><a href="{{ url('product').'/'.$item->id.'/'.$item->name }}"><img src="{{ asset('upload/product').'/'.$item->model->image }}" width="150" alt="{{ $item->name }}" title="{{ $item->name }}" class="img-thumbnail"></a></td>
                  <td class="text-left"><a href="{{ url('product').'/'.$item->id.'/'.$item->name }}">{{ $item->name }}</a><br>
                  <td class="text-left"><div class="input-group btn-block quantity">
                      <input type="text" name="quantity" value="{{ $item->qty }}" size="1" class="form-control">
                      <span class="input-group-btn">
                      <button type="submit" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="بروزرسانی"><i class="fa fa-refresh"></i></button>
                      <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="" data-original-title="حذف"><i class="fa fa-times-circle"></i></button>
                      </span></div></td>
                  <td class="text-right">{{ $item->price }}</td>
                  <td class="text-right">


                    {{-- Delete Cart --}}
                      <form action="{{ route('cart.SaveDestroy',$item->rowId) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                      </form>
                    {{-- Delete Cart --}}


                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else

      @endif
@endsection

@section('footer')
<script src="{{ asset('js/app.js') }}"></script>
  <script>
    const classname = document.querySelectorAll('.quantity')


    Array.from(classname).forEach(function(element){

      const id = element.getAttribute('data-id')

      element.addEventListener('change',function(){

        axios.patch(`/cart/${id}`, {
            quantity : this.value
          })
          .then(function (response) {
            console.log(response);
            window.location.href = "{{route('cart.index')}}"
          })
          .catch(function (error) {
            console.log(error);
          });

      })
    });
  </script>
@endsection
