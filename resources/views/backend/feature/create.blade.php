@extends('backend.layouts.admin_master')

@section('content')
    <h2>ایجاد ویژگی محصول</h2>
    <br>
    <form action="{{ route('features.store') }}" method="POST">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="product_id">انتخاب محصول</label>
                <select name="product_id" class="form-control">
                    @foreach ($Product as $value)
                        <option value="{{ $value->id }}">{{ $value->title_fa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">عنوان ویژگی</label>
                <input type="text" name="name" class="form-control" placeholder="عنوان ویژگی را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="value">مقدار ویژگی</label>
                <input type="text" name="value" class="form-control" placeholder="مقدار ویژگی را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="category_fa">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1">فعال</option>
                    <option value="0">عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="ثبت ویژگی">
            </div>
        </div>
    </form>
@endsection