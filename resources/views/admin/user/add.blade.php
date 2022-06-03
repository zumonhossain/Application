@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> User Registration</h4>
                    <a href="{{url('admin/user')}}" class="all_link"><i class="mdi mdi-grid"></i> All User</a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                    <script type="text/javascript">
                        swal({title: "Success!", text: "User Information save Successfully!", icon: "success", button: "OK", timer:5000,});
                    </script>
                    @endif
                    @if(Session::has('error'))
                    <script type="text/javascript">
                        swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                    </script>
                    @endif
                    <form method="post" action="{{url('admin/user/submit')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-3 text-right control-label col-form-label">Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-3 text-right control-label col-form-label">Email<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label">Phone Number</label>
                            <div class="col-md-7">
                                <input type="number" name="phone" class="form-control" placeholder="Phone" value="{{old('phone')}}">
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-3 text-right control-label col-form-label">Password<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-3 text-right control-label col-form-label">Confirm Password<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Image Upload</label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" name="pic"value="{{old('pic')}}">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info registration-btn">REGISTRATION</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection