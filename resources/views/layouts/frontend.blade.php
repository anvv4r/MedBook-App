<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./scss/home.scss" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MedBook') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!--for datepicker-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>

    <!--for datepicker-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/dist/css/theme.min.css')}}">

    <!--for datepicker-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--for datepicker-->
    @vite(['resources/scss/home.scss', 'resources/js/app.js'])

</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="/" alt="Home">
                <img src="./images/medbook-logo.svg" alt="MedBook" /></a>
            <h2>MedBook</h2>
        </div>
        <nav>
            <a href="/login">
                <h3>Patient Login</h3>
            </a>
            <a href="/register-doctor">
                <h3>Practitioner Login</h3>
            </a>
            <a href="#story">
                <h3>Our Story</h3>
            </a>
        </nav>
    </header>
    <section class="heading">
        <h1>Book your next healthcare appointment.</h1>
        <h2>Find and book your favourite practitioners..</h2>
    </section>
    <section class="main">
        <div class="container">
            <div class="search_bar">
                <input type="search" name="" id="" /><button>Search</button>
            </div>
            <div class="search_result">
                <h3>Available Doctors</h3>
            </div>
        </div>
    </section>
    <section class="mid">
        <td class="mid_container_text">
            <h3>
                Are you a GP, dentist, specialist or allied health provider?
            </h3>
            <button>List Your Practice at MedBook</button>
        </td>
    </section>
    <section class="bottom">
        <div class="bottom_container">
            <div class="bottom_container_text">
                <h2>
                    Book your favourite health professional faster with the
                    MedBook app
                </h2>
                <p>Available on the App Store and Google Play.</p>
                <button>Download Now</button>
            </div>
            <img src="./images/medbook-logo.svg" alt="MedBook" />
        </div>
    </section>

    <footer class="footer">
        <div class="footer_container">
            <div class="footer_story" id="story">
                <h2>Our Story</h2>
                MedBook is a platform that connects patients with healthcare
                practitioners. We aim to make healthcare more accessible and
                affordable for everyone. We believe that everyone should
                have access to quality healthcare. We are proud to be part
                of the local community. We support local artists and
                musicians. We also host events and workshops. Lorem ipsum
                dolor sit amet, consectetur adipiscing elit. Nullam auctor,
                nunc nec
            </div>
            <img src="./images/stetoscope.jpg" alt="MedBook" />
        </div>
        <div class="footer_copyright">
            <h3>&copy; 2024 MedBook. All rights reserved.</h3>
        </div>
    </footer>
</body>

</html>