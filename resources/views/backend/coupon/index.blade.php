@extends('backend.layouts.admin_master')

@section('header')
    <style>
        td{
            vertical-align: middle !important;
        }
        th,td{
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <h2>لیست تخفیفات</h2>
    <br>
    @if (Session::has('msg'))
        <div class="msg">
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        </div>
    @endif
    @if (Session::has('deletemsg'))
        <div class="msg">
            <div class="alert alert-danger">{{ Session::get('deletemsg') }}</div>
        </div>
    @endif
    
    <a href="{{ route('coupon.create') }}" style="float: left;" class="btn btn-success">کد تخفیف جدید</a>
    <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>کد تخفیف</th>
              <th>نوع تخفیف</th>
              <th>تخفیف ثابت</th>
              <th>تخفیف درصدی</th>
              <th>تاریخ</th>
              <th>وضعیت</th>
              <th>مدریت</th>
            </tr>
          </thead>
          <tbody>
              @php($i=1)
            @foreach ($Coupon as $key => $value)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $value->code }}</td>
                    <td>
                        @if ($value->type == 'fix')
                            ثابت
                        @else
                            درصد
                        @endif
                    </td>
                    <td>
                        @if ($value->value)
                            <span style="color: cornflowerblue;font-weight: bold">{{ $value->value }} تومان</span>
                        @else
                            <div class="alert alert-danger" style="color: darkred">ندارد</div>
                        @endif
                    </td>
                    <td>
                        @if ($value->percentOff)
                            <span style="color: cornflowerblue;font-weight: bold">{{ $value->percentOff }} % </span>
                        @else
                            <div class="alert alert-danger" style="color: darkred">ندارد</div>
                        @endif
                    </td>
                    <td>{{ Facades\Verta::instance($value->created_at)->formatJalaliDate() }}</td>
                    <td>
                        @if ($value->status == 1)
                            <span style="color: green; font-weight: bold">فعال</span>
                            @else
                            <span style="color: crimson; font-weight: bold">غیر فعال</span>
                            
                        @endif
                    </td>
                    <td style="width: 167px;">
                        <form action="{{ route('coupon.destroy',$value->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="float: right">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{ $Coupon->links() }}
        </div>
@endsection