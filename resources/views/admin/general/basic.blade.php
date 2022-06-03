@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Basic Information </h4>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <script type="text/javascript">
                            swal({title: "Success!", text: "Basic Information save Successfully", icon: "success", button: "OK", timer:5000,});
                        </script>
                    @endif
                    @if(Session::has('error'))
                        <script type="text/javascript">
                            swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                        </script>
                    @endif
                    <form method="post" action="{{url('admin/general/basic/update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label">Title</label>
                            <div class="col-md-7">
                                <input type="text" name="title" class="form-control" value="{{$data->basic_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 text-right control-label col-form-label"> Subtitle</label>
                            <div class="col-md-7">
                                <input type="text" name="subtitle" class="form-control" value="{{$data->basic_subtitle}}">
                            </div>
                        </div>
                        <div class="form-group row custom_form_group">
                          <label class="col-sm-3 text-right col-form-label">Details:</label>
                          <div class="col-sm-7">
                            <textarea class="form-control" rows="3" name="details">{{$data->basic_details}}</textarea>
                          </div>
                        </div>
                        <div class="form-group row custom_form_group{{ $errors->has('pic') ? ' has-error' : '' }}">
                  <label class="col-sm-3 text-right col-form-label">Logo:</label>
                  <div class="col-sm-3">
                    <input type="file" class="" name="pic">
                  </div>
                  <div class="col-sm-2">
                      @if($data->basic_logo!='')
                          <img class="img-thumbnail img-fluid imagestyle" src="{{asset('uploads/basic/'.$data->basic_logo)}}" alt="logo"/>
                      @else
                          <img class="img-thumbnail img-fluid imagestyle" src="{{asset('uploads/basic/avatar.png')}}" alt="logo"/>
                      @endif
                  </div>
                </div>
                <div class="form-group row custom_form_group">
                  <label class="col-sm-3 text-right col-form-label">Favicon:</label>
                  <div class="col-sm-3">
                    <input type="file" class="" name="favicon">
                  </div>
                  <div class="col-sm-2">
                      @if($data->basic_favicon!='')
                          <img class="img-thumbnail img-fluid imagestyle" src="{{asset('uploads/basic/'.$data->basic_favicon)}}" alt="logo"/>
                      @else
                          <img class="img-thumbnail img-fluid imagestyle" src="{{asset('uploads/basic/avatar.png')}}" alt="logo"/>
                      @endif
                  </div>
                </div>
                <div class="form-group row custom_form_group">
                  <label class="col-sm-3 text-right col-form-label">Footer-Logo:</label>
                  <div class="col-sm-3">
                    <input type="file" class="" name="flogo">
                  </div>
                  <div class="col-sm-2">
                      @if($data->basic_flogo!='')
                          <img class="img-thumbnail img-fluid imagestyle" src="{{asset('uploads/basic/'.$data->basic_flogo)}}" alt="logo"/>
                      @else
                          <img class="img-thumbnail img-fluid imagestyle" src="{{asset('uploads/basic/avatar.png')}}" alt="logo"/>
                      @endif
                  </div>
                </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-md btn-info">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection





