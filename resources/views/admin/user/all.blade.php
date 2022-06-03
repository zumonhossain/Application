@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All User Information</h4>
                    <a href="{{url('admin/user/add')}}" class="all_link"><i class="mdi mdi-apps"></i> Add User</a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                    <script type="text/javascript">
                        swal({title: "Success!", text: "User Softdelete Successfully!", icon: "success", button: "OK", timer:5000,});
                    </script>
                    @endif
                    @if(Session::has('error'))
                    <script type="text/javascript">
                        swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                    </script>
                    @endif
                    <table class="table table-bordered table-striped table-hover custom_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Created Date</th>
                            <th>Photo</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->created_at->format('Y-m-d')}}</td>
                            <td>
                                @if($data->pic!='')
                                    <img height="50" src="{{asset('uploads/user/'.$data->pic)}}" alt="user"/>
                                @else
                                    <img height="50" src="{{asset('uploads/user/avatar.png')}}" alt="user"/>
                                @endif
                            </td>
                            <td>
                                <a class="btn-success view-icon" href="{{url('admin/user/view/'.$data->id)}}"><i class="mdi mdi-library-plus"></i></a>
                                <a class="btn-info edit-icon" href="{{url('admin/user/edit/'.$data->id)}}"><i class="mdi mdi-table-edit"></i></a>
                                <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$data->id}}" href="#"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    
                </div>
                <div class="card-footer print_none">
                    <a href="#" onclick="window.print()" class="btn btn-sm btn-info">Print</a>
                    <a href="{{ url('admin/user/excel') }}" class="btn btn-sm btn-warning">Excel</a>
                    <a href="{{ url('admin/user/pdf') }}" class="btn btn-sm btn-primary">PDF</a>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!--delete modal code start -->
    <div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ url('admin/user/softdelete') }}">
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