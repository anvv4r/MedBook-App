@extends('layouts.master')

@section('content')

<div class="container">
    <h3>Confirm Booking</h3>
    <div class="container_detail">
        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $bookingData['user_id'] }}">
            <input type="hidden" name="doctor_id" value="{{ $bookingData['doctor_id'] }}">
            <input type="hidden" name="date" value="{{ $bookingData['date'] }}">
            <input type="hidden" name="time" value="{{ $bookingData['time'] }}">
            <input type="hidden" name="status" value="0">

            <h3>Your booking details :</h3>
            <p>Patient Name : {{ $user->name }}</p>
            <p>Doctor Name : {{ $doctorData->name }}</p>
            <p>Specialisation : {{ $doctorData->specialty }}</p>
            <p>Date : {{ $bookingData['date'] }}</p>
            <p>Time : {{ $bookingData['time'] }}</p>
            <p>Practicioner Address :</p>
            <p>{{ $doctorData->address}}</p>

            <button class="book_button" type="submit">Confirm Booking</button>
        </form>

    </div>

    @endsection