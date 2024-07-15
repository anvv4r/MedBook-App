@extends('layouts.master')

@section('content')

<div class="container">
    <h3>Register as Patient</h3>
    <div class="form-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-row">
                <div class="form-input">
                    <label>Full Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-input">
                    <label>Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-input">
                    <label>Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-input">
                    <label>Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Confirm Password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-input">
                    <label>Date of Birth</label>
                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob"
                        value="{{ old('dob') }}" required autocomplete="dob">
                    @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-input">
                    <label>Gender</label>
                    <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender">
                        <option value="">please select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-col">
                <div class="form-input">
                    <label>Phone Number</label>
                    <input id="phone_number" type="text"
                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                        value="{{ old('phone_number') }}" required autocomplete="phone_number"
                        placeholder="Phone Number">
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
</div>

@endsection