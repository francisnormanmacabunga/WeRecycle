@extends('layouts.donor-nav')
@section('content')
<div class="container">
    <div class="content">
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
                        <input style="float: left" type="submit" class="btn btn-primary" value="Update">
                        {!! Form::close() !!}


                    </td>
                    <td>
                        <?php //<input style="float: left"  type="submit" class="btn btn-primary" value="Update">  }} ?>


                        <form action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST">
                           {{csrf_field()}}
                           {{method_field('DELETE')}}
                           <input class="btn btn-danger" type="submit" value="Remove">
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
        <a role="button" class="btn btn-success" href="">Checkout</a>
    </div>
</div>


@endsection
