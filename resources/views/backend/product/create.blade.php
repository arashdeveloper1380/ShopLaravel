@extends('backend.layouts.admin_master')

@section('content')
    <h2>ایجاد محصول</h2>
    <br>
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="title_fa">عنوان محصول</label>
                    <input type="text" name="title_fa" class="form-control" placeholder="عنوان محصول را وارد کنید...">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="title_en">عنوان لاتین محصول</label>
                    <input type="text" name="title_en" class="form-control" placeholder="عنوان لاتین محصول را وارد کنید...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="title_fa">انتخاب دسته</label>
                    <select name="category_id" class="form-control">
                        @foreach ($Category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category_fa }}|{{ $cat->category_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="title_en">انتخاب برند</label>
                    <select name="brand_id" class="form-control">
                        @foreach ($Brand as $br)
                            <option value="{{ $br->id }}">{{ $br->brand_fa }}|{{ $br->brand_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="title_en">توضیحات</label>
                <textarea name="desc_fa" class="ckeditor"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="title_en">توضیحات لاتین</label>
                <textarea name="desc_en" class="ckeditor"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="price">قیمت محصول</label>
                    <input type="text" name="price" class="form-control" placeholder="قیمت محصول را وارد کنید...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="image">تصویر محصول</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select name="status" class="form-control">
                            <option value="1">فعال</option>
                            <option value="0">غیر فعال</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="title_fa">محصول ویژه</label>
                    <select name="special" class="form-control">
                            <option value="1">فعال</option>
                            <option value="0">غیر فعال</option>
                    </select>
                </div>
            </div>
        </div>
        <input type="submit" value="ثبت محصول" class="btn btn-success">
    </form>
@endsection

@section('footer')
    <script src="{{ asset('Backend/ckeditor/ckeditor.js') }}"></script>
@endsection