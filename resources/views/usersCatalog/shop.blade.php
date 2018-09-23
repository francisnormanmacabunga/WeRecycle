@extends('layouts.frontend')
@include('layouts.donor-nav')

@section('content')

  <div class="row">
    <div class="col-lg-3">
    <h1>Fertilizer</h1>
    <div class="list-group">
        <a href="/donor/donationCatalog" class="list-group-item">Donation</a>
        <a href="/donor/shopCatalog" class="list-group-item">Fertilizer</a>
    </div>

    </div>
    <div class="col-lg-9">
      <div class="row">

        @if(count($products2) > 0)
          @foreach ($products2 as $products)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <a href="#"><img src="{{ asset('images/' . $products->productimage) }}"></a>
            <a href="#"></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">{{$products->productname}}</a>
              </h4>
              <h5>{{$products->price}}</h5>
              <p class="card-text">{{$products->description}}</p>
            </div>
          </div>
        </div>


      @endforeach
      @else
        <div align="center" style="color:red;">
          <h3>No fertilizers available.</h3>
        </div>
      @endif

      </div>
    </div>
  </div>

@endsection
