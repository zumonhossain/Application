@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="ti-light-bulb"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title">All User</h3>
                            <a href="{{url('admin/user')}}"><i class="fa fa-share-square fa-lg"></i> Manage User</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                    @if($user<10)
                                      0{{$user}}
                                    @else
                                      {{$user}}
                                    @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="ti-light-bulb"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title">Income Category</h3>
                            <a href="{{url('admin/income/category')}}"><i class="fa fa-share-square fa-lg"></i> Manage Income Category</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                    @if($incomeCategory<10)
                                      0{{$incomeCategory}}
                                    @else
                                      {{$incomeCategory}}
                                    @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="ti-light-bulb"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title">Income</h3>
                            <a href="{{url('admin/income')}}"><i class="fa fa-share-square fa-lg"></i> Manage Income</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                    @if($income<10)
                                      0{{$income}}
                                    @else
                                      {{$income}}
                                    @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="ti-light-bulb"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title">Expense Category</h3>
                            <a href="{{url('admin/expense/category')}}"><i class="fa fa-share-square fa-lg"></i> Manage Expense Category</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                    @if($expenseCategory<10)
                                      0{{$expenseCategory}}
                                    @else
                                      {{$expenseCategory}}
                                    @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="ti-light-bulb"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title">Expense</h3>
                            <a href="{{url('admin/expense')}}"><i class="fa fa-share-square fa-lg"></i> Manage Expense</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                    @if($expense<10)
                                      0{{$expense}}
                                    @else
                                      {{$expense}}
                                    @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection