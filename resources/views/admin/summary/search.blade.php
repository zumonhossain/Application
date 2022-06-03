@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6" style="color:#fff;">
                            <span style="color:#ffb22b; font-weight:bold;">Searching :</span> <span >{{$from}}</span> <span style="color:#ffb22b;">to</span> <span class="todate">{{$to}}
                        </div>
                        <div class="col-md-6" style="float:right;">
                            <a href="{{url('admin/summary')}}" class="all_link"><i class="mdi mdi-apps"></i> Summary</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
                                @foreach($income as $data)
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
                                    <th style="text-align: right; color:gray;">Total =</th>
                                    <th style="color: #1976d2;">{{$incomeTotal}}</th>
                                    <th style="color: #1976d2;">{{$expenseTotal}}</th>
                                </tr>                                        
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card-footer print_none">
                    <a href="#" onclick="window.print()" class="btn btn-sm btn-info">Print</a>
                    <a href="#" class="btn btn-sm btn-warning">Excel</a>
                    <a href="#" class="btn btn-sm btn-primary">PDF</a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
