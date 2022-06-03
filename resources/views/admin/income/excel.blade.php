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
          <h1>All Income Information</h1>
          <table width="500" align="center">
              <tr>
                <th>Income Details</th>
                <th>Income Category Name</th>
                <th>Income Amount</th>
                <th>Income Date</th>
              </tr>
              @foreach($all as $data)
              <tr>
                <td>{{$data->income_details}}</td>
                <td>{{$data->category->incate_name}}</td>
                <td>{{$data->income_amount}}</td>
                <td>{{$data->income_date}}</td>
              </tr>
              @endforeach
          </table>
      </div>
    </body>
</html>
