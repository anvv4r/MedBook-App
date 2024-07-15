<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MedBook | Reset Password</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('template/favicon.ico" type="image/x-icon')}}" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('template/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/ionicons/dist/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/icon-kit/dist/css/iconkit.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/css/theme.min.css')}}">
    <script src="{{asset('template/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" style="background-image: url('{{asset('img/bg-login.jpg')}}')">
                        <div class="lavalite-overlay"></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="/"><img src="{{asset('img/medbook-logo.svg')}}" alt="medbook" width="100px"></a>
                        </div>
                        <h3>Forgot Password</h3>
                        <p>We will send you a link to reset password.</p>
                        <form action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your email address" required="">
                                <i class="ik ik-mail"></i>
                            </div>
                            <div class="sign-btn text-center">
                                <button class="btn btn-theme">Submit</button>
                            </div>
                        </form>
                        <div class="register">
                            <p>Don't have a account?</p>
                            <p><a href="/register">Register as a Patient</a> | <a href="/register-doctor">Register as a
                                    Doctor</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>window.jQuery || document.write(`<script src="{{asset('template/src/js/vendor/jquery-3.3.1.min.js')}}"><\/script>`)</script>
    <script src="{{asset('template/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('template/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('template/plugins/screenfull/dist/screenfull.js')}}"></script>
    <script src="{{asset('template/dist/js/theme.js')}}"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
            (function (b, o, i, l, e, r) {
                b.GoogleAnalyticsObject = l; b[l] || (b[l] =
                    function () { (b[l].q = b[l].q || []).push(arguments) }); b[l].l = +new Date;
                e = o.createElement(i); r = o.getElementsByTagName(i)[0];
                e.src = 'https://www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e, r)
            }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto'); ga('send', 'pageview');
    </script>
</body>

</html>