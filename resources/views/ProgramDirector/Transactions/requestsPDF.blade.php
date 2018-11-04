      <!DOCTYPE html>
      <html>
      <head>
      <style>
      table#requests {
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

      @page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 1cm;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 2cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
            }

            /** Define the footer rules **/
            footer {
             position: fixed;
             bottom: 0cm;
             left: 0cm;
             right: 0cm;
             height: 2cm;

             /** Extra personal styles **/
             background-color: #0f6b6b;
             color: white;
             text-align: center;
             line-height: 1.5cm;
         }

      </style>
      </head>
      <body>
        <footer>
            Copyright &copy; <?php echo date("Y");?> WeRecycle
        </footer>

        <h1 align="center"><img src="{{asset('assets/images/pdf-logo.png')}}" width="200px" length="200px"/></h1>
        <br>

        <table>
        <tr>
          <td><?php
            echo "<strong>Date: </strong>";
            $mydate=getdate(date("U"));
            echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
            ?></td>
          <td><?php
              echo "<strong>Time: </strong>" .date("h:i:sa");
          ?></td>
        </tr>
        <tr>
          <td><strong>Report Generated:</strong> Transaction</td>
          <td><strong>Sort:</strong> Requests</td>
        </tr>
    </table>

    <br/>

      @if(count($request) > 0)
      <table id="requests">
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
        @foreach($cart as $item)
               <tr>
                 <td> {{$requests->transid}} </td>
                 <td> {{date('F d, Y, h:i:sa', strtotime($requests->created_at))}} </td>
                 <td> {{$requests->donor->firstname}} {{$requests->donor->lastname}} </td>
                 <td> Barangay: {{$requests->donor->barangay}}, {{$requests->donor->street}}, {{$requests->donor->city}}, Zip: {{$requests->donor->zip}} </td>
                 <td> {{$requests->type}} </td>
                 <td>{{$item->name}}</td>
                 <td>{{$item->qty}}</td>
                 <td> {{$requests->status}} </td>
                 <td> {{$requests->volunteer['firstname']}} {{$requests->volunteer['lastname']}}</td>

               </tr>
               @endforeach
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
