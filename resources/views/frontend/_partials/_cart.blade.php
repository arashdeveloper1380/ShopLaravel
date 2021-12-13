<table class="table">
    <tbody>
      @foreach (Cart::content() as $cart)
        <tr>
          <td class="text-center"><a href="{{ url('product').'/'.$cart->id.'/'.$cart->name }}"><img class="img-thumbnail" width="100" title="{{ $cart->name }}" alt="{{ $cart->name }}" src="{{ asset('upload/product').'/'.$cart->model->image }}"></a></td>
          <td class="text-left"><a href="product.html">{{ $cart->name }}</a></td>
          <td class="text-right">{{ $cart->qty }}</td>
          <td class="text-right">{{ $cart->price }} تومان</td>
          <td class="text-center">
            <form action="{{ route('cart.destroy',$cart->rowId) }}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-xs remove" title="حذف" type="submit"><i class="fa fa-times"></i></button>
            </form>
            
          </td>
        </tr>
      @endforeach
      
    </tbody>
  </table>