@extends('backend.layouts.admin_master')

@section('content')
    <h2>ویرایش شبکه اجتماعی <span style="color: cornflowerblue">{{ $Social->social_fa }} <span style="color: green">|</span> <span style="color: crimson">{{ $Social->social_en }}</span></span></h2>
    <br>
    <form action="{{ route('social.update',$Social->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="social_fa">نام شبکه اجتماعی</label>
                <input type="text" value="{{ $Social->social_fa }}" name="social_fa" class="form-control" placeholder="نام شبکه اجتماعی را وارد کنید...">
                @if ($errors->has('social_fa'))
                    <span style="color: cornflowerblue">{{ $errors->first('social_fa') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="social_en">نام لاتین</label>
                <input type="text" value="{{ $Social->social_en }}" name="social_en" class="form-control" placeholder="نام لاتین را وارد کنید...">
                @if ($errors->has('social_en'))
                    <span style="color: cornflowerblue">{{ $errors->first('social_en') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="link">لینک شبکه اجتماعی</label>
                <input type="text" value="{{ $Social->link }}" name="link" class="form-control" placeholder="لینک شبکه اجتماعی را وارد کنید...">
                @if ($errors->has('link'))
                    <span style="color: cornflowerblue">{{ $errors->first('link') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="category_fa">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1" @if ($Social->status == 1) selected @endif>فعال</option>
                    <option value="0" @if ($Social->status == 0) selected @endif>عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="ویراش شبکه اجتماعی">
            </div>
        </div>
    </form>
@endsection