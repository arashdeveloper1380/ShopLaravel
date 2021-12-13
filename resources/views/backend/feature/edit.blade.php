@extends('backend.layouts.admin_master')

@section('content')
    <h2>ویرایش ویژگی محصول | <span style="color: cornflowerblue">{{ $Feature->product->title_fa }}</span></h2>
    <br>
    <form action="{{ route('features.update',$Feature->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="product_id">انتخاب محصول</label>
                <select name="product_id" class="form-control">
                    @foreach ($Product as $value)
                        <option value="{{ $value->id }}" @if ($value->id == $Feature->product_id) selected @endif >{{ $value->title_fa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">عنوان ویژگی</label>
                <input type="text" name="name" value="{{ $Feature->name }}" class="form-control" placeholder="عنوان ویژگی را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="value">مقدار ویژگی</label>
                <input type="text" name="value" value="{{ $Feature->value }}" class="form-control" placeholder="مقدار ویژگی را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="category_fa">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1" @if($Feature->status == 1) selected @endif>فعال</option>
                    <option value="0" @if($Feature->status == 0) selected @endif>عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ویرایش ویژگی">
            </div>
        </div>
    </form>
@endsection