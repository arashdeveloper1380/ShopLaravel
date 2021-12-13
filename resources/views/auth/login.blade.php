@extends('layouts.home_master')

@section('first_content')
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="{login.html}">حساب کاربری</a></li>
        <li><a href="{{ route('login') }}">ورود</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title">حساب کاربری ورود</h1>
          <div class="row">
            <div class="col-sm-6">
              <h2 class="subtitle">مشتری جدید</h2>
              <p><strong>ثبت نام حساب کاربری</strong></p>
              <p>با ایجاد حساب کاربری میتوانید سریعتر خرید کرده، از وضعیت خرید خود آگاه شده و تاریخچه ی سفارشات خود را مشاهده کنید.</p>
              <a href="{{ route('register') }}" class="btn btn-primary">ادامه</a> </div>
            <div class="col-sm-6">
              <h2 class="subtitle">مشتری قبلی</h2>
              <p><strong>من از قبل مشتری شما هستم</strong></p>
                <div class="form-group">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <label class="control-label" for="input-email">آدرس ایمیل</label>
                        <input type="text" name="email" placeholder="آدرس ایمیل" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus />
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group">
                  <label class="control-label" for="input-password">رمز عبور</label>
                  <input type="password" name="password" placeholder="رمز عبور" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required />
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  <br />
                  <a href="{{ route('password.request') }}">فراموشی رمز عبور</a></div>
                <input type="submit" value="ورود" class="btn btn-primary" />
            </form>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <aside id="column-right" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">حساب کاربری</h3>
          <div class="list-group">
            <ul class="list-item">
              <li><a href="{{ route('login') }}">ورود</a></li>
              <li><a href="{{ route('register') }}">ثبت نام</a></li>
              <li><a href="{{ route('password.request') }}">فراموشی رمز عبور</a></li>
              <li><a href="#">حساب کاربری</a></li>
              <li><a href="wishlist.html">لیست علاقه مندی</a></li>
              <li><a href="#">تاریخچه سفارشات</a></li>
              <li><a href="#">تراکنش ها</a></li>
            </ul>
          </div>
        </aside>
        <!--Right Part End -->
      </div>
    </div>
  </div>
@endsection