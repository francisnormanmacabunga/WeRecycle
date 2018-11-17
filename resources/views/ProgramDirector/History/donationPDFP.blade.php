    <!DOCTYPE html>
    <html>
    <head>
    <style>
    table#donation {
        font-size: 15px;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
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
       p{
         float: right;
       }

    </style>
    </head>
    <body>
      <footer>
          Copyright &copy; <?php echo date("Y");?> WeRecycle&trade;
      </footer>
        <p><strong>
        WeRecycle&trade;</strong><br>2142 Jesus St. Pandacan, Manila, 1011 Metro Manila<br>
        <strong>Contact Number:</strong> 0928 428 0144 or 0917 828 3672</p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="{{asset('assets/images/4.png')}}" width="200px" length="200px"/>
      <br>
      <table>
      <tr>
        <td><?php
          echo "<strong>Date: </strong>";
          $mydate=getdate(date("U"));
          echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
          ?></td>
          <td><strong>Sort:</strong> Processsing</td>
      </tr>
      <tr>
        <td><strong>Report Generated:</strong> Donation History</td>
        <td><strong>Printed By:</strong> {{Auth::user()->firstname}} {{Auth::user()->lastname}}</td>
      </tr>
    </table>
    <hr/>

<br>


    <table id="donation">
      <tr>
        <th>#</th>
        <th>Assigned Volunteer</th>
        <th>Type of Donation</th>
        <th>Weight</th>
        <th>Date</th>
      </tr>
      @if(count($donation) > 0)
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
               <td>{{date('F d, Y, h:i:sa', strtotime($donations->updated_at))}}</td>
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
