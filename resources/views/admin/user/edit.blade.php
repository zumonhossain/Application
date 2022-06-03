@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update User Registration</h4>
                    <a href="{{url('admin/user')}}" class="all_link"><i class="mdi mdi-grid"></i> All User</a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                    <script type="text/javascript">
                        swal({title: "Success!", text: "User Information Update Successfully!", icon: "success", button: "OK", timer:5000,});
                    </script>
                    @endif
                    @if(Session::has('error'))
                    <script type="text/javascript">
                        swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                    </script>
                    @endif
                    <form method="post" action="{{url('admin/user/update')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label">Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                                <input type="hidden" name="id" class="form-control" value="{{ $data->id }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label">Email<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="email" name="email" class="form-control" value="{{ $data->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label">Phone Number</label>
                            <div class="col-md-7">
                                <input type="number" name="phone" class="form-control" value="{{ $data->phone }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label">Password<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="password" name="password" class="form-control" value="{{ $data->password }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label">Confirm Password<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="password" name="password_confirmation" class="form-control" value="{{ $data->password }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Image Upload</label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="pic" value="{{old('pic')}}">
                            </div>
                            <div class="col-sm-3">
                                @if($data->pic!='')
                                    <img height="100" width="100" src="{{asset('uploads/user/'.$data->pic)}}" class="img-thumbail"/>
                                @else
                                    <img height="100" width="100" src="{{asset('uploads/user/avatar.jpg')}}"/>
                                @endif
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