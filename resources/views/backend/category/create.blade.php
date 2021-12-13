@extends('backend.layouts.admin_master')

@section('content')
    <h2>ایجاد دسته</h2>
    <br>
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="category_fa">نام دسته</label>
                <input type="text" name="category_fa" class="form-control" placeholder="نام دسته را وارد کنید...">
                @if ($errors->has('category_fa'))
                    <span style="color: cornflowerblue">{{ $errors->first('category_fa') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="category_en">نام لاتین دسته</label>
                <input type="text" name="category_en" class="form-control" placeholder="نام لاتین دسته را وارد کنید...">
                @if ($errors->has('category_en'))
                    <span style="color: cornflowerblue">{{ $errors->first('category_en') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="image">تصویر دسته</label>
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
                <input type="submit" class="btn btn-success" value="ثبت دسته">
            </div>
        </div>
    </form>
@endsection