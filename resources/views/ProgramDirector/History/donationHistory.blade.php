@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')

<div>
<div class="row">

      <h1>Donation History</h1>

      <table class="table table-bordered">
      <tr>
      <th>Username</th>
      <th>Type of donation</th>
      <th>Order(name,price,quantity)</th>
      <th>Assigned Volunteer</th>
      <th>Date</th>
      <th>Status</th>
    </tr>
    @foreach($transactions as $transaction)

    <tr>
        @foreach($transaction->cart as $item)
        <span>{{ $item['name'] }},{{ $item['price'] }},[[ $item['qty'] ]]</span>
        @endforeach
    </tr>

  </table>
@endforeach


</div>
</div>
</div>

@endsection
