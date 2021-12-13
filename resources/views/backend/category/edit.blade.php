@extends('backend.layouts.admin_master')

@section('content')
    <h2>ویرایش دسته: <span style="color: cornflowerblue">{{ $Category->category_fa }} <span style="color: green">|</span> <span style="color: crimson">{{ $Category->category_en }}</span></span></h2>
    <br>
    <form action="{{ route('category.update',$Category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="category_fa">نام دسته</label>
                <input type="text" name="category_fa" value="{{ $Category->category_fa }}" class="form-control" placeholder="نام دسته را وارد کنید...">
                @if ($errors->has('category_fa'))
                    <span style="color: cornflowerblue">{{ $errors->first('category_fa') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="category_en">نام لاتین دسته</label>
                <input type="text" name="category_en" value="{{ $Category->category_en }}" class="form-control" placeholder="نام لاتین دسته را وارد کنید...">
                @if ($errors->has('category_en'))
                    <span style="color: cornflowerblue">{{ $errors->first('category_en') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="image">تصویر دسته</label>
                <input type="file" name="image" class="form-control">
                @if (!empty($Category->image))
                    <img src="{{ asset('upload/category').'/'.$Category->image }}" width="150">
                @endif
            </div>
            <div class="form-group">
                <label for="category_fa">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1" @if ($Category->status == 1) selected @endif>فعال</option>
                    <option value="0" @if ($Category->status == 0) selected @endif>عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ویرایش دسته">
            </div>
        </div>
    </form>
@endsection