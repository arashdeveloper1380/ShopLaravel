@extends('backend.layouts.admin_master')

@section('content')
    <h2>ایجاد برند</h2>
    <br>
    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="brand_fa">نام برند</label>
                <input type="text" name="brand_fa" class="form-control" placeholder="نام برند را وارد کنید...">
                @if ($errors->has('brand_fa'))
                    <span style="color: cornflowerblue">{{ $errors->first('brand_fa') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="brand_en">نام لاتین برند</label>
                <input type="text" name="brand_en" class="form-control" placeholder="نام لاتین برند را وارد کنید...">
                @if ($errors->has('brand_en'))
                    <span style="color: cornflowerblue">{{ $errors->first('brand_en') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="image">تصویر برند</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="category_fa">وضعیت</label>
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