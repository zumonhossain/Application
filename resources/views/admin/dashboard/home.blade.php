@extends('layouts.admin')
@section('content')
    <div class="card-group print_none">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-facebook"></i></h2>
                        <h3 class="">
                            @if($user<10)
                                0{{$user}}
                            @else
                                {{$user}}
                            @endif
                        </h3>
                        <h6 class="card-subtitle">All User</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i></h2>
                        <h3 class="">
                            @if($totalIncome<10)
                                0{{$totalIncome}}
                            @else
                                {{$totalIncome}}
                            @endif
                        </h3>
                        <h6 class="card-subtitle">Total Income</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-wallet text-purple"></i></h2>
                        <h3 class="">
                            @if($totalExpense<10)
                                0{{$totalExpense}}
                            @else
                                {{$totalExpense}}
                            @endif
                        </h3>
                        <h6 class="card-subtitle">Total Expense</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h2>
                        <h3 class="">
                            @if($totalIncome > $totalExpense)
                            <span">{{$totalIncome-$totalExpense}}</span>
                            @else
                            <span>{{$totalIncome-$totalExpense}}</span>
                            @endif
                        </h3>
                        <h6 class="card-subtitle">Total Savings</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 26%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"> Last 7 Days Status</h4>
                    <a href="{{url('admin/expense')}}" class="all_link btn"><i class="mdi mdi-apps"></i> Expense</a>
                    <a href="{{url('admin/income')}}" class="all_link"><i class="mdi mdi-apps"></i> Income</a>
                </div>
                <div class="card-body">
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
                <div class="card-footer print_none">
                    <a href="#" onclick="window.print()" class="btn btn-sm btn-info">Print</a>
                    <a href="{{url('admin/dashboard/excel')}}" class="btn btn-sm btn-warning">Excel</a>
                    <a href="{{url('admin/dashboard/pdf')}}" class="btn btn-sm btn-primary">PDF</a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection