@extends('layouts.donor-nav')
@section('content')
<div class="container">
    <div class="content">
      @if(session()->has('notif'))
      <div class="content">
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>{{session()->get('notif')}}</strong>
        </div>
      </div>
      @endif
        <h3>Cart Items</h3>


        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $cartItem)
                <tr>
                    <td>{{$cartItem->name}}</td>
                    <td>{{$cartItem->price}}</td>

                    <td width="50px">

                        {!! Form::open(['route' => ['cart.update',$cartItem->rowId], 'method' => 'PUT']) !!}
                        <input name="qty" type="number" value="{{$cartItem->qty}}">
                        <br />
                        <br />
                        <input style="float: left"  type="submit" onclick="return confirm('Do you want to update this item?')" class="btn btn-primary btn-sm"  value="Update">
                        {!! Form::close() !!}


                    </td>
                    <td>

                        <form action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST">
                           {{csrf_field()}}
                           {{method_field('DELETE')}}
                           <input class="btn btn-danger" onclick="return confirm('Do you want to delete this item?')" type="submit" value="Remove">
                         </form>
                    </td>
                </tr>
            @endforeach

            <tr>
                <td></td>
                <td>
                    <strong>Tax:</strong> Php {{Cart::tax()}} <br>
                    <strong>Sub Total:</strong> Php {{Cart::subtotal()}} <br>
                    <strong>Grand Total:</strong> Php {{Cart::total()}}
                </td>
                <td><strong>Items:</strong> {{Cart::count()}}

                </td>
                <td></td>
                <td></td>

            </tr>
            </tbody>
        </table>

        <a role="button" class="btn btn-success" href="/checkout">Checkout</a>
        <a role="button" class="btn btn-danger" href="/donor/shopCatalog">
          Back</a>
    </div>
</div>


@endsection
