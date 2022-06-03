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
                            <a href="{{url('admin/recycle/user')}}"><i class="fa fa-share-square fa-lg"></i> User Recycle</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php
                                $RUserCount=App\Models\User::where('status',0)->count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                    @if($RUserCount<=10)
                                      0{{$RUserCount}}
                                    @else
                                      {{$RUserCount}}
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
                            <a href="{{url('admin/recycle/income/category')}}"><i class="fa fa-share-square fa-lg"></i> Income Category Recycle</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php
                                $RInCatCount=App\Models\IncomeCategory::where('incate_status',0)->count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                    @if($RInCatCount<=10)
                                      0{{$RInCatCount}}
                                    @else
                                      {{$RInCatCount}}
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
                            <a href="{{url('admin/recycle/income')}}"><i class="fa fa-share-square fa-lg"></i> Income Recycle</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php
                                $RInCount=App\Models\Income::where('income_status',0)->count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                    @if($RInCount<=10)
                                      0{{$RInCount}}
                                    @else
                                      {{$RInCount}}
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
                            <a href="{{url('admin/recycle/expense/category')}}"><i class="fa fa-share-square fa-lg"></i> Expense Category Recycle</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php
                                $RExCatCount=App\Models\ExpenseCategory::where('expcate_status',0)->count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                    @if($RExCatCount<=10)
                                      0{{$RExCatCount}}
                                    @else
                                      {{$RExCatCount}}
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
                            <a href="{{url('admin/recycle/expense')}}"><i class="fa fa-share-square fa-lg"></i> Expense Recycle</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php
                                $RExCount=App\Models\Expense::where('expense_status',0)->count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                    @if($RExCount<=10)
                                      0{{$RExCount}}
                                    @else
                                      {{$RExCount}}
                                    @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection