<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $basic = App\Models\Basic::where('basic_status',1)->where('basic_id',1)->firstOrFail();
    @endphp
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/basic/'.$basic->basic_favicon) }}">
    <title>{{ $basic->basic_title }}</title>
    <link href="{{ asset('contents/admin') }}/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/adminpress.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/toastr.css" id="theme" rel="stylesheet">
    
    <script src="{{asset('contents/admin')}}/assets/plugins/jquery/jquery.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/sweetalert.min.js"></script>
</head>

<body class="fix-header fix-sidebar card-no-border">


<i class="fab fa-instagram-square"></i>



    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar print_none">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">

                <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('admin')}}">
                        <b>
                            <img src="{{ asset('contents/admin') }}/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <img src="{{ asset('contents/admin') }}/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span>
                            <img src="{{ asset('contents/admin') }}/assets/images/logo-text.png" alt="homepage" class="dark-logo" /> 
                            <img src="{{ asset('contents/admin') }}/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                </div>

                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="#"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <a href="#">
                                                <div class="user-img"> <img src="{{ asset('contents/admin') }}/assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="#"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter">
                                <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('uploads/basic/'.$basic->basic_logo) }}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{ asset('uploads/basic/'.$basic->basic_logo) }}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{Auth::user()->name}}</h4>
                                                <p class="text-muted">{{Auth::user()->email}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a class="waves-effect waves-dark" href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i><span class="hide-menu">Logout</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar print_none">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="profile-img"> <img src="{{ asset('uploads/basic/'.$basic->basic_logo) }}" alt="user" />
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <div class="profile-text">
                        <h5>{{Auth::user()->name}}</h5>
                        <a href="index.html#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="app-email.html" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                        <a href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                        <div class="dropdown-menu animated flipInY">
                            <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="mdi mdi-power"></i>Logout</a>
                        </div>
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('admin/user') }}"><i class="mdi mdi-account-plus"></i><span class="hide-menu">User</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('admin/income/category') }}"><i class="mdi mdi-format-align-left"></i><span class="hide-menu">Income Category</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('admin/income') }}"><i class="mdi mdi-format-align-left"></i><span class="hide-menu">Income</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('admin/expense/category') }}"><i class="mdi mdi-format-align-left"></i><span class="hide-menu">Expense Category</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('admin/expense') }}"><i class="mdi mdi-format-align-left"></i><span class="hide-menu">Expense</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('admin/summary') }}"><i class="mdi mdi-bank"></i><span class="hide-menu">Summary</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('admin/manage') }}"><i class="mdi mdi-apps"></i><span class="hide-menu">Manage</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('admin/general/basic') }}"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Basic</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('admin/recycle') }}"><i class="mdi mdi-recycle"></i><span class="hide-menu">Recycle Bin</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i><span class="hide-menu">Logout</span></a>
                        </li>
                    </ul>
                </nav>
                <form id="logout-form" method="POST" action="{{ url('logout') }}">
                    @csrf
                </form>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="row page-titles print_none">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">
                @yield('content')
            </div>

            <footer class="footer print_none"> © 2020 Zumon Hossain </footer>

        </div>

    </div>



    <script src="{{ asset('contents/admin') }}/js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('contents/admin') }}/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('contents/admin') }}/js/waves.js"></script>
    <script src="{{ asset('contents/admin') }}/js/sidebarmenu.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/custom.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/raphael/raphael-min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/morrisjs/morris.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/dashboard1.js"></script>
    <script src="{{ asset('contents/admin') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    
    <script src="{{ asset('contents/admin') }}/js/custom.js"></script>

    <script>
        $(document).ready(function(){
            $( "#search" ).click(function() {
            var from = $('#datepickerForm').val();
            var to = $('#datepickerTo').val();
            var base_url = window.location.origin;
            var url = base_url+'/admin/summary/search/'+from+'/'+to;
            location.href = url;
            });
        });
    </script>

    




</body>

</html>