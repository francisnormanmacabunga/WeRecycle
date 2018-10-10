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
              <h1 class="card-title pricing-card-title text-center">{{$order->fname}} {{$order->lname}}</h1>
              <hr style="margin:5px 0 5px 0;"><br>
              <dl class="row ">
                <dt class="col-sm-6">Address:</dt>
                <dd class="col-sm-4">{{$order->street}}, {{$order->city}}</dd>
                <dt class="col-sm-6">Barangay:</dt>
                <dd class="col-sm-4">{{$order->barangay}}</dd>
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

                    </tbody>
                </table>


              </dl>
              <hr style="margin:5px 0 5px 0;"><br>
            <form action="/checkout-cart/edit{{$order->orderid}}">
                  <input type="submit" value="Edit Billing Details" class="btn btn-lg btn-block btn-primary" />
            </form>
            </br>
              <form action="/donor/checkout-cart/confirm{{$order->orderid}}">
                  <input type="submit" value="Confirm" class="btn btn-lg btn-block btn-success" />
              </form>
            </div>
          </div>
        </div>
      </div>


@endsection
