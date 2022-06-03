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
          <h1>All Expense Information</h1>
          <table width="500" align="center">
              <tr>
                <th>No</th>
                <th>Expense Details</th>
                <th>Expense Category Name</th>
                <th>Expense Amount</th>
                <th>Expense Date</th>
              </tr>
              @php
                $i=1;
              @endphp
              @foreach($all as $data)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->expense_details}}</td>
                <td>{{$data->category->expcate_name}}</td>
                <td>{{$data->expense_amount}}</td>
                <td>{{$data->expense_date}}</td>
              </tr>
              @endforeach
          </table>
      </div>
    </body>
</html>
