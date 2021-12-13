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
    <h2>لیست شبکه اجتماعی</h2>
    <br>
    @if (Session::has('msg'))
        <div class="msg">
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        </div>
    @endif
    @if (Session::has('updatemsg'))
        <div class="msg">
            <div class="alert alert-warning">{{ Session::get('updatemsg') }}</div>
        </div>
    @endif
    @if (Session::has('deletemsg'))
        <div class="msg">
            <div class="alert alert-danger">{{ Session::get('deletemsg') }}</div>
        </div>
    @endif
    
    <a href="{{ route('social.create') }}" style="float: left;" class="btn btn-success">شبکه اجتماعی جدید</a>
    <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>نام شبکه اجتماعی</th>
              <th>نام لاتین</th>
              <th>تاریخ</th>
              <th>وضعیت</th>
              <th>مدریت</th>
            </tr>
          </thead>
          <tbody>
              @php($i=1)
            @foreach ($Social as $key => $value)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $value->social_fa }}</td>
                    <td>{{ $value->social_en }}</td>
                    <td>{{ Facades\Verta::instance($value->created_at)->formatJalaliDate() }}</td>
                    <td>
                        @if ($value->status == 1)
                            <span style="color: green; font-weight: bold">فعال</span>
                            @else
                            <span style="color: crimson; font-weight: bold">غیر فعال</span>
                            
                        @endif
                    </td>
                    <td style="width: 167px;">
                        <a href="{{ route('social.edit',$value->id) }}" style="float: right" class="btn btn-warning">ویرایش</a>
                        <form action="{{ route('social.destroy',$value->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="float: right">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{ $Social->links() }}
        </div>
@endsection