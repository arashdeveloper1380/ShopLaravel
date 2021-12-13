@extends('backend.layouts.admin_master')

@section('content')
    <h2>ویرایش برند: <span style="color: cornflowerblue">{{ $Brand->brand_fa }} <span style="color: green">|</span> <span style="color: crimson">{{ $Brand->brand_en }}</span></span></h2>
    <br>
    <form action="{{ route('brand.update',$Brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="brand_fa">نام برند</label>
                <input type="text" name="brand_fa" value="{{ $Brand->brand_fa }}" class="form-control" placeholder="نام برند را وارد کنید...">
                @if ($errors->has('brand_fa'))
                    <span style="color: cornflowerblue">{{ $errors->first('brand_fa') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="brand_en">نام لاتین برند</label>
                <input type="text" name="brand_en" value="{{ $Brand->brand_en }}" class="form-control" placeholder="نام لاتین برند را وارد کنید...">
                @if ($errors->has('brand_en'))
                    <span style="color: cornflowerblue">{{ $errors->first('brand_en') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="image">تصویر برند</label>
                <input type="file" name="image" class="form-control">
                @if (!empty($Brand->image))
                    <img src="{{ asset('upload/brand').'/'.$Brand->image }}" width="150">
                @endif
            </div>
            <div class="form-group">
                <label for="category_fa">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1" @if ($Brand->status == 1) selected @endif>فعال</option>
                    <option value="0" @if ($Brand->status == 0) selected @endif>عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ویرایش برند">
            </div>
        </div>
    </form>
@endsection