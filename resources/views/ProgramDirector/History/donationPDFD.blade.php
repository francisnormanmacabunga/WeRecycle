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
          padding: 8px;
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
        echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Time: </strong>" .date("h:i:sa");
        ?>
        <p><strong>Report Generated:</strong> Donation History &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Sort:</strong> Delivered Donations</p>
      <table>
        <tr>
          <th>Assigned Volunteer</th>
          <th>Type of Donation</th>
          <th>Weight</th>
          <th>Date</th>
          <th>Status</th>
        </tr>

              @if(count($donation) >= 0)
               @foreach ($donation as $donations)
                 @php
                   $cart = json_decode($donations->cart);
                 @endphp
               <tr>
                 <td>{{$donations->volunteer['firstname']}} {{$donations->volunteer['lastname']}}</td>
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


      </body>
      </html>
