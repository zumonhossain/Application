@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Income Category Recycle</h4>
                    <a href="{{url('admin/recycle')}}" class="all_link"><i class="mdi mdi-apps"></i> Recycle</a>
                </div>
                <div class="card-body">
                    
                    @if(Session::has('restore_success'))
                        <script type="text/javascript">
                            swal({title: "Success!", text: "Income Information Restore Successfully", icon: "success", button: "OK", timer:5000,});
                        </script>
                    @endif
                    @if(Session::has('restore_error'))
                        <script type="text/javascript">
                            swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                        </script>
                    @endif

                    @if(Session::has('delete_success'))
                        <script type="text/javascript">
                            swal({title: "Success!", text: "Income Information Delete Successfully", icon: "success", button: "OK", timer:5000,});
                        </script>
                    @endif
                    @if(Session::has('delete_error'))
                        <script type="text/javascript">
                            swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                        </script>
                    @endif

                    <table class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Created Time</th>
                                <th>Category Name</th>
                                <th>Category Remarks</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all as $data)
                            <tr>
                                <td>{{$data->created_at->format('Y-m-d')}}</td>
                                <td>{{$data->incate_name}}</td>
                                <td>{{$data->incate_remarks}}</td>
                                <td>
                                    <a class="btn-info delete-icon" id="restore" data-toggle="modal" data-target="#myRestore" data-id="{{$data->incate_id}}" href="#"><i class="mdi mdi-backup-restore"></i></a>
                                    <a class="btn-danger delete-icon" id="delete" data-toggle="modal" data-target="#myDelete" data-id="{{$data->incate_id}}" href="#"><i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-sm btn-info">Print</a>
                    <a href="#" class="btn btn-sm btn-warning">Excel</a>
                    <a href="#" class="btn btn-sm btn-primary">Print</a>
                </div>
                </div>
            </div>
        </div>
    </div>


    <!--restore modal code start -->
    <div id="myRestore" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myRestoreLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ url('admin/income/category/restore') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header modal_header_title">
                    <h5><i class="fa fa-gg-circle"></i> Confirm Message</h5>
                </div>
                <div class="modal-body modal_card">
                    <input type="hidden" name="modal_id" id="modal_id" />
                    Are you want to sure Restore this data?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect">Confirm</button>
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!--delete modal code start -->
    <div id="myDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ url('admin/income/category/delete') }}">
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