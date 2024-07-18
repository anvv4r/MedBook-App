@extends('layouts.master')

@section('content')
<div class="container">
    <h3>Make Appointment for : {{ $user->name }}</h3>
    <div class="booking_detail">
        <div>
            <p>Appointment Date : {{ $appointment->date }}</p>
            <p>Doctor name: {{ $doctorName }}</p>
        </div>
        <div>
            <form action="{{ route('booking.confirm') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="doctor_id" value="{{ $doctorId }}">
                <input type="hidden" name="date" value="{{ $appointment->date }}">
                <input type="hidden" name="status" value="0">
                <label for="time">Select Time : </label>
                <select name="time" id="time">
                    @foreach ($times as $time)
                        <option value="{{ $time->time }}">{{ $time->time }}</option>
                    @endforeach
                </select>
                <button class="book_button" type="submit">Book</button>
            </form>
        </div>
    </div>

    @if(Session::has('message'))
        <div class="alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    @if(Session::has('errmessage'))
        <div class="alert-danger">
            {{Session::get('errmessage')}}
        </div>
    @endif
</div>
@endsection