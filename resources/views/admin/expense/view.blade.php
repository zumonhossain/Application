@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info print_none">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> View Expense Information</h4>
                    <a href="{{url('admin/expense')}}" class="all_link"><i class="mdi mdi-apps"></i> All Expense</a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <script type="text/javascript">
                            swal({title: "Success!", text: "Expense Information Update Successfully", icon: "success", button: "OK", timer:5000,});
                        </script>
                    @endif
                    @if(Session::has('error'))
                        <script type="text/javascript">
                            swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                        </script>
                    @endif
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered table-striped table-hover custom_table">
                                <tr>
                                    <td>Expense Date</td>
                                    <td>:</td>
                                    <td>{{$data->expense_date}}</td>
                                </tr>
                                <tr>
                                    <td>Expense Details</td>
                                    <td>:</td>
                                    <td>{{$data->expense_details}}</td>
                                </tr>
                                <tr>
                                    <td>Expense Category</td>
                                    <td>:</td>
                                    <td>{{$data->category->expcate_name}}</td>
                                </tr>
                                <tr>
                                    <td>Expense Amount</td>
                                    <td>:</td>
                                    <td>{{$data->expense_amount}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
                <div class="card-footer print_none">
                    <a href="#" onclick="window.print()" class="btn btn-sm btn-info">Print</a>
                    <a href="#" class="btn btn-sm btn-warning">Excel</a>
                    <a href="{{url('admin/expense/pdf')}}" class="btn btn-sm btn-primary">PDF</a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection