<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MedBook -
        @if(auth()->check() && auth()->user()->role?->name === 'admin')
            Admin Dashboard
        @elseif(auth()->check() && auth()->user()->role?->name === 'doctor')
            Doctor Dashboard
        @elseif(auth()->check() && auth()->user()->role?->name === 'patient')
            Patient Dashboard
        @endif
    </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('template/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/icon-kit/dist/css/iconkit.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/ionicons/dist/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet"
        href="{{asset('template/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/weather-icons/css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/c3/c3.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/owl.carousel/dist/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/css/theme.min.css')}}">
    <script src="{{asset('template/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <style>
        .wrap-text {
            word-wrap: break-word;
            white-space: normal;
            max-width: 80px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i
                                class="ik ik-maximize"></i></button>
                    </div>

                    <div class="top-menu d-flex align-items-center">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
                            <div class="dropdown-menu dropdown-menu-right notification-dropdown"
                                aria-labelledby="notiDropdown">
                                <h4 class="header">Notifications</h4>
                                <div class="notifications-wrap">
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <i class="ik ik-check"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">Invitation accepted</span>
                                            <span class="media-content">Your have been Invited ...</span>
                                        </span>
                                    </a>
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <img src="{{asset('template/img/users/1.jpg')}}" class="rounded-circle"
                                                alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">Steve Smith</span>
                                            <span class="media-content">I slowly updated projects</span>
                                        </span>
                                    </a>
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <i class="ik ik-calendar"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">To Do</span>
                                            <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                            </div>
                        </div>
                        <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i
                                class="ik ik-message-square"></i><span class="badge bg-success">3</span></button>

                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                                @if (
                                        auth()->user()->role?->name === 'admin' && auth()->user()->image !== null
                                        || auth()->user()->role?->name === 'doctor' && auth()->user()->image !== null
                                        || auth()->user()->role?->name === 'patient' && auth()->user()->image !== null
                                    )

                                                                    <img class="avatar" src="{{asset('images')}}/{{auth()->user()->image}}" alt="">
                                @else

                                    <img class="avatar" src="{{asset('template/img/user.jpg')}}" alt="">

                                @endif


                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                                @if(auth()->check() && auth()->user()->role?->name === 'admin')

                                    <a class="dropdown-item" href="/admin/user-profile"><i
                                            class="ik ik-user dropdown-icon"></i>
                                        Profile</a>

                                @elseif(auth()->check() && auth()->user()->role?->name === 'doctor')

                                    <a class="dropdown-item" href="/doctor/user-profile"><i
                                            class="ik ik-user dropdown-icon"></i>
                                        Profile</a>

                                @elseif(auth()->check() && auth()->user()->role?->name === 'patient')

                                    <a class="dropdown-item" href="/patient/user-profile"><i
                                            class="ik ik-user dropdown-icon"></i>
                                        Profile</a>
                                @endif

                                <a class="dropdown-item" href="#"><span class="float-right"><span
                                            class="badge badge-primary">6</span></span><i
                                        class="ik ik-mail dropdown-icon"></i> Inbox</a>
                                <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i>
                                    Message</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="ik ik-power dropdown-icon"></i>Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>