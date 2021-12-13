@extends('layouts.home_master')

@section('first_content')
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="login.html">حساب کاربری</a></li>
        <li><a href="register.html">ثبت نام</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <form action="{{ route('user.register') }}" method="post" class="form-horizontal">
            @csrf
            <div class="col-sm-9" id="content">
            <h1 class="title">ثبت نام حساب کاربری</h1>
            <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="{{ route('login') }}">صفحه لاگین</a> مراجعه کنید.</p>
                <fieldset id="account">
                <legend>اطلاعات شخصی شما</legend>
                <div class="form-group required">
                    <label for="name" class="col-sm-2 control-label">نام</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="نام" value="{{ old('name') }}" name="name">
                    </div>
                </div>
                <div class="form-group required">
                    <label for="lname" class="col-sm-2 control-label">نام خانوادگی</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="نام خانوادگی" value="{{ old('name') }}" name="lname">
                    </div>
                </div>
                <div class="form-group required">
                    <label for="email" class="col-sm-2 control-label">آدرس ایمیل</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" placeholder="آدرس ایمیل" value="{{ old('name') }}" name="email">
                    </div>
                </div>
                <div class="form-group required">
                    <label for="phone" class="col-sm-2 control-label">شماره تلفن</label>
                    <div class="col-sm-10">
                    <input type="tel" class="form-control" placeholder="شماره تلفن" value="{{ old('name') }}" name="phone">
                    </div>
                </div>
                </fieldset>
                <fieldset id="address">
                <legend>آدرس</legend>
                <div class="form-group required">
                    <label for="address" class="col-sm-2 control-label">آدرس</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="آدرس" value="{{ old('name') }}" name="address">
                    </div>
                </div>
                <div class="form-group required">
                    <label for="city" class="col-sm-2 control-label">شهر</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="شهر" value="{{ old('name') }}" name="city">
                    </div>
                </div>
                <div class="form-group required">
                    <label for="codePost" class="col-sm-2 control-label">کد پستی</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"placeholder="کد پستی" value="{{ old('name') }}" name="codePost">
                    </div>
                </div>
                </fieldset>
                <fieldset>
                <legend>رمز عبور شما</legend>
                <div class="form-group required">
                    <label for="password" class="col-sm-2 control-label">رمز عبور</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="رمز عبور" name="password">
                    </div>
                </div>
                <div class="form-group required">
                    <label for="password_confirmation" class="col-sm-2 control-label">تکرار رمز عبور</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="تکرار رمز عبور" name="password_confirmation">
                    </div>
                </div>
                </fieldset>
                <div class="buttons">
                <div class="pull-right">
                    <input type="submit" class="btn btn-primary" value="ثبت نام">
                </div>
                </div>
            
            </div>
        </form>
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