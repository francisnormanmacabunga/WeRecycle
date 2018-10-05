@extends('layouts.frontend')
@include('layouts.app')

@section('content')











  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <tr>
          <th>Date</th>
          <th>Username</th>
          <th>Type of Account</th>
          <th>Activity</th>
        </tr>
        @foreach ($logs as $log)
        <tr>
          <td>{{ $log->updated_at }}</td>
          <td> {{ $log->user['username'] }} </td>
          <td> {{ $log->owner_type }} </td>
          <td>  {{ $log->type }} </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>



  <ol>
         @forelse ($logs as $log)
             <li>
                 {{ $log->customMessage }}
                 <ul>
                     @forelse ($log->customFields as $custom)
                         <li>{{ $custom }}</li>
                     @empty
                         <li>No details</li>
                     @endforelse
                 </ul>
             </li>
         @empty
             <p>No logs</p>
         @endforelse
     </ol>







@endsection
