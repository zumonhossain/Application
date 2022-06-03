@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Expense Category</h4>
                    <a href="{{url('admin/expense/category')}}" class="all_link"><i class="mdi mdi-grid"></i> All Category</a>
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
                    <form method="post" action="{{url('admin/expense/category/update')}}" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label">Category Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="name" class="form-control" value="{{ $data->expcate_name }}">
                                <input type="hidden" name="id" class="form-control" value="{{ $data->expcate_id }}">
                                <input type="hidden" name="slug" class="form-control" value="{{ $data->expcate_slug }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label">Remarks</label>
                            <div class="col-md-7">
                                <input type="text" name="remarks" class="form-control" value="{{ $data->expcate_remarks }}">
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