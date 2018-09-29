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
            @foreach($donateItems as $donateItem)
                <tr>
                    <td>{{$donateItem->name}}</td>
                    <td width="50px">
                        {!! Form::open(['route' => ['donate.update',$donateItem->rowId], 'method' => 'PUT']) !!}
                        <input name="qty" type="number" value="{{$donateItem->qty}}">


                    </td>


                    <td>
                        <input style="float: left"  type="submit" class="btn btn-primary" value="Update">
                        {!! Form::close() !!}

                        <form action="{{route('donate.destroy',$donateItem->rowId)}}"  method="POST">
                           {{csrf_field()}}
                           {{method_field('DELETE')}}
                           <input class="btn btn-danger" type="submit" value="Remove">
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
        <a role="button" class="btn btn-success" href="">
          Summary</a>
    </div>
</div>


@endsection
