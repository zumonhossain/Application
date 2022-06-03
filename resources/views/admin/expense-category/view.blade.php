@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> View Expense Category</h4>
                    <a href="{{url('admin/expense/category')}}" class="all_link"><i class="mdi mdi-apps"></i> All Category</a>
                </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <div class="card-body">
                            @if(Session::has('success'))
                                <script type="text/javascript">
                                    swal({title: "Success!", text: "Income Information Update Successfully", icon: "success", button: "OK", timer:5000,});
                                </script>
                            @endif
                            @if(Session::has('error'))
                                <script type="text/javascript">
                                    swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                                </script>
                            @endif


                            @php
                                $expcid=$data->expcate_id;
                                $this_id_total_expense=App\Models\Expense::where('expense_status',1)->where('expcate_id',$expcid)->sum('expense_amount');
                            @endphp
                            <table class="table table-bordered table-striped table-hover custom_table">
                                <tr>
                                    <td>Created Date</td>
                                    <td>:</td>
                                    <td>{{$data->created_at->format('d M Y')}}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>{{$data->expcate_name}}</td>
                                </tr>
                                <tr>
                                    <td>Remarks</td>
                                    <td>:</td>
                                    <td>{{$data->expcate_remarks}}</td>
                                </tr>
                                <tr>
                                    <td>Total Expense</td>
                                    <td>:</td>
                                    <td>{{$this_id_total_expense}}.00</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
                <div class="card-footer print_none">
                    <a href="#" onclick="window.print()" class="btn btn-sm btn-info">Print</a>
                    <a href="#" class="btn btn-sm btn-warning">Excel</a>
                    <a href="{{url('admin/expense/category/pdf')}}" class="btn btn-sm btn-primary">PDF</a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection