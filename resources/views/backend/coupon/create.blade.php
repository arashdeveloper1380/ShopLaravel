@extends('backend.layouts.admin_master')

@section('content')
    <h2>ایجاد تخفیف</h2>
    <br>
    <form action="{{ route('coupon.store') }}" method="POST">
        @csrf
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="code">کد تخفیف</label>
                <input type="text" name="code" class="form-control" placeholder="کد تخفیف را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="type">نوع تخفیف</label>
                <select name="type" class="form-control" id="select">
                    <option disabled selected>انتخاب کنید</option>
                    <option value="fix" id="fix">ثابت</option>
                    <option value="percentOff" id="percentOff">درصد</option>
                </select>
            </div>
            <div class="form-group">
                <label for="value">مقدار قیمت تخفیف</label>
                <input type="text" name="value" id="value" class="form-control" placeholder="مقدار قیمت تخفیف را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="percentOff">درصد تخفیف</label>
                <input type="text" name="percentOff" id="percentOff" class="form-control" placeholder="درصد تخفیف را وارد کنید...">
            </div>
            <div class="form-group">
                <label for="category_fa">وضعیت</label>
                <select name="status" class="form-control">
                    <option value="1">فعال</option>
                    <option value="0">عیر فعال</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="ثبت تخفیف">
            </div>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        $('select[name="type"]').on('change', function() { 
            let type = $(this).val();
            if(type == 'fix'){
                $('input[name="value"]').show();
                $('label[for="value"]').show();
                $('input[name="percentOff"]').hide();
                $('label[for="percentOff"]').hide();
            }
            else if (type == 'percentOff') {
                $('input[name="percentOff"]').show();
                $('label[for="percentOff"]').show();
                $('input[name="value"]').hide();
                $('label[for="value"]').hide();
            }
        });
    </script>
@endsection