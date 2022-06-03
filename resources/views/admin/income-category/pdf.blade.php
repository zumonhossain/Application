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
          <h1>All Income Category Information</h1>
          <table width="500" align="center">
            <tr>
                <th>Category Name</th>
                <th>Category Remarks</th>
                <th>Time</th>
            </tr>
              @foreach($all as $data)
              <tr>
                <td>{{$data->incate_name}}</td>
                <td>{{$data->incate_remarks}}</td>
                <td>{{$data->created_at->format('d M Y')}}</td>
              </tr>
              @endforeach
          </table>
      </div>
    </body>
</html>
