@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> View User Information</h4>
                    <a href="{{url('admin/user')}}" class="all_link"><i class="mdi mdi-apps"></i> All User</a>
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
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered table-striped table-hover custom_table">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td>:</td>
                                    <td>{{$data->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>:</td>
                                    <td>{{$data->created_at->format('d M Y')}}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>:</td>
                                    <td>
                                        @if($data->pic!='')
                                            <img width="150" height="100" src="{{asset('uploads/user/'.$data->pic)}}" alt="user"/>
                                        @else
                                            <img height="100" src="{{asset('uploads/user/avatar.png')}}" alt="user"/>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
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