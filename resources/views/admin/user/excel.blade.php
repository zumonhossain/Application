<!DOCTYPE html>
<html>
    <head>
      <title>Excel</title>
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
        <h1>All User Information</h1>
        <table width="500" align="center">
            <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach($all as $data)
                <tr>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->phone}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </body>
</html>
