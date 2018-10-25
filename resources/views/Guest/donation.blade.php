@extends('layouts.frontend')
@include('inc.navbar1')

@section('content')

  @if(session()->has('notif'))
  <div class="content">
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>{{session()->get('notif')}}</strong>
    </div>
  </div>
  @endif
    <div class="row">
      <div class="col-lg-3">
      <h3>Shop</h3>
      <div class="list-group">
        <a href="{{url('/donation')}}" class="list-group-item">Donation</a>
        <a href="{{url('/shop')}}" class="list-group-item">Fertilizer</a>
      </div>
      </div>
      <div class="col-lg-9">
        <div class="row">
          @if(count($products1) > 0)
            @foreach ($products1 as $products)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-70">
              <a href="#"><img src="{{ asset('images/' . $products->productimage) }}" width="200" height="200"></a>
                <a href="#"></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">{{$products->productname}}</a>
                  </h4>
                  <h5>{{$products->price}}</h5>
                  <p class="card-text">{{$products->description}}</p>
                    <a role="button" class="btn btn-success btn-lg" href="{{ route('cart.addItem',$products->productsID) }}">
                      Add to Cart</a>
                </div>
              </div>
            </div>
        @endforeach
        @else
          <div align="center" style="color:red;">
            <br>
            <br>
            <h5 style="font-family:serif;">No fertilizers available.</h5>
          </div>
        @endif
        </div>
      </div>
    </div>

@endsection
