<!DOCTYPE html>
<html>
    <head>
      <title>PDF</title>
      <style>
          .wrapper{
            width: 600px;
            margin: 0px auto;
          }

          h1{
              text-align: center;
          }


      </style>
    </head>
    <body>
      <div class="wrapper">
          <h1>All Expense Category</h1>
          <table width="500" align="center">
              <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Category Remarks</th>
                <th>Time</th>
              </tr>
              @php
                $i=1;
              @endphp
              @foreach($all as $data)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->expcate_name}}</td>
                <td>{{$data->expcate_remarks}}</td>
                <td>{{$data->created_at->format('d M Y')}}</td>
              </tr>
              @endforeach
          </table>
      </div>
    </body>
</html>
