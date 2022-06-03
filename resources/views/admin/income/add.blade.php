@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Income Information </h4>
                    <a href="{{url('admin/income')}}" class="all_link"><i class="mdi mdi-grid"></i> All Income</a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <script type="text/javascript">
                            swal({title: "Success!", text: "Income Information save Successfully", icon: "success", button: "OK", timer:5000,});
                        </script>
                    @endif
                    @if(Session::has('error'))
                        <script type="text/javascript">
                            swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                        </script>
                    @endif
                    <form method="post" action="{{url('admin/income/submit')}}" class="form-horizontal">
                        @csrf
                        <div class="form-group row {{ $errors->has('details') ? ' has-error' : '' }}">
                            <label class="col-md-3 text-right control-label col-form-label"> Income Details<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="details" class="form-control" placeholder="enter income details" value="{{old('details')}}">
                                @if ($errors->has('details'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label class="col-md-3 text-right control-label col-form-label"> Income Amount<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="number" name="amount" class="form-control" placeholder="income amount" value="{{old('amount')}}">
                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('date') ? ' has-error' : '' }}">
                            <label class="col-md-3 text-right control-label col-form-label"> Income Date<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="date" name="date" class="form-control" placeholder="income date" value="{{old('date')}}">
                                @if ($errors->has('date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="control-label text-right col-md-3">Income Category<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                @php
                                    $all=App\Models\IncomeCategory::where('incate_status',1)->orderBy('incate_id','ASC')->get();
                                @endphp
                                <select class="form-control" name="category">
                                    <option value="Category 1">-- Select Income Category --</option>
                                    @foreach($all as $data)
                                        <option value="{{$data->incate_id}}">{{$data->incate_name}}</option>
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
                            <button type="submit" class="btn btn-info registration-btn">Save Income</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection