@extends('backend.layouts.admin_master')

@section('content')
    <h2>ایجاد اسلایدر</h2>
    <br>
    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="link">لینک</label>
                <input type="text" name="link" class="form-control" placeholder="لینک محصول را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="image">تصویر برند</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1">فعال</option>
                    <option value="0">عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="ثبت برند">
            </div>
        </div>
    </form>
@endsection