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
    <h2>لیست محصولات</h2>
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
    
    <a href="{{ route('product.create') }}" style="float: left;" class="btn btn-success">محصول جدید</a>
    <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>عنوان</th>
              <th>عنوان لاتین</th>
              <th>دسته</th>
              <th>برند</th>
              <th>عکس</th>
              <th>تاریخ</th>
              <th>وضعیت</th>
              <th>ویژه</th>
              <th>مدریت</th>
            </tr>
          </thead>
          <tbody>
              @php($i=1)
            @foreach ($Product as $key => $value)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $value->title_fa }}</td>
                    <td>{{ $value->title_en }}</td>
                    <td>{{ $value->category->category_fa }}</td>
                    <td>{{ $value->brand->brand_fa }}</td>
                    <td>
                        @if (!empty($value->image))
                            <img src="{{ url('upload/product').'/'.$value->image }}" width="150">
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
                    <td>
                        @if ($value->special == 1)
                            <span style="color: green; font-weight: bold">بله</span>
                            @else
                            <span style="color: crimson; font-weight: bold">خیر</span>
                            
                        @endif
                    </td>
                    <td style="width: 167px;">
                        <a href="{{ route('product.feature',$value->id) }}" class="btn btn-primary">ویژگی</a>
                        <a href="{{ route('product.edit',$value->id) }}" style="float: right" class="btn btn-warning">ویرایش</a>
                        <form action="{{ route('product.destroy',$value->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="float: right; margin: 0 29%">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{ $Product->links() }}
        </div>
@endsection