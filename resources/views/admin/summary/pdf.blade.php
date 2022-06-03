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
            <h1>MONTHLY SUMMARY</h1>
            <table id="inexsummary" class="table table-bordered table-striped table-hover custom_table">
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
                    @foreach($incomes as $data)
                    <tr>
                        <td>{{$data->income_date}}</td>
                        <td>{{$data->category->incate_name}}</td>
                        <td>{{$data->income_details}}</td>
                        <td>{{$data->income_amount}}</td>
                        <td>---</td>
                    </tr>
                    @endforeach
                    @foreach($expense as $data)
                    <tr>
                        <td>{{$data->expense_date}}</td>
                        <td>{{$data->category->expcate_name}}</td>
                        <td>{{$data->expense_details}}</td>
                        <td>---</td>
                        <td>{{$data->expense_amount}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th style="text-align: right; color:gray;">Total = </th>
                        <th style="color: #1976d2;">{{$incomeTotal}}</th>
                        <th style="color:#1976d2;">{{$expenseTotal}}</th>
                    </tr>
                    <tr>
                        <th class="text-center" colspan="5">
                            <span style="color:gray; ">Total Saving = </span>
                            @if($incomeTotal > $expenseTotal)
                                <span style="color: #1976d2;">{{$incomeTotal-$expenseTotal}}</span>
                            @else
                                <span style="color: #1976d2;">{{$incomeTotal-$expenseTotal}}</span>
                            @endif
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </body>
</html>
