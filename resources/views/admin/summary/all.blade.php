@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"> Monthly Summary</h4>
                    <a href="{{url('admin/expense/add')}}" class="all_link btn"><i class="mdi mdi-apps"></i> Expense</a>
                    <a href="{{url('admin/income/add')}}" class="all_link"><i class="mdi mdi-apps"></i> Income</a>
                </div>
                <div class="card-body">
                    <div class="row print_none">
                        <div class="col-md-9">
                            <form action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input_box">
                                                <div class="input-group-addon">
                                                        <i class="fa fa-calendar pr-1"></i> From
                                                    </div>
                                                <input type="text" name="from" class="form-control" id="datepickerForm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input_box">
                                                <div class="input-group-addon">
                                                        <i class="fa fa-calendar pr-1"></i> To
                                                    </div>
                                                <input type="text" name="to" class="form-control" id="datepickerTo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="button" class="btn btn-dark btn-md btn-fill btnu" id="search" value="SEARCH">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3 text-right text-danger pt-3">
                            <p>Month : <span>{{$fullMonth}}</span></p>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
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
                </div>
                <div class="card-footer print_none">
                    <a href="#" onclick="window.print()" class="btn btn-sm btn-info">Print</a>
                    <a href="{{ url('admin/summary/excel') }}" class="btn btn-sm btn-warning">Excel</a>
                    <a href="{{ url('admin/summary/pdf') }}" class="btn btn-sm btn-primary">PDF</a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

