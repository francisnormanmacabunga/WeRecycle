@extends('layouts.frontend')
@include('layouts.donor-nav')

@section('content')
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h3>Welcome to the checkout page!</h3>
      </div>
      <div class="container col-md-5 center-align">
        <div class="card-deck mb-3 ">
          <div class="card mb-4 shadow-sm">
            <div class="card-header text-center">
              <h4 class="my-0 font-weight-normal">Billing Details</h4>
            </div>
            <div class="card-body text-center">
              <h1>Name:</h1>
              <h1 class="card-title pricing-card-title text-center">{{$donor->firstname}} {{$donor->lastname}}</h1>
              <hr style="margin:5px 0 5px 0;"><br>
              <dl class="row ">
                <dt class="col-sm-6">Address:</dt>
                <dd class="col-sm-4">{{$donor->street}}, {{$donor->city}}</dd>
                <dt class="col-sm-6">Barangay:</dt>
                <dd class="col-sm-4">{{$donor->barangay}}</dd>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $cartItem)
                        <tr>
                            <td>{{$cartItem->name}}</td>
                            <td>{{$cartItem->price}}</td>

                            <td width="50px">

                                {!! Form::open(['route' => ['cart.update',$cartItem->rowId], 'method' => 'PUT']) !!}
                                <input name="qty" type="number" value="{{$cartItem->qty}}" readonly>
                                {!! Form::close() !!}


                            </td>

                        </tr>

                    @endforeach
                    <tr>
                      <td><strong>Tax:</strong></td>
                      <td>Php {{Cart::tax()}} <br></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><strong>Sub-Total:</strong></td>
                      <td>Php {{Cart::subtotal()}} <br></td>
                      <td></td>
                    </tr>
                    @if($order->discountedprice != '')
                    <tr>
                        <td><strong>Discounted Price  :</strong</td>
                        <td>Php {{$order->discountedprice}}</td>
                        <td></td>
                    </tr>
                    @else
                    <tr>
                        <td><strong>Grand Total:</strong</td>
                        <td>Php {{Cart::total()}}</td>
                        <td></td>
                    </tr>
                    @endif
                    </tbody>
                </table>


              </dl>
              <hr style="margin:5px 0 5px 0;"><br>
                  <a href="/donor/checkout-cart/confirm{{$order->orderid}}"><button class="btn btn-lg btn-block btn-success">Confirm</button></a>
              <br>
              <a role="button" class="btn btn-danger" href="{{url('/donor/shopCatalog')}}">Cancel</a>
            </div>
          </div>
        </div>
      </div>



@endsection
