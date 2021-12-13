@extends('backend.layouts.admin_master')

@section('content')
    <h2>تنظیمات سایت</h2>
    <br>
    <form action="{{ route('settings.update',$Setting->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="email">ایمیل</label>
                <input type="text" value="{{ $Setting->email }}" name="email" class="form-control" placeholder="ایمیل را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="mobile">موبایل</label>
                <input type="text" value="{{ $Setting->mobile }}" name="mobile" class="form-control" placeholder="موبایل را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="description">توضیحات سایت</label>
                <textarea name="description" class="form-control" cols="30" rows="10">{{ $Setting->description }}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ویرایش">
            </div>
        </div>
    </form>
@endsection