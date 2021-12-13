@extends('backend.layouts.admin_master')

@section('header')
    <style>
        td{
            vertical-align: middle !important;
        }
    </style>
@endsection

@section('content')
    <h2>لیست برند ها</h2>
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
    
    <a href="{{ route('brand.create') }}" style="float: left;" class="btn btn-success">برند جدید</a>
    <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>نام برند</th>
              <th>نام لاتین</th>
              <th>عکس</th>
              <th>تاریخ</th>
              <th>وضعیت</th>
              <th>مدریت</th>
            </tr>
          </thead>
          <tbody>
              @php($i=1)
            @foreach ($Brand as $key => $value)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $value->brand_fa }}</td>
                    <td>{{ $value->brand_en }}</td>
                    <td>
                        @if (!empty($value->image))
                            <img src="{{ url('upload/brand').'/'.$value->image }}" width="150">
                            @else
                            <span class="alert alert-danger">ندارد</span>
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
                        <a href="{{ route('brand.edit',$value->id) }}" style="float: right" class="btn btn-warning">ویرایش</a>
                        <form action="{{ route('brand.destroy',$value->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="float: right">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{ $Brand->links() }}
        </div>
@endsection