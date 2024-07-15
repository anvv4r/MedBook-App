<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MedBook</title>
    <link rel="stylesheet" href="{{ asset('scss/style.scss') }}">
    <link rel="icon" type="image/svg" href="{{ asset('img/medbook-logo.svg') }}">

</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="/" alt="Home">
                <img src="{{ asset('img/medbook-logo.svg')}}" alt="MedBook" /></a>
            <a href="/" alt="Home">
                <h2>MedBook</h2>
            </a>
        </div>
        <nav>
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}">
                        <h3>Dashboard</h3>
                    </a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <h3>Logout</h3>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="/login">
                        <h3>Login</h3>
                    </a>
                    <a href="/register">
                        <h3>Register as Patient</h3>
                    </a>
                    <a href="/register-doctor">
                        <h3>Register as Practitioner</h3>
                    </a>
                @endauth
            @endif

            <a href="#story">
                <h3>Our Story</h3>
            </a>

        </nav>
    </header>