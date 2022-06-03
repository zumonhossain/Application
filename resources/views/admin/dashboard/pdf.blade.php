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
          <h1>Last 7 Days Status</h1>
          <table id="seveendayreport" class="table table-bordered table-striped table-hover custom_table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Details</th>
                        <th>Credit</th>
                        <th>Debit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($last_7days_income as $data)
                    <tr>
                        <td>{{$data->income_date}}</td>
                        <td>{{$data->category->incate_name}}</td>
                        <td>{{$data->income_details}}</td>
                        <td>{{$data->income_amount}}.00</td>
                        <td>---</td>
                    </tr>
                    @endforeach
                    @foreach($last_7days_expense as $data)
                    <tr>
                        <td>{{$data->expense_date}}</td>
                        <td>{{$data->category->expcate_name}}</td>
                        <td>{{$data->expense_details}}</td>
                        <td>---</td>
                        <td>{{$data->expense_amount}}.00</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th  style="color:gray; text-align: right;">Total =</th>
                        <th style="color: #1976d2;">{{$last_7days_all_income}}.00</th>
                        <th style="color: #1976d2;">{{$last_7days_all_expense}}.00</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </body>
</html>
