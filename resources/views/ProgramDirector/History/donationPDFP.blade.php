    <!DOCTYPE html>
    <html>
    <head>
    <style>
    table#donation {
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
        <td><strong>Report Generated:</strong> Donation History</td>
        <td><strong>Sort:</strong> Delivered Donation</td>
      </tr>
    </table>

    <br/>

    @if(count($donation) >= 0)
    <table id="donation">
      <tr>
        <th>Transaction ID</th>
        <th>Assigned Volunteer</th>
        <th>Type of Donation</th>
        <th>Weight</th>
        <th>Date</th>
        <th>Status</th>
      </tr>
      @foreach ($donation as $donations)
         @php
           $cart = json_decode($donations->cart);
         @endphp
      @foreach($cart as $item)
             <tr>
                <td> {{$donations->transid}} </td>
               <td>{{$donations->volunteer['firstname']}} {{$donations->volunteer['lastname']}}</td>
               <td>{{$item->name}}</td>
               <td>{{$item->qty}}</td>
               <td>{{date('F d, Y, h:i:sa', strtotime($donations->created_at))}}</td>
               <td>{{$donations->status}}</td>

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