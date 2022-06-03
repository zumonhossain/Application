@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Expense Information </h4>
                    <a href="{{url('admin/expense')}}" class="all_link"><i class="mdi mdi-grid"></i> All Expense</a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <script type="text/javascript">
                            swal({title: "Success!", text: "Expense Information save Successfully", icon: "success", button: "OK", timer:5000,});
                        </script>
                    @endif
                    @if(Session::has('error'))
                        <script type="text/javascript">
                            swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                        </script>
                    @endif
                    <form method="post" action="{{url('admin/expense/submit')}}" class="form-horizontal">
                        @csrf
                        <div class="form-group row {{ $errors->has('details') ? ' has-error' : '' }}">
                            <label class="col-md-3 text-right control-label col-form-label"> Expense Details<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="details" class="form-control" placeholder="enter expense details" value="{{old('expense_details')}}">
                                @if ($errors->has('details'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label class="col-md-3 text-right control-label col-form-label"> Expense Amount<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="number" name="amount" class="form-control" placeholder="expense amount" value="{{old('expense_amount')}}">
                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('date') ? ' has-error' : '' }}">
                            <label class="col-md-3 text-right control-label col-form-label"> Expense Date<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="date" name="date" class="form-control" placeholder="expense date" value="{{old('expense_date')}}">
                                @if ($errors->has('date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="control-label text-right col-md-3">Expcate Category<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                @php
                                    $all=App\Models\ExpenseCategory::where('expcate_status',1)->orderBy('expcate_id','ASC')->get();
                                @endphp
                                <select class="form-control" name="category">
                                    <option value="">-- Select expense Category --</option>
                                    @foreach($all as $data)
                                        <option value="{{ $data->expcate_id }}">{{ $data->expcate_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info registration-btn">Save expense</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection