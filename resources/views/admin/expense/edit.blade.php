@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Expense Information</h4>
                    <a href="{{url('admin/expense')}}" class="all_link"><i class="mdi mdi-grid"></i> All Expense</a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <script type="text/javascript">
                            swal({title: "Success!", text: "Expense Category Update Successfully", icon: "success", button: "OK", timer:5000,});
                        </script>
                    @endif
                    @if(Session::has('error'))
                        <script type="text/javascript">
                            swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                        </script>
                    @endif
                    <form method="post" action="{{url('admin/expense/update')}}" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label">Expense Details</label>
                            <div class="col-md-7">
                                <input type="text" name="details" class="form-control" value="{{ $data->expense_details }}">
                                <input type="hidden" name="id" class="form-control" value="{{ $data->expense_id }}">
                                <input type="hidden" name="slug" class="form-control" value="{{ $data->expense_slug }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label">Expense Amount</label>
                            <div class="col-md-7">
                                <input type="text" name="amount" class="form-control" value="{{ $data->expense_amount }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label">Expense Date</label>
                            <div class="col-md-7">
                                <input type="text" name="date" class="form-control" value="{{ $data->expense_date }}">
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="control-label text-right col-md-3">Expense Category</label>
                            <div class="col-md-7">
                            @php
                                $categoryList = App\Models\ExpenseCategory::where('expcate_status',1)->get();
                            @endphp
                                <select class="form-control" name="category">
                                    <option value="">-- Select expense Category --</option>
                                    @foreach($categoryList as $list)
                                    <option value="{{$list->expcate_id}}" @if($list->expcate_id==$data->expcate_id) selected="selected" @endif >{{$list->expcate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info registration-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection