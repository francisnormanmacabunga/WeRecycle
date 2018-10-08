@extends('layouts.donor-nav')
@section('content')
<div class="container">
    <div class="content">
        <h3>Donation list</h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $cartItem)
                <tr>
                    <td>{{$cartItem->name}}</td>

                    <td width="50px">
                        {!! Form::open(['route' => ['donate.update',$cartItem->rowId], 'method' => 'PUT']) !!}
                        <input name="qty" type="number" value="{{$cartItem->qty}}">
                        <br />
                        <br />
                        <input style="float: left" type="submit" onclick="return confirm('Do you want to update this item?')" class="btn btn-primary btn-sm" value="Update Qty">
                        {!! Form::close() !!}

                    </td>
                    <td>
                        <form action="{{route('donate.destroy',$cartItem->rowId)}}"  method="POST">
                           {{csrf_field()}}
                           {{method_field('DELETE')}}
                           <input class="btn btn-danger" type="submit" onclick="return confirm('Do you want to delete this item?')" value="Remove">
                         </form>
                    </td>
                </tr>
            @endforeach

            <tr>
                <td></td>
                <td><strong>Items:</strong> {{Cart::count()}}

                </td>
                <td></td>
                <td></td>

            </tr>
            </tbody>
        </table>
        <a role="button" class="btn btn-success" href="/donor/submit-donate">
          Summary</a>
          <a role="button" class="btn btn-danger" href="/donor/donationCatalog">
            Back</a>
    </div>
</div>


@endsection
