@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')

    <div class="row">
      <div class="col-lg-12">
        <br/>
        <br/>
          @if(count($donation) > 0)
          <table class="table table-bordered" class="fixed">
            <tr>
              <th>Assigned Volunteer</th>
              <th>Type of Donation</th>
              <th>Quantity</th>
              <th>@sortablelink('created_at', 'Date')</th>
              <th>Status</th>
            </tr>
            @foreach ($donation as $donations)
              @php
                $cart = json_decode($donations->cart);
              @endphp
            <tr>
              <td>{{$donations->volunteer->firstname}} {{$donations->volunteer->lastname}}</td>
              @foreach($cart as $item)
              <td>{{$item->name}}</td>
              <td>{{$item->qty}}</td>
            @endforeach
              <td>{{date('F d, Y, h:i:sa', strtotime($donations->created_at))}}</td>
              <td>{{$donations->status}}</td>
            </tr>
            @endforeach
        </table>
        @else
        <div align="center" style="color:red;">
          <br>
          <br>
          <h5 style="font-family:serif;">No records found.</h5>
        </div>
        @endif
      </div>
    </div>
{{$donation ->links()}}
@endsection
