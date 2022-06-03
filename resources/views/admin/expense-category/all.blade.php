@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Expense Category</h4>
                    <a href="{{url('admin/expense/category/add')}}" class="all_link"><i class="mdi mdi-apps"></i> Add Category</a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <script type="text/javascript">
                            swal({title: "Success!", text: "Income Category Softdelete Successfully", icon: "success", button: "OK", timer:5000,});
                        </script>
                    @endif
                    @if(Session::has('error'))
                        <script type="text/javascript">
                            swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                        </script>
                    @endif
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Created Time</th>
                                <th>Category Name</th>
                                <th>Category Remarks</th>
                                <th>Total Expense</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all as $data)
                            
                            @php
                                $expcid=$data->expcate_id;
                                $this_id_expense=App\Models\Expense::where('expense_status',1)->where('expcate_id',$expcid)->count();
                                $this_id_total_expense=App\Models\Expense::where('expense_status',1)->where('expcate_id',$expcid)->sum('expense_amount');
                            @endphp
                            <tr>
                                <td>{{$data->created_at->format('Y-m-d')}}</td>
                                <td>{{$data->expcate_name}}</td>
                                <td>{{$data->expcate_remarks}}</td>
                                <td>{{$this_id_total_expense}}.00</td>
                                <td>
                                    <a class="btn-success view-icon" href="{{url('admin/expense/category/view/'.$data->expcate_slug)}}"><i class="mdi mdi-library-plus"></i></a>
                                    <a class="btn-info edit-icon" href="{{url('admin/expense/category/edit/'.$data->expcate_slug)}}"><i class="mdi mdi-table-edit"></i></a>
                                    
                                    @if($this_id_expense == '0')
                                    <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$data->expcate_id}}" href="#"><i class="mdi mdi-delete"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer print_none">
                    <a href="#" onclick="window.print()" class="btn btn-sm btn-info">Print</a>
                    <a href="{{url('admin/expense/category/excel')}}" class="btn btn-sm btn-warning">Excel</a>
                    <a href="{{url('admin/expense/category/pdf')}}" class="btn btn-sm btn-primary">PDF</a>
                </div>
                </div>
            </div>
        </div>
    </div>


    <!--delete modal code start -->
     <div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ url('admin/expense/category/softdelete') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header modal_header_title">
                    <h5><i class="fa fa-gg-circle"></i> Confirm Message</h5>
                </div>
                <div class="modal-body modal_card">
                    <input type="hidden" name="modal_id" id="modal_id" />
                    Are you want to sure delete this data?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect">Confirm</button>
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection