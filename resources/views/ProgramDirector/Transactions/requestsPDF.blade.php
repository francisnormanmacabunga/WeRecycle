      <!DOCTYPE html>
      <html>
      <head>
      <style>
      table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
      }

      td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 6px;
      }

      tr:nth-child(even) {
          background-color: #dddddd;
      }
      </style>
      </head>
      <body>
        <h1 align="center"><img src="{{asset('assets/images/logo-icon.png')}}"/>WeRecycle</h1>
        <br>
        <?php
        echo "<strong>Date: </strong>";
        $mydate=getdate(date("U"));
        echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Time: </strong>" .date("h:i:sa");
        ?>
        <p><strong>Report Generated:</strong> Transaction&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Sort:</strong> Requests</p>
       @if(count($request) > 0)
      <table>
        <tr>
                <th>Transaction ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Address</th>
                <th>Item Type</th>
                <th>Item Name</th>
                <th>Item Weight</th>
                <th>Status</th>
                <th>Assigned Volunteer</th>
        </tr>

        @foreach ($request as $requests)
           @php
             $cart = json_decode($requests->cart);
           @endphp
               <tr>
                 <td> {{$requests->transid}} </td>
                 <td> {{date('F d, Y, h:i:sa', strtotime($requests->created_at))}} </td>
                 <td> {{$requests->donor->firstname}} {{$requests->donor->lastname}} </td>
                 <td> Barangay: {{$requests->donor->barangay}}, {{$requests->donor->street}}, {{$requests->donor->city}}, Zip: {{$requests->donor->zip}} </td>
                 <td> {{$requests->type}} </td>
                 @foreach($cart as $item)
                 <td>{{$item->name}}</td>
                 <td>{{$item->qty}}</td>
                 @endforeach
                 <td> {{$requests->status}} </td>
                 <td> {{$requests->volunteer['firstname']}} {{$requests->volunteer['lastname']}}</td>
               </tr>
               @endforeach
      </table>
      @else
          <div align="center" style="color:red;">
            <h4 style="font-family:serif;">No requests found.</h4>
          </div>
          @endif
          </div>
          </div>
        </div>



      </body>
      </html>
